<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $table ="sections";
    public function course(){
      return $this->belongsTo(Course::class);
    }

    public function lessons(){

      return $this->hasMany(Lesson::class);
    }
}
