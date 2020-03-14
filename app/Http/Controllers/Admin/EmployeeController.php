<?php

namespace App\Http\Controllers\Admin;

use App\BloodGroup;
use App\Designation;
use App\Gender;
use App\Group;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function create()
    {
        $bloodGroups = BloodGroup::select(['group_name', 'id'])->get();
        $groups = Group::select(['id', 'name'])->get();
        $designations = Designation::select(['id', 'name'])->get();
        $roles = Role::select(['id', 'name', 'role_known_id'])->get();
        $genders = Gender::select(['id','name'])->get();
        return view('admin.employee.create', compact('bloodGroups', 'groups', 'designations', 'roles', 'genders'));
    }
}
