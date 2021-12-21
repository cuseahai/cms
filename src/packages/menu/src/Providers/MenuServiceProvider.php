<?php

namespace Haitech\Menu\Providers;

use Haitech\Base\Traits\LoadAndPublishDataTrait;
use Haitech\Menu\Models\Menu as MenuModel;
use Haitech\Menu\Models\MenuLocation;
use Haitech\Menu\Models\MenuNode;
use Haitech\Menu\Repositories\Caches\MenuCacheDecorator;
use Haitech\Menu\Repositories\Caches\MenuLocationCacheDecorator;
use Haitech\Menu\Repositories\Caches\MenuNodeCacheDecorator;
use Haitech\Menu\Repositories\Eloquent\MenuLocationRepository;
use Haitech\Menu\Repositories\Eloquent\MenuNodeRepository;
use Haitech\Menu\Repositories\Eloquent\MenuRepository;
use Haitech\Menu\Repositories\Interfaces\MenuInterface;
use Haitech\Menu\Repositories\Interfaces\MenuLocationInterface;
use Haitech\Menu\Repositories\Interfaces\MenuNodeInterface;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot()
    {
        $this->app->bind(MenuInterface::class, function () {
            return new MenuCacheDecorator(
                new MenuRepository(new MenuModel)
            );
        });

        $this->app->bind(MenuNodeInterface::class, function () {
            return new MenuNodeCacheDecorator(
                new MenuNodeRepository(new MenuNode)
            );
        });

        $this->app->bind(MenuLocationInterface::class, function () {
            return new MenuLocationCacheDecorator(
                new MenuLocationRepository(new MenuLocation)
            );
        });

        $this->setNamespace('packages/menu')
            ->loadHelpers()
            ->loadAndPublishConfigurations(['permissions', 'general'])
            ->loadRoutes(['web'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadMigrations()
            ->publishAssets();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()
                ->registerItem([
                    'id'          => 'cms-core-menu',
                    'priority'    => 2,
                    'parent_id'   => 'cms-core-appearance',
                    'name'        => 'packages/menu::menu.name',
                    'icon'        => null,
                    'url'         => route('menus.index'),
                    'permissions' => ['menus.index'],
                ]);

            if (!defined('THEME_MODULE_SCREEN_NAME')) {
                dashboard_menu()
                    ->registerItem([
                        'id'          => 'cms-core-appearance',
                        'priority'    => 996,
                        'parent_id'   => null,
                        'name'        => 'packages/theme::theme.appearance',
                        'icon'        => 'fa fa-paint-brush',
                        'url'         => '#',
                        'permissions' => [],
                    ]);
            }

            if (function_exists('admin_bar') && Auth::check() && Auth::user()->hasPermission('menus.index')) {
                admin_bar()->registerLink(trans('packages/menu::menu.name'), route('menus.index'), 'appearance');
            }
        });

        $this->app->register(EventServiceProvider::class);
        $this->app->register(CommandServiceProvider::class);
    }
}
