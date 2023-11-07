<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): View
    {
        $categories = $this->categoryService->findAllCategories();
        return view('admin.pages.category.index', compact('categories'));
    }

    public function edit(Request $request, $id): JsonResponse
    {
        $newValue = $request->input('newValue');
        $result = $this->categoryService->updateCategory($id,$newValue);
        if ($result) {
            return response()->json(['message' => 'Category updated successfully']);
        } else {
            return response()->json(['error' => 'Failed to update category'], 500);
        }
    }

    public function move($id, Request $request): JsonResponse
    {
        $categoryId = $id;
        $newParentId = $request->input('newParentId');
        try {
            $this->categoryService->moveCategory($categoryId,$newParentId);
            return response()->json(['message' => 'Category moved successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Category movement failed','error'=>$e], 500);
        }
    }

    public function delete($id): JsonResponse
    {
        try {
            $this->categoryService->deleteCategory($id);
            return response()->json(['message' => 'Category deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete category','error'=>$e], 500);
        }
    }

    public function save(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|numeric',
        ]);
        $data = [
            'name' => $validatedData['name'],
            'parent_id' => $validatedData['parent_id'] == 0 ? null : $validatedData['parent_id'],
            'slug' => Str::of($validatedData['name'])->slug('-')
        ];
        $result = $this->categoryService->createCategory($data);
        return response()->json(['message' => 'Category created successfully','category'=> $result->name], 200);
    }
}
