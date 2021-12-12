<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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


class CourseController extends Controller
{

  public function Manage()
  {
    $trainer= Trainer::all();
    $course_details= CourseOverview::all();
    $courses= Course::all();
    $course_categories= CourseCategory::all();
    $main_categories= MainCategory::all();
    $section= Section::all();
    $lessons= Lesson::all();


    return view('backend.pages.courses.manage',compact('course_categories','main_categories','courses','course_details','section','lessons','trainer'));
  }

  public function StoreCourse(Request $request)
  {
    $main_category_id = $request->main_category_id;
    $course_category_id = $request->course_category_id;


    $course_title=$request->course_title;
    $elearning_slug = strtolower(str_replace(' ','-',$request->course_title));
    $regular_price=$request->regular_price;
    $sale_price=$request->sale_price;

    $status = $request->status;
    $preview_id=$request->preview_id;
    $video_type=$request->video_type;
    $accredation_name=$request->accredation_name;


    $course_image =$request->file('file');
    $filename=null;
    if ($course_image) {
        $filename = time() . $course_image->getClientOriginalName();

        Storage::disk('public')->putFileAs(
            'courses/',
            $course_image,
            $filename
        );


    }

    $course = new Course();
    $course->main_category_id = $main_category_id;
    $course->course_category_id =$course_category_id;

    $course->course_title=$course_title;
    $course->elearning_slug=$elearning_slug;
    $course->regular_price=$regular_price;
    $course->sale_price=$sale_price;

    $course->status= $status;
    $course->preview_id=$preview_id;
    $course->video_type=$video_type;
    $course->accredation_name=$accredation_name;

    $course->course_image= $filename;


    $course->save();
    $notification=array(
        'message'=>'Course record has been added successfully!!!',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);

  }

