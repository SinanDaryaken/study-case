<?php

namespace App\Contracts;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryInterface extends BaseInterface
{
    /**
     * @param int $status
     * @param string $param
     * @return Collection
     */
    public function getByStatusAndOrdered(int $status, string $param = 'id'): Collection;

    /**
     * @param int $status
     * @param string $param
     * @return Collection
     */
    public function getByStatusAndOrderedDesc(int $status, string $param = 'id'): Collection;

    /**
     * @return Category
     */
    public function store(): Category;

    /**
     * @param Category $category
     * @return Category
     */
    public function update(Category $category): Category;

    /**
     * @param Category $category
     * @return bool
     */
    public function destroy(Category $category): bool;
}
