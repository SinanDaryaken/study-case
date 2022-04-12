<?php

namespace App\Repositories;

use App\Contracts\BlogInterface;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BlogRepository implements BlogInterface
{
    public function getById(int $id): Model
    {
        return Blog::findOrFail($id);
    }

    public function getAll(): Collection
    {
        return Blog::all();
    }

    public function getByOrdered(string $param = 'id'): Collection
    {
        return Blog::orderBy($param)->get();
    }

    public function getByOrderedDesc(string $param = 'id'): Collection
    {
        return Blog::orderBy($param, 'desc')->get();
    }

    public function getByPagination(int $perPage = 10): Paginator
    {
        return Blog::paginate($perPage);
    }

    public function store(): Blog
    {
        $data = json_decode(request('form'), true);
        $image = request('image');

        if ($image) {
            $data['image'] = $image->getClientOriginalName();
            $image->move(public_path('image'), $data['image']);
        }
        $blog = Blog::create($data);
        $blog->categories()->sync($data['category_id'], []);
        return $blog;
    }

    public function update(Blog $blog): Blog
    {
        $data = json_decode(request('form'), true);
        $image = request('image');

        if ($image) {
            $data['image'] = $image->getClientOriginalName();
            $image->move(public_path('image'), $data['image']);
        }
        $blog->update($data);
        $blog->categories()->sync($data['category_id'], []);
        return $blog;
    }

    public function destroy(Blog $blog): bool
    {
        //sync
        return $blog->delete();
    }
}
