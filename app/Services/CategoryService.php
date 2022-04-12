<?php

namespace App\Services;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryService
{
    public function setSingle(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    public function setPlural(Collection $category): JsonResource
    {
        return CategoryResource::collection($category);
    }
}
