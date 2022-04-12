<?php

namespace App\Repositories;

use App\Contracts\CategoryInterface;
use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository implements CategoryInterface
{
    /**
     * @param int $id
     * @return Model
     */
    public function getById(int $id): Model
    {
        return Category::findOrFail($id);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Category::all();
    }

    /**
     * @param int $status
     * @param string $param
     * @return Collection
     */
    public function getByStatusAndOrdered(int $status, string $param = 'id'): Collection
    {
        return Category::where('status', $status)->orderBy($param)->get();
    }

    /**
     * @param int $status
     * @param string $param
     * @return Collection
     */
    public function getByStatusAndOrderedDesc(int $status, string $param = 'id'): Collection
    {
        return Category::where('status', $status)->orderBy($param, 'desc')->get();
    }

    /**
     * @param int $perPage
     * @return Paginator
     */
    public function getByPagination(int $perPage = 10): Paginator
    {
        return Category::paginate($perPage);
    }

    /**
     * @return Category
     */
    public function store(): Category
    {
        $data = request()->only('status', 'name');
        $category = Category::create($data);
        return $category;
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function update(Category $category): Category
    {
        $data = request()->only('status', 'name');
        $category->update($data);
        return $category;
    }

    /**
     * @param Category $category
     * @return bool
     */
    public function destroy(Category $category): bool
    {
        return $category->delete();
    }
}
