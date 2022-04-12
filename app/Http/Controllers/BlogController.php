<?php

namespace App\Http\Controllers;

use App\Facades\JsonOutputService;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use App\Services\BlogService;

class BlogController extends Controller
{
    public function __construct(
        private BlogRepository $blogRepository,
        private BlogService    $blogService
    )
    {
    }

    public function getById(int $id)
    {
        $blog = $this->blogRepository->getById($id);
        $data = $this->blogService->setSingle($blog);
        $message = 'Blog get by id';
        return JsonOutputService::setMessage($message)->setData($data)->response();
    }

    public function getAll()
    {
        $blogs = $this->blogRepository->getAll();
        $data = $this->blogService->setPlural($blogs);
        $message = 'Blog get all';
        return JsonOutputService::setMessage($message)->setData($data)->response();
    }

    public function getByOrdered(string $param = 'id')
    {
        $blogs = $this->blogRepository->getByOrdered($param);
        $data = $this->blogService->setPlural($blogs);
        $message = 'Blog get by status and ordered';
        return JsonOutputService::setMessage($message)->setData($data)->response();
    }


    public function getByOrderedDesc(string $param = 'id')
    {
        $blogs = $this->blogRepository->getByOrderedDesc($param);
        $data = $this->blogService->setPlural($blogs);
        $message = 'Blog get by status and descending ordered';
        return JsonOutputService::setMessage($message)->setData($data)->response();
    }

    public function getByPagination()
    {
        $blogs = $this->blogRepository->getByPagination();
        $message = 'Blog get by Pagination';
        return JsonOutputService::setMessage($message)->setData($blogs)->response();
    }

    public function store()
    {
        $user = $this->blogRepository->store();
        $message = 'Stored';
        return JsonOutputService::setMessage($message)->setData($user)->response();
    }


    public function update(Blog $blog)
    {
        $this->blogRepository->update($blog);
        $message = 'Updated';
        return JsonOutputService::setMessage($message)->setData($blog)->response();
    }

    public function destroy(Blog $blog)
    {
        $this->blogRepository->destroy($blog);
        $message = 'Deleted';
        return JsonOutputService::setMessage($message)->response();
    }
}