  public function updateCourse(Request $request)
  {
    $main_category_id = $request->main_category_id;
    $course_category_id= $request->course_category_id;

    $course_title=$request->course_title;
    $elearning_slug = strtolower(str_replace(' ','-',$request->course_title));
    $regular_price= $request->regular_price;
    $sale_price= $request-> sale_price;
    $accredation_name=$request->accredation_name;
    $course_image =$request->file('file');
    $filename=null;
    $uploadedFile = $request->file('image');
    $oldfilename = $course['course_image'] ?? 'demo.jpg';

    $oldfileexists = Storage::disk('public')->exists('courses/' . $oldfilename);

    if ($uploadedFile !== null) {

        if ($oldfileexists && $oldfilename != $uploadedFile) {
            //Delete old file
            Storage::disk('public')->delete('courses/' . $oldfilename);
        }
        $filename_modified = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
        $filename = time() . '_' . $filename_modified;

        Storage::disk('public')->putFileAs(
            'courses/',
            $uploadedFile,
            $filename
        );

        $data['image'] = $filename;
    } elseif (empty($oldfileexists)) {
        throw new GeneralException('Course image not found!');
        //return redirect()->back()->with(['flash_danger' => 'User image not found!']);
        //file check in storage

    }

    $status = $request->status;
    $course_categories= CourseCategory::all();
    $main_categories= MainCategory::all();
    $course = Course::find($request->id);
    $course->main_category_id = $main_category_id;
    $course->course_category_id= $course_category_id;
    $course->course_title= $course_title;
    $course->elearning_slug=$elearning_slug;
    $course->regular_price= $regular_price;
    $course-> sale_price= $sale_price;
    $course->course_image= $filename;
    $course->accredation_name=$accredation_name;

    $course->status= $status;

    $course->save();
    $notification=array(
        'message'=>'Course record has been updated successfully!!!',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);


  }
  public function deleteCourse($id)
  {
    $course = Course::find($id);

    $course->delete();
    $notification=array(
        'message'=>'Course record has been deleted successfully!!!',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification);


  }
  public function CourseDetails($id)
  {

    $course_categories= CourseCategory::all();
    $main_categories= MainCategory::all();
    $course = Course::find($id);
    $section= Section::where('course_id',$id)->first();

    $course_details= CourseOverview::where('course_id',$id)->get();
    $sections= Section::where('course_id',$id)->get();

    $lessons= Lesson::where('course_id',$id)->get();



    return view('/backend/pages/courses.course_details',compact('course','main_categories','course_categories','course_details', 'sections','lessons','section'));
  }
  public function StoreCourseDetails(Request $request)
  {

    $main_category_id = $request->main_category_id;
    $course_category_id = $request->course_category_id;
    $course_id=$request->course_id;
    $short_description = $request->short_description;
    $course_description = $request->course_description;
    $learning_outcomes = $request->learning_outcomes;
    $certification =$request->certification;

    $instructor_id= $request->instructor_id;
    $skill= $request->skill;
    $language= $request->language;
    $quiz= $request->quiz;



    $banner_image =$request->file('file');
    $filename=null;
    if ($banner_image) {
        $filename = time() . $banner_image->getClientOriginalName();

        Storage::disk('public')->putFileAs(
            'courses/banners/',
            $banner_image,
            $filename
        );


    }

    $course_details = new CourseOverview();
    $course_details->main_category_id = $main_category_id;
    $course_details->course_category_id =$course_category_id;
    $course_details->course_id=$course_id;
    $course_details->short_description=$short_description;
    $course_details->course_description=$course_description;

    $course_details->learning_outcomes= $learning_outcomes;
    $course_details->certification= $certification;

    $course_details->instructor_id= $instructor_id;
    $course_details->skill= $skill;
    $course_details->language= $language;
    $course_details-> quiz =$quiz;

    $course_details->banner_image= $filename;


    $course_details->save();
    return back()->with('coursedetails_added','Course details record has been added successfully!');
  }
  public function UpdateCourseDetails(Request $request)
  {
    $course_id=$request->course_id;
    $short_description = $request->short_description;
    $course_description = $request->course_description;
    $learning_outcomes = $request->learning_outcomes;
    $certification =$request->certification;

    $instructor_id= $request->instructor_id;
    $skill= $request->skill;
    $language= $request->language;
    $quiz= $request->quiz;


    $filename=null;
    $uploadedFile = $request->file('image');
    $oldfilename = $course['banner_image'] ?? 'demo.jpg';

    $oldfileexists = Storage::disk('public')->exists('courses/banners/' . $oldfilename);

    if ($uploadedFile !== null) {

        if ($oldfileexists && $oldfilename != $uploadedFile) {
            //Delete old file
            Storage::disk('public')->delete('courses/banners/' . $oldfilename);
        }
        $filename_modified = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
        $filename = time() . '_' . $filename_modified;

        Storage::disk('public')->putFileAs(
            'courses/banners/',
            $uploadedFile,
            $filename
        );

        $data['image'] = $filename;
    } elseif (empty($oldfileexists)) {
        throw new GeneralException('Classroom Course banner image not found!');
        //return redirect()->back()->with(['flash_danger' => 'User image not found!']);
        //file check in storage

    }

    $course_details = CourseOverview::find($request->id);
    $course_details->course_id=$course_id;
    $course_details->short_description=$short_description;
    $course_details->course_description=$course_description;

    $course_details->learning_outcomes= $learning_outcomes;
    $course_details->certification= $certification;

    $course_details->instructor_id= $instructor_id;
    $course_details->skill= $skill;
    $course_details->language= $language;
    $course_details-> quiz =$quiz;

    $course_details->banner_image= $filename;

    $course_details->save();
    $notification=array(
        'message'=>'Course details record has been updated successfully!!!',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);

  }



  public function course_details_frontend($id,$slug)
  {

    $course_categories= CourseCategory::all();
    $main_categories= MainCategory::all();
    //$course = Course::find($id);

    $course_details= CourseOverview::where('course_id',$id)->get();
    //$sections= Section::where('course_id',$id)->get();
    //$lessons= Lesson::where('course_id',$id)->get();
    $course= Course::with(['sections.lessons'])->where('id',$id)->first();


    $enrolled= UserEnrollment::where('user_id',Auth::id())->where('course_id',$id)->first();
    $courseReview=CourseReview::with('user')->where('course_id',$id)->where('status','approve')->latest()->get();
    $rating = CourseReview::where('course_id',$id)->where('status','approve')->avg('rating');
    $avgRating = number_format($rating,1);
    $trainer= Trainer::where('course_id',$id)->get();
    $data=Lesson::where('course_id',$id)->sum('duration');



    return view('/backend/pages/courses.course_details_index',compact('course_details','main_categories','course_categories','course','enrolled','courseReview','avgRating','trainer','data'));
  }

