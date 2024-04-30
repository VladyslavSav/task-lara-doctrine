<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface BookRepositoryInterface
{
    public function create(string $title, float $price, int $authorId, int $publisherId);

    public function listPaginated(): LengthAwarePaginator;
}
