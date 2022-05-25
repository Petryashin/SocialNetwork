<?php

namespace App\Providers;

use App\Contracts\MessageSearchContract;
use App\Services\Search\MessageElasticSearchService;
use App\Services\Search\MessageSearchEloquentService;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindElasticSearchClient();

        $this->app->bind(
            MessageSearchContract::class,
            function($app){
                if (! config('services.elasticsearch.enabled')) {
                    return new MessageSearchEloquentService();
                }
                return new MessageElasticSearchService(
                    $app->make(Client::class)
                );
            }
        );
    }
    private function bindElasticSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.elasticsearch.hosts'))
                ->build();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
