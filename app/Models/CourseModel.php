<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Session;
class CourseModel extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function session(){
        return $this->hasMany(Session::class,'course_id','id');
     }

     public function student(){
        return $this->hasMany(Student::class,'course_id','id');
    }
 }

