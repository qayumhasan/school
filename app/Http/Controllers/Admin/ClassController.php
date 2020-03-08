<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\ClassSection;
use App\Http\Controllers\Controller;
use App\Section;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::with(['classSections', 'classSections.section'])->where('is_deleted', 0)->get();

        $sections = Section::where('status', 1)->get();
        return view('admin.academic.class.index', compact('classes', 'sections'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:classes,name'
        ]);

        $addClass = new Classes();
        $addClass->name = $request->name;
        $addClass->save();
        foreach ($request->sectionIds as $sectionId) {
           $addClassSections = new ClassSection();
           $addClassSections->class_id = $addClass->id;
           $addClassSections->section_id = $sectionId;
           $addClassSections->save();
        }


        $notification = array(
            'messege' => 'Class inserted successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($classId)
    {
        $class = Classes::with('classSections')->where('id', $classId)->firstOrFail();
        $sections = Section::select(['id', 'name'])->where('status', 1)->get();
        return view('admin.academic.class.edit', compact('class', 'sections'));
    }

    public function update(Request $request, $classId)
    {
        $this->validate($request, [
            'name' => 'required|unique:classes,name,' . $classId
        ]);

        $updateClass = Classes::where('id', $classId)->first();
        $updateClass->name = $request->name;
        $updateClass->save();

        $allPreviousClassSections = ClassSection::where('class_id', $classId)->get();

        foreach ($allPreviousClassSections as $value) {
            $value->delete();
        }

        foreach ($request->sectionIds as $sectionId) {
           $addClassSections = new ClassSection();
           $addClassSections->class_id = $updateClass->id;
           $addClassSections->section_id = $sectionId;
           $addClassSections->save();
        }

        $notification = array(
            'messege' => 'Class updated successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function changeStatus($classId)
    {
        $statusChange = Classes::where('id', $classId)->first();
        if ($statusChange->status == 1) {
            $statusChange->status = 0;
            $statusChange->save();
            $notification = array(
                'messege' => 'Class is deactivated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $statusChange->status = 1;
            $statusChange->save();
            $notification = array(
                'messege' => 'Class is activated',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function softDelete($classId)
    {
        $SoftDelete = Classes::where('id', $classId)->first();
        $SoftDelete->is_deleted = 1;
        $SoftDelete->save();
        $notification = array(
            'messege' => 'Class is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleSoftDelete(Request $request)
    {
        if ($request->deleteId == null) {
            $notification = array(
                'messege' => 'You did not select any class',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->deleteId as $deleteId) {
                $deleteClass = Classes::where('id', $deleteId)->first();
                $deleteClass->is_deleted = 1;
                $deleteClass->save();
            }
        }
        $notification = array(
            'messege' => 'Class is deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function getClassNameByAjax($classId)
    {
        $class = Classes::where('id', $classId)->first();
        return response()->json($class);
    }


    public function trashes()
    {
        $classes = Classes::where('is_deleted', 1)->get();
        return view('admin.academic.class.trash', compact('classes'));
    }

    public function refactor($classId)
    {
        $refactorClass = Classes::where('id', $classId)->first();
        $refactorClass->is_deleted = 0;
        $refactorClass->save();

        $notification = array(
            'messege' => 'Class is refactored successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleRefactor(Request $request)
    {
        if ($request->class_id == null) {
            $notification = array(
                'messege' => 'You did not select any class',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }

        foreach ($request->class_id as $classId) {
            $refactorClass = Classes::where('id', $classId)->first();
            $refactorClass->is_deleted = 0;
            $refactorClass->save();
        }

        $notification = array(
            'messege' => 'Class is refactored successfully:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function hardDelete($classId)
    {
        Classes::where('id', $classId)->delete();
        $notification = array(
            'messege' => 'Class is deleted permanently',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function multipleHardDelete(Request $request)
    {
        if ($request->class_id == null) {
            $notification = array(
                'messege' => 'You did not select any category',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->class_id as $classId) {
                Classes::where('id', $classId)->delete();
            }
        }
        $notification = array(
            'messege' => 'Class is deleted permanently:)',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
