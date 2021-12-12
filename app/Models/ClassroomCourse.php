<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MainCategory;
use App\Models\CourseCategory;
use App\Models\ClassroomInfo;
use App\Models\ClassroomTrainer;

class ClassroomCourse extends Model
{
    use HasFactory;
    protected $table ="classroom_courses";

  public function main_category(){
    return $this->belongsTo(MainCategory::class, 'main_category_id');
  }

  public function course_category(){
    return $this->belongsTo(CourseCategory::class, 'course_category_id');
  }
  public function classroom_course_details()
  {
    return $this->belongsTo(ClassroomInfo::class, 'classroom_course_id','id');
  }
  public function trainer(){

    return $this->belongsTo(ClassroomTrainer::class,'trainer_id');
   }
}
