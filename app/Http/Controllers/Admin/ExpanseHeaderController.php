<?php

namespace App\Http\Controllers\Admin;

use App\ExpanseHeader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpanseHeaderController extends Controller
{
    public function index()
    {
        $headers = ExpanseHeader::all();
        return view('admin.expanse.header.index', compact('headers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:expanse_headers,name'
        ]);
        $addClass = new ExpanseHeader();
        $addClass->name = $request->name;
        $addClass->note = $request->note;
        $addClass->save();

        $notification = array(
            'messege' => 'Class inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($headerId)
    {
        $statusChange = ExpanseHeader::where('id', $headerId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Expanse header is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Expanse header is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function delete($headerId)
    {
        ExpanseHeader::where('id', $headerId)->delete();
        $notification = array(
            'messege' => 'Expanse header is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getHeaderByAjax($headerId)
    {
        $header = ExpanseHeader::where('id', $headerId)->first();
        return response()->json($header);
    }
}
