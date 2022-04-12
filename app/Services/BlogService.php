<?php

namespace App\Services;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogService
{
    public function setSingle(Blog $blog): BlogResource
    {
        return new BlogResource($blog);
    }

    public function setPlural(Collection $blog): JsonResource
    {
        return BlogResource::collection($blog);
    }
}
