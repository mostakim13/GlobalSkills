<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Image;
use Carbon\Carbon;

class FaqController extends Controller
{
    public function index()
    {
      $faqs=Faq::all();
      return view('frontend.pages.faq',compact('faqs'));
    }
    public function create()
    {
      $faqs=Faq::all();
      return view('backend.pages.faq.create',compact('faqs'));
    }
    public function store(Request $request)
    {
      $image = $request->file('image');
      $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->save('uploads/faq/'.$name_gen);
      $save_url = 'uploads/faq/'.$name_gen;

      Faq::insert([

          'subject' => $request->subject,
          'description' => $request->description,
          'video_url' => $request->video_url,
          'image' => $save_url,
          'created_at' => Carbon::now(),
      ]);

      $notification=array(
          'message'=>'Faqs Upload Success',
          'alert-type'=>'success'
      );
      return Redirect()->back()->with($notification);
    }
    public function deleteFaq($faq_id){

      $faq = Faq::findOrFail($faq_id);
      $img = $faq->image;
      unlink($img);
      Faq::findOrFail($faq_id)->delete();
      $notification=array(
       'message'=>'Delete Success',
       'alert-type'=>'success'
   );
   return Redirect()->back()->with($notification);
  }

}
