<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\MainCategory;
use Image;
use Carbon\Carbon;

class MainCategoryController extends Controller
{
    public function add()

    {
      $mcategories = MainCategory::all();
      return view('backend.pages.main_category.add',compact('mcategories'));




    }
    public function storeMCategory(Request $request)
    {

      $mcategory_title = $request->mcategory_title;
      $status = $request->status;


      $image =$request->file('file');
      $filename=null;
      if ($image) {
          $filename = time() . $image->getClientOriginalName();

          Storage::disk('public')->putFileAs(
              'category/',
              $image,
              $filename
          );

          //$data['user_image'] = $filename;
      }
     // $imageName =time().'.'.$image_one->extension();
     // $image_one->move(public_path('images'),$imageName);
    //  $image_two =$request->file('file');
      //$imageName2 =time().'.'.$image_two->extension();
    //  $image_two->move(public_path('images'),$imageName2);

      $mcategory = new MainCategory();
      $mcategory->mcategory_title = $mcategory_title;

      $mcategory->status= $status;

      $mcategory->image= $filename;
      //$service->title=$title;
      //$service->desciption2=$description2;
    //  $service->image_two= $image_two;

      $mcategory->save();
      return back()->with('category_added','Category record has been added successfully!');


    }
    public function editmCategory($id)
    {
      $mcategory = MainCategory::find($id);
      return view('/backend/pages/main_category.edit',compact('mcategory'));
    }

    public function updatemCategory(Request $request)
    {
      $mcategory_title = $request->mcategory_title;

      $status = $request->status;


      $mcategory = MainCategory::find($request->id);
      $mcategory->mcategory_title = $mcategory_title;

      $mcategory->status= $status;


      $mcategory->save();
        return view('/backend/pages/main_category.add',compact('mcategory'))->with('category_updated','Category record has been updated successfully!');
    }
    public function deleteMCategory($id)
    {
      $mcategory = MainCategory::find($id);

      $mcategory->delete();
      return back()->with('category_deleted','Category record has been deleted successfully!');
    }
}
