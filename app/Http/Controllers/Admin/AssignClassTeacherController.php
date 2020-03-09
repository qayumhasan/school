<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\ClassSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AssignClassTeacherController extends Controller
{
    public function index()
    {
        $formClasses = Classes::where('is_deleted', 0)->where('status', 1)->get();
        $classSections = ClassSection::with(['class', 'section', 'classTeachers', 'classTeachers.teacher'])
            ->where('is_assigned_subject', 1)
            ->get();
        return view('admin.academic.class_teacher_assign.index', compact('classes', 'classSections', 'teachers'));
    }
}
