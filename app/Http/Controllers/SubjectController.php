<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function viewSubject()
    {
        session()->put('admin', 'addSubject');
        return view('dashboard');
    }


    public function addSubject(Request $request)
    {
        $validation = $request->validate([
            'subject' => 'required|string',
            'cost' => 'required|numeric',
        ]); 

        $subject = new Subject();
        $subject->subject_name = $request->subject;
        $subject->cost = $request->cost;        
        $subject->save();

        return redirect('dashboard');
    }

    public function subjectList(){

        session()->put('admin', 'subjectList');

        $subjects = Subject::all();
        return view('dashboard', compact('subjects'));
    }
}
