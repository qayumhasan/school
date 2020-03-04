<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_deleted', 0)->latest('id')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name'
        ]);
        $addCategory = new Category();
        $addCategory->name = $request->name;
        $addCategory->save();

        $notification = array(
            'messege' => 'Category inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,' . $request->id
        ]);
        $updateCategory = Category::where('id', $request->id)->first();
        $updateCategory->name = $request->name;
        $updateCategory->save();

        $notification = array(
            'messege' => 'Category updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($categoryId)
    {
        $statusChange = Category::where('id', $categoryId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Category is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Category is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function softDelete($categoryId)
    {
        $SoftDelete = Category::where('id', $categoryId)->first();
        $SoftDelete->is_deleted = 1;
        $SoftDelete->save();
        $notification = array(
            'messege' => 'Category is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleSoftDelete(Request $request)
    {
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any category',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $deleteId) {
                $deleteCategory = Category::where('id', $deleteId)->first();
                $deleteCategory->is_deleted = 1;
                $deleteCategory->save();
            }
        }
        $notification = array(
            'messege' => 'Category is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function hardDelete($categoryId)
    {
        Category::where('id', $categoryId)->delete();
        $notification = array(
            'messege' => 'Category is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleHardDelete(Request $request)
    {

        if ($request->category_id == null) {
            $notification = array(
                'messege' => 'You did not select any category',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->category_id as $category_id) {
                Category::where('id', $category_id)->delete();
            }
        }
        $notification = array(
            'messege' => 'Category is deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }



    public function trashes()
    {
        $categories = Category::where('is_deleted', 1)->cursor();
        return view('admin.category.trash', compact('categories'));
    }
    public function refactor($categoryId)
    {
        $categories = Category::where('id', $categoryId)->first();
        $categories->is_deleted = 0;
        $categories->save();

        $notification = array(
            'messege' => 'Category is refactored successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleRefactor(Request $request)
    {
        if ($request->category_id == null) {
            $notification = array(
                'messege' => 'You did not select any category',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

        foreach ($request->category_id as $categoryId) {
            $refactorCategory = Category::where('id', $categoryId)->first();
            $refactorCategory->is_deleted = 0;
            $refactorCategory->save();
        }

        $notification = array(
            'messege' => 'Category is refactored successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getCategoryNameByAjax($categoryId)
    {
        $category = Category::where('id', $categoryId)->first();
        return response()->json($category);
    }
}
