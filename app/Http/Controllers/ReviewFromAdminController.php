<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseReview;

class ReviewFromAdminController extends Controller
{
    public function create()
    {
        $review=CourseReview::latest()->get();
        return view('backend.pages.review.create',compact('review'));
    }
    public function destroy($review_id)
    {
        CourseReview::findOrFail($review_id)->delete();
        $notification=array(
            'message'=>'Review Deleted !!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function approve($review_id)
    {
        CourseReview::findOrFail($review_id)->update([
            'status'=>'approve'
        ]);
        $notification=array(
            'message'=>'Approved!!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
