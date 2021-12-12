<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseReview;
use Auth;
use Carbon\Carbon;

class CourseReviewController extends Controller
{
    public function store(Request $request)
    {
    if (Auth::check())
       {
           $request->validate([
               'rating'=>'required',
               'comment'=>'required',
           ]);
           CourseReview::insert([
               'user_id'=>Auth::id(),
               'course_id'=>$request->course_id,
               'classroomcourse_id'=>$request->classroomcourse_id,
               'comment'=>$request->comment,
               'rating'=>$request->rating,
               'created_at'=>Carbon::now(),
           ]);
           $notification=array(
               'message'=>'Review Successfully Added !!!',
               'alert-type'=>'success'
           );
           return Redirect()->back()->with($notification);
       }
       else
       {
           return Redirect('login');
       }
       }
}
