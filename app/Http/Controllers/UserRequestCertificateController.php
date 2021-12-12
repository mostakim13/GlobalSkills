<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRequestCertificateModel;
use PDF;
use App\Models\ClassroomTrainer;

class UserRequestCertificateController extends Controller
{
    public function index()
    {
      return view('frontend.pages.request_certificate');
    }
    public function store(Request $request)
    {
      //dd($request);
      $classroom_course_id = $request->classroom_course_id;
    //  $trainer_id=$request->trainer_id;
      $name = $request->name;
      $email= $request->email;
      $phone=$request->phone;
      $start_date=$request->start_date;
      $end_date=$request->end_date;
      $total_hours=$request->total_hours;

      $trainer_id= $request->trainer_id;
      //$name=$request->name;
      $company_name=$request->company_name;

      $reason=$request->reason;
      $trainers_competence=$request->trainers_competence;
      $experience=$request->experience;
      $presentation=$request->presentation;
      $material=$request->material;
      $usefullness=$request->usefullness;
      $satisfaction=$request->satisfaction;




      $certificate_request = new UserRequestCertificateModel();
      $certificate_request->name = $name;

      $certificate_request->email = $email;
      $certificate_request->classroom_course_id= $classroom_course_id;

      $certificate_request->phone = $phone;
      $certificate_request->start_date = $start_date;
      $certificate_request->end_date = $end_date;
      $certificate_request->trainer_id = $trainer_id;


      $certificate_request->company_name = $company_name;

      $certificate_request->reason = $reason;
      $certificate_request->total_hours = $total_hours;

      $certificate_request->trainers_competence = $trainers_competence;
      $certificate_request->experience = $experience;

      $certificate_request->presentation = $presentation;
      $certificate_request->material = $material;
      $certificate_request->usefullness = $usefullness;
      $certificate_request->satisfaction = $satisfaction;



      $certificate_request->save();

      $notification=array(
          'message'=>'Your Request has been submitted successfully.... Please Check your email after confirmation!!!',
          'alert-type'=>'success'
      );
        return Redirect()->back()->with($notification);
    }
    public function check()
    {
      $certificate_requests=  UserRequestCertificateModel::all();
      return view('backend.pages.certificate_request',compact('certificate_requests'));
    }
    public function approve($id)
    {
         UserRequestCertificateModel::findOrFail($id)->update([
            'status'=>'approve'
        ]);

        $notification=array(
            'message'=>'Approved!!!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function DownloadPdf($id)
    {
      //dd($id);
      $certificate_request= UserRequestCertificateModel::find($id);
      $trainer=ClassroomTrainer::where('classroom_course_id',$certificate_request->classroom_course_id)->first();
      //dd($trainer);
      $pdf= PDF::loadview('certificate_classroom',compact('certificate_request','trainer'));
       $pdf->setPaper('A4', 'landscape');
      return $pdf->download('certificate.pdf');
    }
}
