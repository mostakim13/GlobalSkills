<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClassroomCourse;
use App\Models\ClassroomTrainer;

class UserRequestCertificateModel extends Model
{
    use HasFactory;
  protected $guarded =[];
    public function classroom_course()
    {
        return $this->belongsTo(ClassroomCourse::class,'classroom_course_id');
    }
    public function trainer()
    {
      return $this->belongsTo(ClassroomTrainer::class,'trainer_id');
    }
}
