<?php

namespace App\Http\Controllers\Admin;

use App\Hostel;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    // show all the hostel name
    public function index()
    {
        $hostels = Hostel::all();
        return view('admin.hostel.hostel',compact('hostels'));
    }

    // store hostel

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'hostel_name' => 'required',
            'type' => 'required|numeric',
            'address' => 'required',
            'intake' => 'required|numeric',
            'description' => 'required',
        ]);

        Hostel::insert([
            'hostel_name'=>$request->hostel_name,
            'type'=>$request->type,
            'address'=>$request->address,
            'intake'=>$request->intake,
            'description'=>$request->description,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'messege' => 'Hostel Created successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    // get data for edit

    public function edit($id)
    {
        $hostels =Hostel::findOrFail($id);
        return response()->json($hostels);
    }


    // update data

    public function update(Request $request)
    {

        $this->validate($request, [
            'hostel_name' => 'required',
            'type' => 'required|numeric',
            'address' => 'required',
            'intake' => 'required|numeric',
            'description' => 'required',
        ]);

        Hostel::findOrFail($request->id)->update([
            'hostel_name'=>$request->hostel_name,
            'type'=>$request->type,
            'address'=>$request->address,
            'intake'=>$request->intake,
            'description'=>$request->description,
        ]);

        $notification = array(
            'messege' => 'Hostel Updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    // delete hostel

    public function destroy($id)
    {
        Hostel::findOrFail($id)->delete();
        $notification = array(
            'messege' => 'Hostel deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // status update
    public function statusUpdate($id)
    {
         
        
        $statusChange = Hostel::findOrFail($id);
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Hostel Status is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Hostel Status is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    // hostel multi delelte

    public function hostelMultiDelete(Request $request)
    {
        if($request->deleteId == null){
            $notification = array(
                'messege' => 'You did not select any Hostel',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }else {
            foreach ($request->deleteId as $type_id) {
                Hostel::findOrFail($type_id)->delete();
            }
        }
        $notification = array(
            'messege' => 'Hostel deleted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
