<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\ClassSection;
use App\ClassSubject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Section;
use App\Subject;

class AcademicAssignController extends Controller
{
    public function allAssignedSubject()
    {
        $formClasses = Classes::where('status', 1)->get();
        $formSubjects = Subject::where('status', 1)->get();

        return view('admin.academic.subject_assign.index', compact('formClasses', 'formSubjects'));
    }

    public function subjectAssign(Request $request)
    {
        $this->validate($request, [
            'class_id' => 'required',
            'section_id' => 'required',
        ]);

        foreach ($request->subject_ids as $subjectId ) {
            $assignSubject = new ClassSubject();
            $assignSubject->class_id = $request->class_id;
            $assignSubject->section_id = $request->section_id;
            $assignSubject->subject_id = $subjectId;
            $assignSubject->save();
        }

        $notification = array(
            'messege' => 'Subjects assigned successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getSectionByAjax($classId)
    {
        $classSections = ClassSection::with(['section'])->where('class_id', $classId)->get();
        return response()->json($classSections);
    }
}
