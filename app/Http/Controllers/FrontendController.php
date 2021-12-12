<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Models\CourseCategory;
use App\Models\Course;
use App\Models\ClassroomCourse;
use App\Models\ClassroomInfo;
use App\Models\User;
use App\Models\CourseReview;
use App\Models\ClassroomTrainer;

class FrontendController extends Controller
{
  public function index()
  {
    $main_categories= MainCategory::all();
    $course_categories= CourseCategory::all();
    $courses= Course::all();
    $courses = Course::paginate(9);
    $lts_c =Course::where('status',1)->latest()->limit(2)->get();
    return view('frontend.pages.courses',compact('main_categories','course_categories','courses','lts_c'));

  }
  public function course_details()
  {


    return view('frontend.pages.course_details');
  }
  public function index_classroom()
  {
    $main_categories= MainCategory::all();
    $course_categories= CourseCategory::all();
    $classroom_courses= ClassroomCourse::all();
    $classroom_courses = ClassroomCourse::paginate(9);
    $lts_c_c =ClassroomCourse::where('status',1)->latest()->limit(2)->get();
    return view('frontend.pages.classroom_courses',compact('main_categories','course_categories','classroom_courses','lts_c_c'));

  }
  public function course_details_frontend($id,$slug)
  {


    $course_categories= CourseCategory::all();
    $main_categories= MainCategory::all();
    $classroom_course_details= ClassroomInfo::where('classroom_course_id',$id)->first();
    $classroom_course = ClassroomCourse::find($id);

    $courseReview=CourseReview::with('user')->where('classroomcourse_id',$id)->where('status','approve')->latest()->get();
    $rating = CourseReview::where('classroomcourse_id',$id)->where('status','approve')->avg('rating');
    $avgRating = number_format($rating,1);
    $trainer=ClassroomTrainer::where('classroom_course_id',$id)->get();

    return view('frontend.pages.classroom_course_details',compact('course_categories','main_categories','classroom_course_details','classroom_course','courseReview','avgRating','trainer'));
  }
  public function classroom_course_booking($id)
  {

    $classroom_course = ClassroomCourse::find($id);
    //dd($id);

    return back();
  }


}
