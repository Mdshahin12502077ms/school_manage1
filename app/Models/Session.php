<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModel;
class Session extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function course(){
       return $this->belongsTo(CourseModel::class,'course_id','id');
    }

    public function student(){
        return $this->hasMany(Student::class,'session_id','id');
    }
}
