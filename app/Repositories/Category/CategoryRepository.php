<?php

namespace App\Repositories\Category;
use App\Models\Category;
class CategoryRepository implements ICategoryRepository
{

    public function all()
    {
        return Category::tree();
    }

    public function move($id, $newParentID)
    {
        $model = Category::find($id);
        if($model){
            $model->parent_id = $newParentID;
            $model->save();
            return $model;
        }
        return null;
    }

    public function create(array $category)
    {
        $model = Category::create($category);
        $model->save();
        return $model;
    }

    public function delete($id)
    {
        $category = $this->findByID($id);
        $category->delete();
    }

    public function findByID($id)
    {
        return Category::find($id);
    }

    public function update($id,$newValue)
    {
        $model = Category::find($id);
        if(!$model){
            return 'Category not found';
        }
        $model->name = $newValue;
        $model->save();
        return $model;
    }
}
