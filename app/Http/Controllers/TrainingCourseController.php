<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCourse;
use App\Models\CourseCategory;
use App\Models\MainCategory;
use DataTables;

class TrainingCourseController extends Controller
{
    public function Manage(Request $request)
    {

      $training_courses= TrainingCourse::orderBy('id','DESC')->get();
      $course_categories= CourseCategory::all();
      $main_categories= MainCategory::all();
      if ($request->ajax()) {
            $data = TrainingCourse::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      return view('backend.pages.training_without_exam_courses.manage',compact('training_courses','course_categories','main_categories'));
    }
    public function Store(Request $request)
    {
    
      $training_course = new TrainingCourse();
      $training_course->main_category_id= $request->main_category_id;
      $training_course->course_category_id=$request->course_category_id;
      $training_course->course_title= $request->course_title;
      $training_course->training_fee= $request->training_fee;
      $training_course->short_description=$request->short_description;
      $training_course->course_description=$request->course_description;
      $training_course->learning_outcomes=$request->learning_outcomes;
      $training_course->status=$request->status;
      $training_course->image= $filename;
      $image =$request->file('file');
      $filename=null;
      if ($image) {
          $filename = time() . $image->getClientOriginalName();

          Storage::disk('public')->putFileAs(
              'Training Courses/',
              $image,
              $filename
          );


      }
      $training_course->save();
      return response()->json($training_course);

    }
}
