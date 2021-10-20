<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectChoiceController extends Controller
{
    public function studentProfile($id){
        session()->put('admin', 'studentprofile');
        $subjects = Subject::all();
        
        return view('dashboard', compact('subjects'));
    }

    public function setprofile(Request $request, $id){

    }
}