  public function StoreSection(Request $request)
  {

    $order = $request->order;
    $section_name = $request->section_name;
    $course_id=$request->course_id;
    //$duration-$request->duration;

    $section = new Section();
    $section->order = $order;
    $section->course_id= $course_id;

    $section->section_name= $section_name;
    //$section->duration= $duration;




    $section->save();
    return back()->with('section_added','Section record has been added successfully!');


  }
  public function sectionEditStore(Request $request)
       {
         $section_id = $request->section_id;

         Section::findOrFail($section_id)->Update([
             'order' => $request->order,
             'course_id'=>$request->course_id,
             'section_name' => $request->section_name,
            ]);
            $notification=array(
             'message'=>'Section Update Success',
             'alert-type'=>'success'
         );
         return Redirect()->back()->with($notification);
       }

       public function sectionDelete($section_id)
       {
         Section::findOrFail($section_id)->delete();
         $notification=array(
         'message'=>'Delete Success',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
       }









  public function StoreLesson(Request $request)
  {
    //dd($request->all());
    function ISO8601ToSeconds($ISO8601){
       $interval = new \DateInterval($ISO8601);

       return ($interval->d * 24 * 60 * 60) +
           ($interval->i * 60) +
           $interval->s;
       }
     //dd($request->all());
     $course_id = $request->course_id;
     $section_id = $request->section_id;

     $video_type = $request->video_type;
     $vimeo_id = $request->vimeo_id;
     $youtube_url = $request->youtube_url;
     $lesson_title = $request->lesson_title;
     $preview =$request->preview;
     $files =$request->file('file');
     $filename=null;
     if ($files) {
         $filename = time() . $files->getClientOriginalName();

         Storage::disk('public')->putFileAs(
             'courses/admin/courses/files',
             $files,
             $filename
         );
     }


     $video_url=$request->youtube_url;
     $api_key='AIzaSyDthwUfyzKUC2Nd_JEvPkLJjG-_ufy_w-E';
     preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match);
      $video_url = $match[1];
     $api_url='https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='.$video_url.'&key='.$api_key;
     $data=json_decode(file_get_contents($api_url));
     $time=$data->items[0]->contentDetails->duration;
      $x=ISO8601ToSeconds($time);



     $lessons = new Lesson();
     $lessons->course_id = $course_id;
     $lessons->section_id =$section_id;
     $lessons->vimeo_id =$vimeo_id;
     $lessons->youtube_url =$youtube_url;
     $lessons->video_type=$video_type;
     $lessons->lesson_title=$lesson_title;
     $lessons->preview=$preview;
     $lessons->duration=$x;

     $lessons->files= $filename;


     $lessons->save();
     return back()->with('lesson_added','Lesson has been added successfully!');
  }
  public function lessonEditStore(Request $request)
         {

           function ISO8601ToSeconds($ISO8601){
             $interval = new \DateInterval($ISO8601);

             return ($interval->d * 24 * 60 * 60) +
                 ($interval->h * 60 * 60) +
                 ($interval->i * 60) +
                 $interval->s;
             }


                     $course_id = $request->course_id;
                     $section_id = $request->section_id;

                     $video_type = $request->video_type;
                     $vimeo_id = $request->vimeo_id;
                     $youtube_url = $request->youtube_url;
                     $lesson_title = $request->lesson_title;
                     $preview =$request->preview;
                     $files =$request->file('file');


                     $filename=null;
                     $uploadedFile = $request->file('lesson_file');
                     $oldfilename = $lessons['files'] ?? 'demo.jpg|png|jpeg|pdf|doc|docx';

                     $oldfileexists = Storage::disk('public')->exists('courses/admin/courses/files/' . $oldfilename);

                     if ($uploadedFile !== null) {

                         if ($oldfileexists && $oldfilename != $uploadedFile) {
                             //Delete old file
                             Storage::disk('public')->delete('courses/admin/courses/files/' . $oldfilename);
                         }
                         $filename_modified = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
                         $filename = time() . '_' . $filename_modified;

                         Storage::disk('public')->putFileAs(
                             'courses/admin/courses/files/',
                             $uploadedFile,
                             $filename
                         );

                         $data['lesson_file'] = $filename;
                     } elseif (empty($oldfileexists)) {
                         //throw new GeneralException('Classroom Course banner image not found!');
                         //return redirect()->back()->with(['flash_danger' => 'User image not found!']);
                         //file check in storage

                     }

                     $video_url=$request->youtube_url;
                     $api_key='AIzaSyDthwUfyzKUC2Nd_JEvPkLJjG-_ufy_w-E';
                     preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match);
                      $video_url = $match[1];
                     $api_url='https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id='.$video_url.'&key='.$api_key;
                     $data=json_decode(file_get_contents($api_url));
                     $time=$data->items[0]->contentDetails->duration;
                      $x=ISO8601ToSeconds($time);

