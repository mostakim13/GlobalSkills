<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralException;
use App\Models\Course;
use App\Models\Division\Division;
use App\Models\UserEnrollment;
use Illuminate\Http\Request;
Use App\Models\User;
use App\Models\Evolution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Throwable;

class UserController extends Controller
{
    public function List()
    {
        //$users = App\Models\User::all();


        //$courses= Course::leftJoin('user_enrollments', 'courses.id', '=', 'user_enrollments.course_id')->get();
      //$users= User::select('users.*')->leftJoin('user_enrollments', 'users.id', '=', 'user_enrollments.user_id')->get();
      $users= User::with('user_enrollments')->get();
      //dd($users);
     // $users= User::all();
        $data['course']     = ['' => ''] + Course::getAllCoursesArray();
      return view('backend.pages.user_list',compact('data','users'));

    }
    public function deleteUser($id)
    {
      $user = User::find($id);

      $user->delete();
      return back()->with('user_deleted','User record has been deleted successfully!');
    }
    public function getProductPrice(Request $request)
    {
        try {
            $course_detail = Course::where('id',$request->course_id)->first();

            return json_encode($course_detail);
        } catch (Throwable $e) {
            return false;
        }
    }
    public function storeEnrollCourse(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'user_id'           => 'required',
                'regular_price'     => 'required',
                'access'            => 'required',
                'course_id'      => 'required|unique:user_enrollments,course_id,' . $request->id . ',id,user_id,' . $request->user_id,
            ],
                [
                    'course_id.unique' => ' Program name is already exist',
                ]);
            if($validator->fails()) {
                return response()->json($validator->errors(), 400);
                //return back()->withInput()->withErrors($validator->errors());
            }
            $data = new UserEnrollment();
            $data->user_id          = $request->user_id;
            $data->course_id        = $request->course_id;
            $data->regular_price    = $request->regular_price;
            $data->access           = $request->access;
            $data->created_by       = Auth::id();
            $data->save();

            return response()->json([
                'success' => 'true',
            ], 200);
        }catch (Throwable $e){
            DB::rollback();
            return response()->json([
                'success' => 'false',
                'errors'  => $e->getMessage(),
            ], 400);
        }


    }
    public function ManageEvolution()
    {
      $evolutions=Evolution::all();
      return view('backend.pages.manage_evolution',compact('evolutions'));
    }
}
