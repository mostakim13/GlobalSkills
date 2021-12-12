<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Multiple;
use App\Models\Picture;
use App\Models\Description;
use App\Models\TrueFalse;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function index(){

        $courses = Course::orderBy('course_title','ASC')->get();
        return view('backend.pages.quiz.addQuestion',compact('courses'));
    }
    //===============================Multiple Question Store======================
    public function multipleStore(Request $request){
        $request->validate([
            'course_id' => 'required',
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'answer' => 'required',
        ],[
            'question.required' => 'Please input question',
            'option1.required' => 'Please input first option',
            'option2.required' => 'Please input first option',
            'option3.required' => 'Please input first option',
            'option4.required' => 'Please input first option',
            'answer.required' => 'Please input answer',
        ]);
        Multiple::insert([
            'course_id' => $request->course_id,
            'question' => $request->question,
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'option4' => $request->option4,
            'answer' => $request->answer,
        ]);
        $notification=array(
            'message'=>'Multiple Question Added Success',
            'alert-type' =>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //=====================================Description Type Question Store===========================
    public function descriptionStore(Request $request){
        $request->validate([
            'course_id' => 'required',
            'question' => 'required',
        ],[
            'question.required' => 'Please input question',
        ]);
        Description::insert([
            'course_id' => $request->course_id,
            'question' => $request->question,
        ]);
        $notification=array(
            'message'=>'Description Question Added Success',
            'alert-type' =>'success'
        );
        return Redirect()->back()->with($notification);
    }

    //==========================Picture Type Question Store===========================
    public function pictureStore(Request $request){
        $request->validate([
            'course_id' => 'required',
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
        ],[
            'question.required' => 'Please input question',
            'option1.required' => 'Please input first option',
            'option2.required' => 'Please input first option',
            'option3.required' => 'Please input first option',
            'option4.required' => 'Please input first option',
            'answer.required' => 'Please input answer',
        ]);
        $image = $request->file('question_image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,110)->save('uploads/quizPicture/'.$name_gen);
        $save_url = 'uploads/quizPicture/'.$name_gen;
    
        Picture::insert([
            'course_id' => $request->course_id,
            'question' => $request->question,
            'option1' => $request->option1,
            'option2' => $request->option2,
            'option3' => $request->option3,
            'option4' => $request->option4,
            'answer' => $request->answer,
            'question_image' => $save_url,
        ]);
        $notification=array(
            'message'=>'Picture Type Question Added Success',
            'alert-type' =>'success'
        );
        return Redirect()->back()->with($notification);
    }
    

//====================================True False Question Store==========================
public function trueFalseStore(Request $request){
    $request->validate([
        'course_id' => 'required',
        'question' => 'required',
        'option1' => 'required',
        'option2' => 'required',
        'answer' => 'required',
    ],[
        'question.required' => 'Please input question',
        'option1.required' => 'Please input first option',
        'option2.required' => 'Please input second option',
        'answer.required' => 'Please input answer',
    ]);
    TrueFalse::insert([
        'course_id' => $request->course_id,
        'question' => $request->question,
        'option1' => $request->option1,
        'option2' => $request->option2,
        'answer' => $request->answer,
    ]);
    $notification=array(
        'message'=>'True False Question Added Success',
        'alert-type' =>'success'
    );
    return Redirect()->back()->with($notification);
}

//========================================View Questions===============================
public function viewQuestions(){

    return view('backend.pages.quiz.view_question.index');
}

public function viewMultipleQuestions(){
    $multiples = Multiple::all();
    return view('backend.pages.quiz.view_question.viewMultiple',compact('multiples'));
}

public function viewDescriptionQuestions(){
    $descriptions = Description::all();
    return view('backend.pages.quiz.view_question.viewDescription',compact('descriptions'));
}

public function viewPictureQuestions(){
    $pictures = Picture::all();
    return view('backend.pages.quiz.view_question.viewPicture',compact('pictures'));
}

public function viewTrueFalseQuestions(){
    $truefalses = TrueFalse::all();
    return view('backend.pages.quiz.view_question.viewTrueFalse',compact('truefalses'));
}

 //===========================================Edit Questions====================================
 public function editMultipleQuestions($question_id){
    $multiples = Multiple::findOrFail($question_id);
    $courses = Course::latest()->get();
    return view('backend.pages.quiz.edit_question.editMultiple',compact('multiples','courses'));
}

public function editDescriptionQuestions($question_id){
    $descriptions = Description::findOrFail($question_id);
    $courses = Course::latest()->get();
    return view('backend.pages.quiz.edit_question.editDescription',compact('descriptions','courses'));
}

public function editPictureQuestions($question_id){
    $pictures = Picture::findOrFail($question_id);
    $courses = Course::latest()->get();
    return view('backend.pages.quiz.edit_question.editPicture',compact('pictures','courses'));
}

public function editTrueFalseQuestions($question_id){
    $truefalses = TrueFalse::findOrFail($question_id);
    $courses = Course::latest()->get();
    return view('backend.pages.quiz.edit_question.editTrueFalse',compact('truefalses','courses'));
}

//==========================UPDATE QUESTION=================================
//multiple update
public function multipleUpdate(Request $request){
    $question_id = $request->question_id;

    $request->validate([
        'course_id' => 'required',
        'question' => 'required',
        'option1' => 'required',
        'option2' => 'required',
        'option3' => 'required',
        'option4' => 'required',
        'answer' => 'required',
    ]);

            Multiple::findOrFail($question_id)->update([
                'course_id' => $request->course_id,
                'question' => $request->question,
                'option1' => $request->option1,
                'option2' => $request->option2,
                'option3' => $request->option3,
                'option4' => $request->option4,
                'answer' => $request->answer,
                'updated_at' => Carbon::now(),


    ]);
    $notification=array(
        'message'=>'Multiple Question Update Success',
        'alert-type'=>'success'
    );
    return Redirect()->route('view-multiple-questions')->with($notification);
}


//picture question update
public function pictureUpdate(Request $request){
    $question_id = $request->question_id;
    $oldImage = $request->old_img;
    unlink($oldImage);
    $image = $request->file('question_image');
    $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(917,1000)->save('uploads/quizPicture/'.$name_gen);
    $save_url = 'uploads/quizPicture/'.$name_gen;
    
    $request->validate([
        'course_id' => 'required',
        'question' => 'required',
        'option1' => 'required',
        'option2' => 'required',
        'option3' => 'required',
        'option4' => 'required',
        'answer' => 'required',
    ]);

    Picture::findOrFail($question_id)->update([
        'course_id' => $request->course_id,
        'question_image' => $save_url,
        'question' => $request->question,
        'option1' => $request->option1,
        'option2' => $request->option2,
        'option3' => $request->option3,
        'option4' => $request->option4,
        'answer' => $request->answer,
        'updated_at' => Carbon::now(),


    ]);
    $notification=array(
        'message'=>'Picture Question Update Success',
        'alert-type'=>'success'
    );
    return Redirect()->route('view-picture-questions')->with($notification);

}

//Description question update
public function descriptionUpdate(Request $request){
    $question_id = $request->question_id;

    $request->validate([
        'question' => 'required',
    ]);

            Description::findOrFail($question_id)->update([
                'question' => $request->question,
                'updated_at' => Carbon::now(),

    ]);
    $notification=array(
        'message'=>'Description Question Update Success',
        'alert-type'=>'success'
    );
    return Redirect()->route('view-description-questions')->with($notification);
}

//True False Question update
public function trueFalseUpdate(Request $request){
    $question_id = $request->question_id;

    $request->validate([
        'course_id' => 'required',
        'question' => 'required',
        'option1' => 'required',
        'option2' => 'required',
        'answer' => 'required',
    ]);

            TrueFalse::findOrFail($question_id)->update([
                'course_id' => $request->course_id,
                'question' => $request->question,
                'option1' => $request->option1,
                'option2' => $request->option2,
                'answer' => $request->answer,
                'updated_at' => Carbon::now(),

    ]);
    $notification=array(
        'message'=>'True False Question Update Success',
        'alert-type'=>'success'
    );
    return Redirect()->route('view-trueFalse-questions')->with($notification);
}

//=======================================Delete Question========================
public function deleteMultiple($question_id){
    Multiple::findOrFail($question_id)->delete();
    $notification=array(
     'message'=>'Question Delete Success',
     'alert-type'=>'success'
 );
 return Redirect()->back()->with($notification);
}

public function deleteDescription($question_id){
    Description::findOrFail($question_id)->delete();
    $notification=array(
     'message'=>'Question Delete Success',
     'alert-type'=>'success'
 );
 return Redirect()->back()->with($notification);
}

public function deletePicture($question_id){
    Picture::findOrFail($question_id)->delete();
    $notification=array(
     'message'=>'Question Delete Success',
     'alert-type'=>'success'
 );
 return Redirect()->back()->with($notification);
}

public function deleteTrueFalse($question_id){
    TrueFalse::findOrFail($question_id)->delete();
    $notification=array(
     'message'=>'Question Delete Success',
     'alert-type'=>'success'
 );
 return Redirect()->back()->with($notification);
}

public function onlineQuiz(){

    return view('frontend.pages.quiz.index');
}



public function courseMock($id){
    $courses = Course::where('id', $id)->get();
    return view('frontend.pages.quiz.index',compact('courses'));
  }

}
