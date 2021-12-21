<?php

namespace Haitech\SeoHelper\Providers;

use Haitech\Base\Traits\LoadAndPublishDataTrait;
use Haitech\SeoHelper\Contracts\SeoHelperContract;
use Haitech\SeoHelper\Contracts\SeoMetaContract;
use Haitech\SeoHelper\Contracts\SeoOpenGraphContract;
use Haitech\SeoHelper\Contracts\SeoTwitterContract;
use Haitech\SeoHelper\SeoHelper;
use Haitech\SeoHelper\SeoMeta;
use Haitech\SeoHelper\SeoOpenGraph;
use Haitech\SeoHelper\SeoTwitter;
use Illuminate\Support\ServiceProvider;

/**
 * @since 02/12/2015 14:09 PM
 */
class SeoHelperServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(SeoMetaContract::class, SeoMeta::class);
        $this->app->bind(SeoHelperContract::class, SeoHelper::class);
        $this->app->bind(SeoOpenGraphContract::class, SeoOpenGraph::class);
        $this->app->bind(SeoTwitterContract::class, SeoTwitter::class);
    }

    public function boot()
    {
        $this->setNamespace('packages/seo-helper')
            ->loadHelpers()
            ->loadAndPublishConfigurations(['general'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssets();

        $this->app->register(EventServiceProvider::class);

        $this->app->booted(function () {
            $this->app->register(HookServiceProvider::class);
        });
    }
}
