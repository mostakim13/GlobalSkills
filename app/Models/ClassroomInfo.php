<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseCategory;
use App\Models\ClassroomCourse;


class ClassroomInfo extends Model
{
    use HasFactory;
      protected $table ="classroom_infos";

      public function course_category(){
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
      }
      public function classroom_course(){
        return $this->belongsTo(ClassroomCourse::class, 'classroom_course_id');
      }


}
