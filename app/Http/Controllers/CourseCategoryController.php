<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CourseCategory;
use Image;
use Carbon\Carbon;


class CourseCategoryController extends Controller
{
  public function Manage()

  {
    $course_categories = CourseCategory::all();
    return view('backend.pages.course_category.manage',compact('course_categories'));




  }
  public function storeCourseCategory(Request $request)
  {

    $mcategory_title = $request->mcategory_title;
    $status = $request->status;


    $image =$request->file('file');
    $filename=null;



    $mcategory = new CourseCategory();
    $mcategory->mcategory_title = $mcategory_title;

    $mcategory->status= $status;


    //$service->title=$title;
    //$service->desciption2=$description2;
  //  $service->image_two= $image_two;

    $mcategory->save();
    return back()->with('category_added','Category record has been added successfully!');


  }
  public function editCourseCategory($id)
  {
    $course_category = CourseCategory::find($id);
    return view('/backend/pages/course_category.edit',compact('course_category'));
  }

  public function updateCourseCategory(Request $request)
  {
    $mcategory_title = $request->mcategory_title;

    $status = $request->status;


    $mcategory = CourseCategory::find($request->id);
    $mcategory->mcategory_title = $mcategory_title;

    $mcategory->status= $status;


    $mcategory->save();
      return view('/backend/pages/course_category.manage',compact('mcategory'))->with('category_updated','Category record has been updated successfully!');
  }
  public function deleteCourseCategory($id)
  {
    $mcategory = CourseCategory::find($id);

    $mcategory->delete();
    return back()->with('category_deleted','Category record has been deleted successfully!');
  }
}
