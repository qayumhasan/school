<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Vehicle;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        
        $vehicles = Vehicle::latest()->get();
        
        return view('admin.hostel.room_type',compact('vehicles'));
    }
}
