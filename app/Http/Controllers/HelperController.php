<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function helper(){

        $header = Student::first()->toArray();
        $data = Student::all();        

        return view('helper',['header'=> $header, 'data' => $data]);
    }
}
