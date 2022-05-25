<?php

namespace App\Observers;

use Elastic\Elasticsearch\Client;

class ElasticSearchObserver
{

    private $elasticsearch;
    /**
     * @param Client $elasticsearch
     */
    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function saved(\Illuminate\Database\Eloquent\Model $model)
    {
        $this->elasticsearch->index([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
            'body' => $model->toSearchArray(),
        ]);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function deleted(\Illuminate\Database\Eloquent\Model $model)
    {
        $this->elasticsearch->delete([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
        ]);
    }
}
