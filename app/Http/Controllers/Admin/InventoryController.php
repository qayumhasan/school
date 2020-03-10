<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\InventoryCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class InventoryController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth:admin');   
    }

    // show all category


    public function categoryIndex()
    {
        $cateogres =InventoryCategory::all();
        return view('admin.inventory.category',compact('cateogres'));
    }

    // store category

    public function categoryStore(Request $request)
    {
        $data =$request->validate([
            'category'=>'required|unique:inventory_categories|max:225',
            'description'=>'required',
        ]);
        InventoryCategory::insert([
            'category'=>$request->category,
            'description'=>$request->description,
            'created_at'=>Carbon::now(),
        ]);
        
        
        $notification = array(
            'messege' => 'Category Created successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // edit category


    public function categoryEdit($id)
    {
        $category = InventoryCategory::findOrFail($id);
        return response()->json($category);
    }

    // update category

    public function categoryUpdate(Request $request)
    {
        $request->validate([
            'category'=>'required|max:225|unique:inventory_categories,category,' .$request->id,
            'description'=>'required',
        ]);

        InventoryCategory::findOrFail($request->id)->update([
            'category'=>$request->category,
            'description'=>$request->description,
        ]);

        $notification = array(
            'messege' => 'Category Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // delete cateory
    public function categoryDelete($id)
    {
        InventoryCategory::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Category Deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // category multi delete

    public function categoryMultiDelete(Request $request)
    {
        if($request->deleteId == NULL){
            $notification = array(
                'messege' => 'You did not select any category',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        
        }else{
            foreach ($request->deleteId as $delid) {
                InventoryCategory::where('id', $delid)->delete();
            }
        }
        $notification = array(
            'messege' => 'Categores is deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }




}
