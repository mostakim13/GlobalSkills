<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\MainCategory;
use App\Models\Course;
use App\Models\CourseOverview;
use App\Models\Section;
use App\Models\Lesson;
use App\Models\UserEnrollment;
use Auth;
use App\Models\CourseReview;
use App\Models\Trainer;
use App\Models\Evolution;
use \PDF;

class UserEnrollmentController extends Controller
{
  public function __construct()
  {
      //session()->put('checkout', true);
      $this->middleware('auth');
  }
    public function index($id,$slug)

    {

        $user_enrollment= UserEnrollment::where('course_id',$id)->where('user_id',Auth::id())->get();
          //dd($user_enrollment);
        //dd(count($user_enrollment));
        if(count($user_enrollment) > 0 ){
          $course_categories= CourseCategory::all();
          $main_categories= MainCategory::all();
          $course= Course::find($id);
          $section= Section::where('course_id',$id)->first();
          $course_details= CourseOverview::where('course_id',$id)->get();
          $sections= Section::where('course_id',$id)->get();
          $lessons= Lesson::where('course_id',$id)->get();

          $vimeo_ids= Course::
          leftJoin('lessons', 'courses.id', '=', 'lessons.course_id')
              ->where('courses.id',$id)
              ->get();
              /*foreach ($vimeo_ids as $value){
                  $data[] = ($value->video_type == 'Youtube') ? $value->youtube_url : $value->vimeo_id;
              }*/

            $vimeo=$vimeo_ids->pluck('vimeo_id');
            $youtube=$vimeo_ids->pluck('youtube_url');
            $type=$vimeo_ids->pluck('video_type');
            $courseReview=CourseReview::with('user')->where('course_id',$id)->where('status','approve')->latest()->get();
            $rating = CourseReview::where('course_id',$id)->where('status','approve')->avg('rating');
            $avgRating = number_format($rating,1);
            $trainer= Trainer::where('course_id',$id)->get();

            $enrolled= UserEnrollment::where('course_id',$id)->where('user_id',Auth::id())->first();
            //dd($enrolled);
            //$tr= Trainer::find($id);
            $data=Lesson::where('course_id',$id)->sum('duration');


             //dd($data);
          return view('/frontend/users/user_enrollment',compact('course_categories','main_categories','course','section','course_details','sections','lessons','vimeo','youtube','type','courseReview','rating','avgRating','trainer','enrolled','data'));

        } else{
          $notification=array(
              'message'=>"You're not eligible to access this page!!!",
              'alert-type'=>'danger'
          );
          //session()->forget('cart');

          return redirect('/user_profile')->with($notification);

        }

    }

    public function getVimeoId(Request $request){
        //dd($request->course_id);
       return $course= Course::
            leftJoin('lessons', 'courses.id', '=', 'lessons.course_id')
            ->where('courses.id',$request->course_id)
            ->get()->pluck('vimeo_id');
        //dd($course);
    }
    public function StoreEvolution(Request $request)
    {
      //dd($request);
      $request->validate([
          'trainers_competence'=>'required',
          'experience'=>'required',
          'presentation'=>'required',
          'material'=>'required',
          'usefullness'=>'required',
          'satisfaction'=>'required',
      ]);
      $user_id = $request->user_id;
      $course_id = $request->course_id;
      $trainer_id= $request->trainer_id;
      //$name=$request->name;
      $company_name=$request->company_name;
      $start_date=$request->start_date;
      $end_date=$request->end_date;
      $reason=$request->reason;
      $trainers_competence=$request->trainers_competence;
      $experience=$request->experience;
      $presentation=$request->presentation;
      $material=$request->material;
      $usefullness=$request->usefullness;
      $satisfaction=$request->satisfaction;

      $evolution = new Evolution();
      $evolution->user_id = $user_id;
      $evolution->trainer_id = $trainer_id;
      $evolution->course_id= $course_id;
      //evolution->name= $name;
      $evolution->company_name = $company_name;
      $evolution->start_date = $start_date;
      $evolution->end_date = $end_date;
      $evolution->reason = $reason;

      $evolution->trainers_competence = $trainers_competence;
      $evolution->experience = $experience;

      $evolution->presentation = $presentation;
      $evolution->material = $material;
      $evolution->usefullness = $usefullness;
      $evolution->satisfaction = $satisfaction;

      $evolution->save();
      if($evolution->course->accredation_name)
      {
        $trainer=Trainer::where('course_id',$evolution->course_id)->first();
        $pdf= PDF::loadview('certificate',compact('evolution','trainer'));
        return $pdf->download('certificate.pdf');

      }

      else{

      $trainer=Trainer::where('course_id',$evolution->course_id)->first();
      $pdf= PDF::loadview('certificate_e-learning',compact('evolution','trainer'));
       $pdf->setPaper('A4', 'landscape');
      return $pdf->download('certificate.pdf');
        }
      $notification=array(
          'message'=>'Evolution submitted successfully!!!',
          'alert-type'=>'success'
      );

    //return Redirect()->back()->with($notification);


      //return view('frontend.pages.certificate',compact('evolution','evolutions'))->with($notification);

    }


}
