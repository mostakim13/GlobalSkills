<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;
use App\Models\Trainer;

class Evolution extends Model
{
    use HasFactory;
    protected $table ="evolutions";
      protected $guarded =[];
    public function course(){

      return $this->belongsTo(Course::class,'course_id');
     }
     public function users(){

       return $this->belongsTo(User::class,'user_id');
      }
      public function trainer()
      {
         return $this->belongsTo(Trainer::class,'trainer_id');
      }
}
