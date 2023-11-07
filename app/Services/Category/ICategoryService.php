<?php

namespace App\Services\Category;

use App\Models\Category;

interface ICategoryService
{
    public function findAllCategories();
    public function findByID($id);
    public function createCategory(array $category);
    public function updateCategory($id, $newValue);
    public function moveCategory(int $id,int $newParentID);
    public function deleteCategory($id);
}
