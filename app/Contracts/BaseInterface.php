<?php

namespace App\Contracts;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    /**
     * @param  int  $id
     */
    public function getById(int $id): Model;

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param  int  $perPage
     * @return Paginator
     */
    public function getByPagination(int $perPage = 10): Paginator;
}
