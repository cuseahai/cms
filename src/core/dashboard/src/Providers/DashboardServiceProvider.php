<?php

namespace Haitech\Dashboard\Providers;

use Haitech\Base\Traits\LoadAndPublishDataTrait;
use Haitech\Dashboard\Models\DashboardWidget;
use Haitech\Dashboard\Models\DashboardWidgetSetting;
use Haitech\Dashboard\Repositories\Caches\DashboardWidgetCacheDecorator;
use Haitech\Dashboard\Repositories\Caches\DashboardWidgetSettingCacheDecorator;
use Haitech\Dashboard\Repositories\Eloquent\DashboardWidgetRepository;
use Haitech\Dashboard\Repositories\Eloquent\DashboardWidgetSettingRepository;
use Haitech\Dashboard\Repositories\Interfaces\DashboardWidgetInterface;
use Haitech\Dashboard\Repositories\Interfaces\DashboardWidgetSettingInterface;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

/**
 * @since 02/07/2016 09:50 AM
 */
class DashboardServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(DashboardWidgetInterface::class, function () {
            return new DashboardWidgetCacheDecorator(
                new DashboardWidgetRepository(new DashboardWidget)
            );
        });

        $this->app->bind(DashboardWidgetSettingInterface::class, function () {
            return new DashboardWidgetSettingCacheDecorator(
                new DashboardWidgetSettingRepository(new DashboardWidgetSetting)
            );
        });
    }

    public function boot()
    {
        $this->setNamespace('core/dashboard')
            ->loadHelpers()
            ->loadRoutes(['web'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssets()
            ->loadMigrations();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()
                ->registerItem([
                    'id'          => 'cms-core-dashboard',
                    'priority'    => 0,
                    'parent_id'   => null,
                    'name'        => 'core/base::layouts.dashboard',
                    'icon'        => 'fa fa-home',
                    'url'         => route('dashboard.index'),
                    'permissions' => [],
                ]);
        });
    }
}
