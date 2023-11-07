<?php

namespace App\Repositories\Category;
use App\Models\Category;
interface ICategoryRepository
{
    public function all();
    public function findByID($id);
    public function move($id,$newParentID);
    public function update($id,$newValue);
    public function create(array $category);
    public function delete($id);
}
