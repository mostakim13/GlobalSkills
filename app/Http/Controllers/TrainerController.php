<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Course;
use App\Models\ClassroomCourse;
use App\Models\ClassroomTrainer;
use Validator;
use Response;
use Image;
use Carbon\Carbon;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
class TrainerController extends Controller
{

    public function addTrainer(Request $request)
    {
        $image = $request->file('image');
        $signature = $request->file('signature');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $name_gen1=hexdec(uniqid()).'.'.$signature->getClientOriginalExtension();
        Image::make($image)->save('uploads/trainer/'.$name_gen);
        Image::make($signature)->save('uploads/trainer/'.$name_gen1);
        $save_url = 'uploads/trainer/'.$name_gen;
        $save_url1 = 'uploads/trainer/'.$name_gen1;

        Trainer::insert([

            'name' => $request->name,
            'course_id' => $request->course_id,
            'designation' => $request->designation,
            'facebook_profile' => $request->facebook_profile,
            'linkdin_profile' => $request->linkdin_profile,
            'biography' => $request->biography,
            'image' => $save_url,
            'signature' => $save_url1,
            'created_at' => Carbon::now(),
        ]);

        $notification=array(
            'message'=>'Trainer Upload Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function create()
    {
        $trainer= Trainer::all();
        $course=Course::all();
        return view('backend.pages.trainer.create',compact('trainer','course'));
    }
    public function updateTrainer(Request $request)
    {


        $trainer_id = $request->id;
        $old_img = $request->old_image;
        $old_img1 = $request->old_image1;

        if ($request->file('image') || $request->file('signature')) {
            unlink($old_img);
            unlink($old_img1);
             $image = $request->file('image');
             $image1 = $request->file('signature');
             $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             $name_gen1=hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
             Image::make($image)->save('uploads/trainer/'.$name_gen);
             Image::make($image1)->save('uploads/trainer/'.$name_gen1);
             $save_url = 'uploads/trainer/'.$name_gen;
             $save_url1 = 'uploads/trainer/'.$name_gen1;

             Trainer::findOrFail($trainer_id)->update([
                'name' => $request->name,
                'course_id' => $request->course_id,
                'designation' => $request->designation,
                'facebook_profile' => $request->facebook_profile,
                'linkdin_profile' => $request->linkdin_profile,
                'biography' => $request->biography,
                'image' => $save_url,
                'signature' => $save_url1,
                 'updated_at' => Carbon::now(),
             ]);

             $notification=array(
                 'message'=>'Trainer Success',
                 'alert-type'=>'success'
             );
             return Redirect()->back()->with($notification);
        }else {
         Trainer::findOrFail($trainer_id)->update([
            'name' => $request->name,
            'course_id' => $request->course_id,
            'designation' => $request->designation,
            'facebook_profile' => $request->facebook_profile,
            'linkdin_profile' => $request->linkdin_profile,
            'biography' => $request->biography,
             'updated_at' => Carbon::now(),
         ]);

         $notification=array(
             'message'=>'Trainer Update Success',
             'alert-type'=>'success'
         );
         return Redirect()->back()->with($notification);
        }

    }


    public function deleteTrainer($trainer_id){

        $trainer = Trainer::findOrFail($trainer_id);
        $img = $trainer->image;
        $img1 = $trainer->signature;
        unlink($img);
        unlink($img1);
        Trainer::findOrFail($trainer_id)->delete();
        $notification=array(
         'message'=>'Brand Delete Success',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
    }

    public function addTrainer1(Request $request)
   {
    $image = $request->file('image');
    $signature = $request->file('signature');
    $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    $name_gen1=hexdec(uniqid()).'.'.$signature->getClientOriginalExtension();
    Image::make($image)->save('uploads/trainer/'.$name_gen);
    Image::make($signature)->save('uploads/trainer/'.$name_gen1);
    $save_url = 'uploads/trainer/'.$name_gen;
    $save_url1 = 'uploads/trainer/'.$name_gen1;

    ClassroomTrainer::insert([

        'name' => $request->name,
        'classroom_course_id' => $request->classroom_course_id,
        'designation' => $request->designation,
        'facebook_profile' => $request->facebook_profile,
        'linkdin_profile' => $request->linkdin_profile,
        'biography' => $request->biography,
        'image' => $save_url,
        'signature' => $save_url1,
        'created_at' => Carbon::now(),
    ]);

    $notification=array(
        'message'=>'Trainer Upload Success',
        'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification);
   }
   public function create1()
   {

       $trainer= ClassroomTrainer::all();
       $classroom_course=ClassroomCourse::all();
       return view('backend.pages.trainer.classroom-create',compact('trainer','classroom_course'));
   }
   public function updateTrainer1(Request $request)
   {
    $trainer_id = $request->id;
    $old_img = $request->old_image;
    $old_img1 = $request->old_image1;

    if ($request->file('image') || $request->file('signature')) {
        unlink($old_img);
        unlink($old_img1);
         $image = $request->file('image');
         $image1 = $request->file('signature');
         $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         $name_gen1=hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
         Image::make($image)->save('uploads/trainer/'.$name_gen);
         Image::make($image1)->save('uploads/trainer/'.$name_gen1);
         $save_url = 'uploads/trainer/'.$name_gen;
         $save_url1 = 'uploads/trainer/'.$name_gen1;

         ClassroomTrainer::findOrFail($trainer_id)->update([
            'name' => $request->name,
            'classroom_course_id' => $request->classroom_course_id,
            'designation' => $request->designation,
            'facebook_profile' => $request->facebook_profile,
            'linkdin_profile' => $request->linkdin_profile,
            'biography' => $request->biography,
            'image' => $save_url,
            'signature' => $save_url1,
             'updated_at' => Carbon::now(),
         ]);

         $notification=array(
             'message'=>'Trainer Success',
             'alert-type'=>'success'
         );
         return Redirect()->back()->with($notification);
    }else {
     ClassroomTrainer::findOrFail($trainer_id)->update([
        'name' => $request->name,
        'classroom_course_id' => $request->classroom_course_id,
        'designation' => $request->designation,
        'facebook_profile' => $request->facebook_profile,
        'linkdin_profile' => $request->linkdin_profile,
        'biography' => $request->biography,
         'updated_at' => Carbon::now(),
     ]);

     $notification=array(
         'message'=>'Trainer Update Success',
         'alert-type'=>'success'
     );
     return Redirect()->back()->with($notification);
    }
   }


   public function deleteTrainer1($trainer_id){

    $trainer = ClassroomTrainer::findOrFail($trainer_id);
    $img = $trainer->image;
    $img1 = $trainer->signature;
    unlink($img);
    unlink($img1);
    ClassroomTrainer::findOrFail($trainer_id)->delete();
    $notification=array(
     'message'=>'Brand Delete Success',
     'alert-type'=>'success'
 );
 return Redirect()->back()->with($notification);
 }

}
