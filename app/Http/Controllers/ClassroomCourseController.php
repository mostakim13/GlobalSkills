<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MainCategory;
use App\Models\CourseCategory;
use App\Models\ClassroomCourse;
use App\Models\ClassroomInfo;

class ClassroomCourseController extends Controller
{
    public function Manage()

    {
      $classroom_courses= ClassroomCourse::all();
      $course_categories= CourseCategory::all();
      $main_categories= MainCategory::all();




      return view('backend.pages.classroom_courses.manage',compact('course_categories','main_categories','classroom_courses'));
    }
    public function StoreCourse(Request $request)
    {
      $main_category_id = $request->main_category_id;
      $course_category_id = $request->course_category_id;


      $classroom_course_title=$request->classroom_course_title;
      $classroom_slug = strtolower(str_replace(' ','-',$request->classroom_course_title));
      $training_fee=$request->training_fee;
      $exam_fee=$request->exam_fee;

      $status = $request->status;


      $classroom_course_image =$request->file('file');
      $filename=null;
      if ($classroom_course_image) {
          $filename = time() . $classroom_course_image->getClientOriginalName();

          Storage::disk('public')->putFileAs(
              'Classroom courses/',
              $classroom_course_image,
              $filename
          );


      }

      $classroom_course = new ClassroomCourse();
      $classroom_course->main_category_id = $main_category_id;
      $classroom_course->course_category_id =$course_category_id;

      $classroom_course->classroom_course_title=$classroom_course_title;
      $classroom_course->classroom_slug=$classroom_slug;
      $classroom_course->training_fee=$training_fee;
      $classroom_course->exam_fee=$exam_fee;

      $classroom_course->status= $status;

      $classroom_course->classroom_course_image= $filename;


      $classroom_course->save();
      return back()->with('course_added','Course record has been added successfully!');


    }

