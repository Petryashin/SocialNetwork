<?php

namespace App\Models\Traits;

use App\Observers\ElasticSearchObserver;

trait ElasticSearchableTrait
{
    // TODO: доработать до согласования с boot, объявленным в самой модели
    // https://laracasts.com/discuss/channels/eloquent/how-does-bootsearchable-loads
    protected static function boot()
    {
        parent::boot();

        if (config('services.elasticsearch.enabled')) {
            static::observe(ElasticsearchObserver::class);
        }
    }
    public function getSearchIndex(): string
    {
        return $this->getTable();
    }
    public function getSearchType()
    {
        if (property_exists($this, 'useSearchType')) {
            return $this->useSearchType;
        }
        return $this->getTable();
    }
    public function toSearchArray(): array
    {
        return $this->toArray();
    }
}
