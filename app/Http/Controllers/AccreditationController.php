<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accreditation;
use Illuminate\Support\Facades\Storage;
class AccreditationController extends Controller
{
    public function Manage()
    {

        $accreditations = Accreditation::all();
      return view('backend.pages.accreditation',compact('accreditations'));
    }
    public function Store(Request $request)
    {


      $name = $request->name;
      $accreditation_image =$request->file('file');
      $filename=null;
      if ($accreditation_image) {
          $filename = time() . $accreditation_image->getClientOriginalName();

          Storage::disk('public')->putFileAs(
              'Accreditation/',
              $accreditation_image,
              $filename
          );


      }

      $accreditation = new Accreditation();


      $accreditation->name= $name;

      $accreditation->accreditation_image= $filename;


      $accreditation->save();
      return back()->with('accreditation_added','Accreditation record has been added successfully!');


    }
    public function delete($id)
    {
      $accreditation = Accreditation::find($id);

      $accreditation->delete();
      return back()->with('accreditation_deleted','Accreditation record has been deleted successfully!');
    }
}
