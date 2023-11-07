<?php

namespace App\Services\Category;
use App\Models\Category;
use App\Repositories\Category\ICategoryRepository;
class CategoryService implements ICategoryService
{
    private $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function findAllCategories()
    {
        return $this->categoryRepository->all();
    }

    public function findByID($id)
    {
        return $this->categoryRepository->findByID($id);
    }

    public function createCategory(array $category)
    {
        return $this->categoryRepository->create($category);
    }

    public function updateCategory($id,$newValue)
    {
        return $this->categoryRepository->update($id,$newValue);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function moveCategory(int $id, int $newParentID)
    {
        return $this->categoryRepository->move($id,$newParentID);
    }
}
