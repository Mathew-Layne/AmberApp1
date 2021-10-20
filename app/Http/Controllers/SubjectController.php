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

        $subjects = Subject::paginate(2);
        return view('dashboard', compact('subjects'));
    }

    public function editview($id){
        session()->put('admin', 'editsubject');

        $data = Subject::where('id', $id)->get();
        return view('dashboard', compact('data'));
    }

    public function editSubject(Request $request, $id){

        Subject::where('id', $id)->update([
            'subject_name' => $request->subject,
            'cost' => $request->cost,
        ]);

        return redirect('dashboard/subjectlist');
    }

    public function deleteSubject($id){

        Subject::where('id', $id)->delete();
        return redirect('dashboard/subjectlist');
    }
}
