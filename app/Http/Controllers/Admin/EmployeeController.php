<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Admin;
use App\Group;
use App\Gender;
use Carbon\Carbon;
use App\BloodGroup;
use App\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = Admin::with('group')
            ->where('role', 2)
            ->select(['id', 'status', 'adminname', 'employee_id', 'avater', 'gender', 'designation', 'group_id', 'email', 'phone'])
            ->get()->map(function ($admin) {
                return [
                    'id' => $admin->id,
                    'name' => $admin->adminname,
                    'status' => $admin->status,
                    'employee_id' => $admin->employee_id,
                    'avater' => $admin->avater,
                    'gender' => $admin->gender,
                    'designation' => $admin->designation,
                    'group_id' => $admin->group_id,
                    'email' => $admin->email,
                    'phone' => $admin->phone,
                    'department' => [
                       'name' => $admin->group->name
                    ],
                ];
            });

        return view('admin.employee.index', compact('admins'));
    }

    public function create()
    {
        date_default_timezone_set('Asia/Dhaka');
        $employee = Admin::orderBy('id', 'desc')->select('id')->first();
        if (!$employee) {
            $employeeId = 'E' . date('m') . date('y') . '0' . '1';
        } else {
            $employeeId = 'E' . date('m') . date('y') . ($employee->id <= 8 ? '0' : '') . ++$employee->id;
        }
        $bloodGroups = BloodGroup::select(['group_name', 'id'])->get();
        $groups = Group::select(['id', 'name'])->get();
        $designations = Designation::select(['id', 'name'])->get();
        $roles = Role::select(['id', 'name', 'role_known_id'])->get();
        $genders = Gender::select(['id', 'name'])->get();
        return view('admin.employee.create', compact('bloodGroups', 'groups', 'designations', 'roles', 'genders', 'employeeId'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'employee_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'date_of_birth' => 'required',
            'mobile_no' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'photo' => 'required',
            'email' => 'required|unique:admins,email',
            'password' => 'required|confirmed',
            'designation' => 'required',
            'group' => 'required',
            'joining_date' => 'required',
            'qualification' => 'required',
            'role' => 'required',
        ]);

        if ($request->bank_name) {
            $this->validate(
                $request,
                [
                    'account_holder' => 'required',
                    'bank_branch' => 'required',
                    'bank_address' => 'required',
                    'ifsc_code' => 'required',
                    'account_no' => 'required',
                ],
                [
                    'account_holder.required' => 'You have given bank name, so now account holer is required',
                    'bank_branch.required' => 'You have given bank name, so now bank branch  is required',
                    'bank_address.required' => 'You have given bank name, so now bank address  is required',
                    'ifsc_code.required' => 'You have given bank name, so now ifsc code is required',
                    'account_no.required' => 'You have given bank name, so now account_no is required',
                ]
            );
        }

        date_default_timezone_set('Asia/Dhaka');

        if ($request->file('photo')) {
            $employeePhoto = $request->file('photo');
            $employeePhotoName = uniqid() . '.' . $employeePhoto->getClientOriginalExtension();
            Image::make($employeePhoto)->resize(500, 500)->save('public/uploads/employee/' . $employeePhotoName);
            Admin::insert([
                'employee_id' => $request->employee_id,
                'adminname' => $request->name,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'blood_group_id' => $request->blood_group,
                'date_of_birth' => $request->date_of_birth,
                'phone' => $request->mobile_no,
                'status' => 1,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'designation' => $request->designation,
                'group_id' => $request->group,
                'joining_date' => date('d/m/Y', strtotime($request->joining_date)),
                'qualification' =>  $request->qualification,
                'role' =>  $request->role,
                'facebook_link' =>  $request->facebook_link ?  $request->facebook_link : '',
                'linkedIn_link' =>  $request->linkedIn_link ?  $request->linkedIn_link : '',
                'twitter_link' =>  $request->twitter_link ?  $request->twitter_link : '',
                'bank_name' =>  $request->bank_name ?  $request->bank_name : '',
                'account_holder' =>  $request->account_holder ?  $request->account_holder : '',
                'bank_branch' =>  $request->bank_branch ?  $request->bank_branch : '',
                'bank_address' =>  $request->bank_address ?  $request->bank_address : '',
                'ifsc_code' =>  $request->ifsc_code ?  $request->ifsc_code : '',
                'account_no' =>  $request->account_no ?  $request->account_no : '',
                'avater' =>  $employeePhotoName,
                'created_at' =>  Carbon::now(),
            ]);
        }
        $notification = array(
            'messege' => 'Employee added successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
