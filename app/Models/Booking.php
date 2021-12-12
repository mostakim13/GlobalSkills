<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassroomCourse;
use App\Models\User;
use App\Models\CourseCategory;
use App\Models\Booking;
use Auth;


class Booking extends Model
{
    use HasFactory;
    protected $table ="bookings";
    public function classroom_course(){
      return $this->belongsTo(ClassroomCourse::class, 'classroom_course_id');
    }


    public function user(){
      return $this->belongsTo(User::class, 'user_id');
    }
    public function course_category()
    {
      return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }


    Static  public function totalBookings()
      {
        if (Auth::check()) {
          $bookings =Booking::orWhere('user_id',Auth::id())
          ->orWhere('ip_address', request()->ip())->get();
        }else{

          $bookings = Booking::orWhere('ip_address',request()->ip())->get();
        }


        return $bookings;

      }

}
