<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function addmissionForm(){
        return view('Backend.admin.student.AdmissionForm');
    }
}
