<?php

namespace App\Services\Search;

use App\Contracts\MessageSearchContract;
use App\Models\Dialog\Message;
use Illuminate\Database\Eloquent\Collection;

class MessageSearchEloquentService implements MessageSearchContract
{
    /**
     * @param string $query
     * @return Collection
     */
    public function search(string $query = ''): Collection
    {
        return Message::query()
            ->where('text', 'like', "%{$query}%")
            ->get();
    }
}
