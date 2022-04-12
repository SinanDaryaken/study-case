<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use App\Facades\JsonOutputService;

class CategoryController extends Controller
{
    /**
     * @param CategoryRepository $categoryRepository
     * @param CategoryService $categoryService
     */
    public function __construct(
        private CategoryRepository $categoryRepository,
        private CategoryService    $categoryService
    )
    {
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getById(int $id)
    {
        $category = $this->categoryRepository->getById($id);
        $data = $this->categoryService->setSingle($category);
        $message = 'Category get by id';
        return JsonOutputService::setMessage($message)->setData($data)->response();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        $categories = $this->categoryRepository->getAll();
        $data = $this->categoryService->setPlural($categories);
        $message = 'Category get all';
        return JsonOutputService::setMessage($message)->setData($data)->response();
    }

    /**
     * @param int $status
     * @param string $param
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByStatusAndOrdered(int $status, string $param = 'id')
    {
        $categories = $this->categoryRepository->getByStatusAndOrdered($status, $param);
        $data = $this->categoryService->setPlural($categories);
        $message = 'Category get by status and ordered';
        return JsonOutputService::setMessage($message)->setData($data)->response();
    }

    /**
     * @param int $status
     * @param string $param
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByStatusAndOrderedDesc(int $status, string $param = 'id')
    {
        $categories = $this->categoryRepository->getByStatusAndOrderedDesc($status, $param);
        $data = $this->categoryService->setPlural($categories);
        $message = 'Category get by status and descending ordered';
        return JsonOutputService::setMessage($message)->setData($data)->response();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByPagination()
    {
        $categories = $this->categoryRepository->getByPagination();
        $message = 'Category get by Pagination';
        return JsonOutputService::setMessage($message)->setData($categories)->response();
    }

    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        $user = $this->categoryRepository->store();
        $message = 'Stored';
        return JsonOutputService::setMessage($message)->setData($user)->response();
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryRepository->update($category);
        $message = 'Updated';
        return JsonOutputService::setMessage($message)->setData($category)->response();
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        $this->categoryRepository->destroy($category);
        $message = 'Deleted';
        return JsonOutputService::setMessage($message)->response();
    }
}
