<?php

namespace App\Services\Search;

use App\Contracts\MessageSearchContract;
use App\Models\Dialog\Message;
use Elastic\Elasticsearch\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class MessageElasticSearchService implements MessageSearchContract
{

    private $elasticsearch;

    public function __construct(Client $elasticsearch)
    {
        $this->elasticsearch = $elasticsearch;
    }
    public function search(string $query = ''): ?Collection
    {
        $items = $this->searchOnElasticsearch($query);

        return $this->buildCollection($items);
    }
    private function searchOnElasticsearch(string $query = ''): array
    {
        $model = new Message;
        $items = $this->elasticsearch->search([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['title^5', 'body', 'tags'],
                        'query' => $query,
                    ],
                ],
            ],
        ]);

        return $items;
    }
    private function buildCollection(array $items): ?Collection
    {
        $ids = Arr::pluck($items['hits']['hits'], '_id');

        return Message::findMany($ids)
            ->sortBy(function ($message) use ($ids) {
                return array_search($message->getKey(), $ids);
            });
    }
}
