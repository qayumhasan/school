<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes;
use App\Gender;
use App\Route;
use App\HostelRoom;
use App\Hostel;
use App\RouteVehicle;
use App\Category;
use App\ClassSection;
use Session;
use Carbon\Carbon;
use Image;

class StudentAdmissionController extends Controller
{
    public function __construct(){

    }
    // 
    public function index(){

    }
    //create
    public function create(){
    	$allClass=Classes::where('is_deleted',0)->where('status',1)->get();
    	$gender=Gender::get();
    	$category=Category::where('is_deleted',0)->where('status',1)->get();
    	$routes=Route::where('status',1)->get();
    	$hostel=Hostel::where('status',1)->get();
    	return view('admin.student.add',compact('allClass','gender','category','routes','hostel'));
    } 
    // get section
    public function getsection($id){
    	$Sections = ClassSection::with(['section'])->where('class_id', $id)->get();
        return response()->json($Sections);
    }
    // get bus
    public function getbus($id){
    	$data=RouteVehicle::with(['vehicle'])->where('route_id',$id)->get();
    	return response()->json($data);
    }
    // get room
    public function getroom($id){
    	//echo "ok";
    	$data=HostelRoom::where('hostel_type',$id)->get();
    	//dd($data);
    	return response()->json($data);
    }
}