                     $lessons = Lesson::find($request->id);
                     $lessons->course_id = $course_id;
                     $lessons->section_id =$section_id;
                     $lessons->vimeo_id =$vimeo_id;
                     $lessons->youtube_url =$youtube_url;
                     $lessons->video_type=$video_type;
                     $lessons->lesson_title=$lesson_title;
                     $lessons->preview=$preview;
                     $lessons->duration=$x;

                     $lessons->files= $filename;

                     //dd($lessons);
                     $lessons->save();
                     $notification=array(
                         'message'=>'Lesson has been updated successfully!!!',
                         'alert-type'=>'success'
                     );
                     return Redirect()->back()->with($notification);

   }
               public function lessonDelete($lesson_id)
               {
                 Lesson::findOrFail($lesson_id)->delete();
                 $notification=array(
                 'message'=>'Delete Success',
                 'alert-type'=>'success'
              );
                return Redirect()->back()->with($notification);
                 }
                  public function CourseOverview($id){

        $course_categories= CourseCategory::all();
        $main_categories= MainCategory::all();
        $course = Course::find($id);
        $section= Section::where('course_id',$id)->first();

        $course_details= CourseOverview::where('course_id',$id)->get();
        $sections= Section::where('course_id',$id)->get();

        $lessons= Lesson::where('course_id',$id)->get();



        return view('/backend/pages/courses.course_overviews',compact('course','main_categories','course_categories','course_details', 'sections','lessons','section'));
      }
      public function CourseInfo($id)

      {

      //$classroom_course_details= ClassroomInfo::where('classroom_course_id',$id)->first();
      //$classroom_course = ClassroomCourse::find($id);
      $course_categories= CourseCategory::all();
      $main_categories= MainCategory::all();
      $course = Course::find($id);
      $section= Section::where('course_id',$id)->first();

      $course_details= CourseOverview::where('course_id',$id)->first();
      $sections= Section::where('course_id',$id)->get();

      $lessons= Lesson::where('course_id',$id)->get();



          return view('/backend/pages/courses.course_info',compact('course','main_categories','course_categories','course_details', 'sections','lessons','section'));
        }

        public function CourseCurricullum($id)

        {


        $course= Course::with(['sections.lessons'])->where('id',$id)->first();


          return view('/backend/pages/courses.course_curricullum',compact('course'));
        }
        public function subcategoryWiseCourseShow($subcat_id)
           {
             $course= Course::where('course_category_id',$subcat_id)->orderBy('id','DESC')->latest()->limit(2)->paginate(9);

             $course_categories= CourseCategory::all();
             $main_categories= MainCategory::all();
             $lts_c =Course::where('status',1)->latest()->limit(2)->get();

             return view ('frontend.pages.categorywisecourseshow',compact('course_categories','main_categories','course','lts_c'));
           }
           public function paymentSuccess()
         {
           return view ('paymentsuccess');
         }

//==============================MOCK TEST===========================

}
