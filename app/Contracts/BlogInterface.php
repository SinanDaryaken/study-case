<?php

namespace App\Contracts;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;

interface BlogInterface extends BaseInterface
{
    /**
     * @param string $param
     * @return Collection
     */
    public function getByOrdered(string $param = 'id'): Collection;

    /**
     * @param string $param
     * @return Collection
     */
    public function getByOrderedDesc(string $param = 'id'): Collection;

    /**
     * @return Blog
     */
    public function store(): Blog;

    /**
     * @param Blog $blog
     * @return Blog
     */
    public function update(Blog $blog): Blog;

    /**
     * @param Blog $blog
     * @return bool
     */
    public function destroy(Blog $blog): bool;
}
