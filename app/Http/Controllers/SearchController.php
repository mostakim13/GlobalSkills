<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\MainCategory;
use App\Models\CourseCategory;
use App\Models\ClassroomCourse;

class SearchController extends Controller
{

    // public function searchProduct(Request $request)

    // {
    //     $request->validate([
    //         'search'=>'required'
    //     ]);
    //     $course=Course::where("course_title","LIKE","%".$request->search."%")
    //     ->orwhere('course_image',"LIKE","%".$request->search."%")
    //     ->orwhere('regular_price',"LIKE","%".$request->search."%")
    //     ->orwhere('sale_price',"LIKE","%".$request->search."%")
    //     ->orwhere('id','LIKE',"LIKE","%".$request->search."%")->get();

    //      return view ('search-result',compact('course'));
    // }

    public function searchProduct(Request $request)
    {
                $request->validate([
            'query' => 'required'
        ]);
                $main_categories= MainCategory::all();
            $course_categories= CourseCategory::all();
            $courses= Course::all();
            $courses = Course::paginate(9);
            $lts_c =Course::where('status',1)->latest()->limit(2)->get();
         $data=$course=Course::where('course_title','like','%'.$request->input('query').'%')->get();

         $data1=$course=ClassroomCourse::where('classroom_course_title','like','%'.$request->input('query').'%')->get();

         return view('search-result',['course'=>$data,'course1'=>$data1],compact('main_categories','course_categories','courses','lts_c'));

    }
    public function findProduct(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);

        $course = Course::where("course_title","LIKE","%".$request->search."%") ->take(5)->get();
        $classroom=ClassroomCourse::where("classroom_course_title","LIKE","%".$request->search."%") ->take(5)->get();
                return view('search-course',compact('course','classroom'));
    }


}