    public function updateCourse(Request $request)
    {
      $main_category_id = $request->main_category_id;
      $course_category_id= $request->course_category_id;

      $classroom_course_title=$request->classroom_course_title;
      $training_fee= $request->training_fee;
      $exam_fee= $request->exam_fee;
      $classroom_course_image =$request->file('file');
      $filename=null;
      $uploadedFile = $request->file('image');
      $oldfilename = $classroom_course['classroom_course_image'] ?? 'demo.jpg';

      $oldfileexists = Storage::disk('public')->exists('Classroom courses/' . $oldfilename);

      if ($uploadedFile !== null) {

          if ($oldfileexists && $oldfilename != $uploadedFile) {
              //Delete old file
              Storage::disk('public')->delete('Classroom courses/' . $oldfilename);
          }
          $filename_modified = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
          $filename = time() . '_' . $filename_modified;

          Storage::disk('public')->putFileAs(
              'Classroom courses/',
              $uploadedFile,
              $filename
          );

          $data['image'] = $filename;
      } elseif (empty($oldfileexists)) {
          throw new GeneralException('Classroom Course image not found!');
          //return redirect()->back()->with(['flash_danger' => 'User image not found!']);
          //file check in storage

      }



      $status = $request->status;

      $course_categories= CourseCategory::all();
      $main_categories= MainCategory::all();
      $classroom_course = ClassroomCourse::find($request->id);
      $classroom_course->main_category_id = $main_category_id;
      $classroom_course->course_category_id= $course_category_id;

      $classroom_course->classroom_course_title= $classroom_course_title;
      $classroom_course->exam_fee= $exam_fee;
      $classroom_course->training_fee= $training_fee;
      $classroom_course->classroom_course_image= $filename;

      $classroom_course->status= $status;


      $classroom_course->save();
      $notification=array(
          'message'=>'Course record has been updated successfully!!!',
          'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);

    }
    public function deleteCourse($id)
    {
      $classroom_course = ClassroomCourse::find($id);

      $classroom_course->delete();
      $notification=array(
          'message'=>'Course record has been deleted successfully!!!',
          'alert-type'=>'error'
      );
      return Redirect()->back()->with($notification);


    }

    public function CourseDetailsBackend($id)
    {
      $course_categories= CourseCategory::all();
      $main_categories= MainCategory::all();
      $classroom_courses= ClassroomCourse::find($id);
      $classroom_course_details = ClassroomInfo::where('classroom_course_id',$id)->get();

      return view('backend.pages.classroom_courses.course_details',compact('classroom_courses','course_categories','main_categories','classroom_course_details'));
    }
    public function ClassroomCourseInfo($id)

    {


          $course_categories= CourseCategory::all();
          $main_categories= MainCategory::all();
          $classroom_course_details= ClassroomInfo::where('classroom_course_id',$id)->first();
          $classroom_course = ClassroomCourse::find($id);
          return view('/backend/pages/classroom_courses.classroom_course_info',compact('course_categories','main_categories','classroom_course','classroom_course_details'));
        }
        public function StoreClassroomCourseDetails(Request $request)
        {

          $classroom_course_id = $request->classroom_course_id;
          $classroom_short_description = $request->classroom_short_description;
          $classroom_course_description=$request->classroom_course_description;
          $classroom_certification = $request->classroom_certification;
          $classroom_learning_outcomes = $request->classroom_learning_outcomes;

          $classroom_instructor_id= $request->classroom_instructor_id;
          $pass_mark=$request->pass_mark;
          $out_of=$request->out_of;
          $no_of_questions=$request->no_of_questions;
          $exam_type=$request->exam_type;
          $duration=$request->duration;
          $book=$request->book;



          $classroom_banner_image =$request->file('file');
          $filename=null;
          if ($classroom_banner_image) {
              $filename = time() . $classroom_banner_image->getClientOriginalName();

              Storage::disk('public')->putFileAs(
                  'Classroomk Courses/banners/',
                  $classroom_banner_image,
                  $filename
              );


          }

          $classroom_course_details = new ClassroomInfo();

          $classroom_course_details->classroom_course_id=$classroom_course_id;
          $classroom_course_details->classroom_short_description=$classroom_short_description;
          $classroom_course_details->classroom_course_description=$classroom_course_description;
          $classroom_course_details->classroom_certification=$classroom_certification;

          $classroom_course_details->classroom_learning_outcomes= $classroom_learning_outcomes;


          $classroom_course_details->classroom_instructor_id= $classroom_instructor_id;
          $classroom_course_details->pass_mark= $pass_mark;
          $classroom_course_details->out_of= $out_of;
          $classroom_course_details-> no_of_questions =$no_of_questions;

          $classroom_course_details->classroom_banner_image= $filename;
          $classroom_course_details->exam_type=$exam_type;
          $classroom_course_details->duration=$duration;
          $classroom_course_details->book=$book;

          $classroom_course_details->save();
          $notification=array(
              'message'=>'Course details record has been added successfully!!!',
              'alert-type'=>'success'
          );
          return Redirect()->back()->with($notification);


        }
        public function UpdateClassroomCourseDetails(Request $request)
        {
          $classroom_course_id = $request->classroom_course_id;
          $classroom_short_description = $request->classroom_short_description;
          $classroom_course_description=$request->classroom_course_description;
          $classroom_certification = $request->classroom_certification;
          $classroom_learning_outcomes = $request->classroom_learning_outcomes;

          $classroom_instructor_id= $request->classroom_instructor_id;
          $pass_mark=$request->pass_mark;
          $out_of=$request->out_of;
          $no_of_questions=$request->no_of_questions;
          $exam_type=$request->exam_type;
          $duration=$request->duration;
          $book=$request->book;

          $filename=null;
          $uploadedFile = $request->file('image');
          $oldfilename = $classroom_course['classroom_banner_image'] ?? 'demo.jpg';

          $oldfileexists = Storage::disk('public')->exists('Classroomk Courses/banners/' . $oldfilename);

          if ($uploadedFile !== null) {

              if ($oldfileexists && $oldfilename != $uploadedFile) {
                  //Delete old file
                  Storage::disk('public')->delete('Classroomk Courses/banners/' . $oldfilename);
              }
              $filename_modified = str_replace(' ', '_', $uploadedFile->getClientOriginalName());
              $filename = time() . '_' . $filename_modified;

              Storage::disk('public')->putFileAs(
                  'Classroomk Courses/banners/',
                  $uploadedFile,
                  $filename
              );

              $data['image'] = $filename;
          } elseif (empty($oldfileexists)) {
              throw new GeneralException('Classroom Course banner image not found!');
              //return redirect()->back()->with(['flash_danger' => 'User image not found!']);
              //file check in storage

          }

          $classroom_course_details = ClassroomInfo::find($request->id);
          $classroom_course_details->classroom_course_id=$classroom_course_id;
          $classroom_course_details->classroom_short_description=$classroom_short_description;
          $classroom_course_details->classroom_course_description=$classroom_course_description;
          $classroom_course_details->classroom_certification=$classroom_certification;

          $classroom_course_details->classroom_learning_outcomes= $classroom_learning_outcomes;


          $classroom_course_details->classroom_instructor_id= $classroom_instructor_id;
          $classroom_course_details->pass_mark= $pass_mark;
          $classroom_course_details->out_of= $out_of;
          $classroom_course_details-> no_of_questions =$no_of_questions;

          $classroom_course_details->classroom_banner_image= $filename;
          $classroom_course_details->exam_type=$exam_type;
          $classroom_course_details->duration=$duration;
          $classroom_course_details->book=$book;

          $classroom_course_details->save();
          $notification=array(
              'message'=>'Course details record has been updated successfully!!!',
              'alert-type'=>'success'
          );
          return Redirect()->back()->with($notification);

        }
        public function subcategoryWiseClassroomCourseShow($subcat_id)
        {
          $course= ClassroomCourse::where('course_category_id',$subcat_id)->orderBy('id','DESC')->latest()->limit(2)->paginate(9);

          $course_categories= CourseCategory::all();
          $main_categories= MainCategory::all();
          $lts_c_c =ClassroomCourse::where('status',1)->latest()->limit(2)->get();

          return view ('frontend.pages.categorywiseclassroomcourseshow',compact('course_categories','main_categories','course','lts_c_c'));
        }

  }
