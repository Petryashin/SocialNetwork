<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface MessageSearchContract
{
    public function search(string $query = ''): ?Collection;
}
