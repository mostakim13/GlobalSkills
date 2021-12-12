<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;
use App\Models\ClassroomCourse;
use App\Models\Checkout;

use Auth;
class Cart extends Model
{
    use HasFactory;
      protected $table ="carts";

          public function course(){
            return $this->belongsTo(Course::class, 'course_id');
          }

          public function classroom_course(){
            return $this->belongsTo(Course::class, 'classroom_course_id');
          }

          public function user(){
            return $this->belongsTo(User::class, 'user_id');
          }


          public function order(){
            return $this->belongsTo(Order::class, 'order_id');
          }

          Static  public function totalCarts()
            {
              if (Auth::check()) {
                $carts =Cart::orWhere('user_id',Auth::id())
                ->orWhere('ip_address', request()->ip())->get();
              }else{

                $carts = Cart::orWhere('ip_address',request()->ip())->get();
              }


              return $carts;

            }




        Static  public function totalItems()
          {
            if (Auth::check()) {
              $carts =Cart::orWhere('user_id',Auth::id())
              ->orWhere('ip_address', request()->ip())->get();
            }else{

              $carts = Cart::orWhere('ip_address',request()->ip())->get();
            }

            $total_items = 0;
            foreach($carts as $cart)
            {
              $total_items += $cart->course_quantity;
            }
            return $total_items;

          }
          public function StoreCheckout(Request $request)
          {

            $course_id = $request->course_id;
            $course_category_id=$request->course_category_id;
            $user_id = $request->user_id;
            $request= $request->amount;
            $ip_address=$request->ip();




              if (Auth::check()) {

                          $checkout= Checkout::where('user_id',Auth::id())

                                      ->where('course_id',$request->course_id)

                                      ->first();
              }

                          $checkout = new Checkout();

                          if (Auth::check()) {
                            $checkout->user_id= Auth::id();
                            $checkout->course_id = $course_id;
                            $checkout->course_category_id= $course_category_id;
                            $checkout->ip_address= $ip_address;
                            $checkout->amount= $amount;


                            $checkout->save();
                              return back()->with('booking_added','You have booked the course successfully! You will get an email or phone after confirmation. For any queries call at +8801766343434');
                          }else {
                            return Redirect('register');
                          }


          }

}
