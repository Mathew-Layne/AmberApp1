<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\SubjectChoice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SubjectChoiceController extends Controller
{
    public function studentProfile($id)
    {
        session()->put('admin', 'studentprofile');
        // Student::whereRelation('subjectchoice', 'student_id', $id)->get();
        $balance = Subject::sum('cost');

        dd($balance);
        $data = SubjectChoice::where('student_id', $id)->paginate(5);
        return view('dashboard', compact( 'data'));
    }


    public function chooseSubject($id){
        session()->put('admin', 'selectsubject');
        $student = Student::where('id', $id)->first();
        $subjects = Subject::all();
        return view('dashboard', compact('student', 'subjects'));

    }

    public function subjectAdded(Request $request)
    {

        $choice = new SubjectChoice();
        $choice->student_id = $request->student_name;
        $choice->exam_year = $request->year;
        $choice->subject_id = $request->subject;
        $choice->save();

        return redirect()->back();
    }

    public function subjectChoice()
    {
        session()->put('admin', 'subjectchoice');
        $choices = SubjectChoice::paginate(5);
        return view('dashboard', compact('choices'));
    }

    public function approveChoice($id)
    {

        SubjectChoice::where('id', $id)->update([
            'status' => 'Approved'
        ]);
        return redirect('/dashboard/subject/choice');
    }

    public function denyChoice($id)
    {

        SubjectChoice::where('id', $id)->update([
            'status' => 'Denied'
        ]);

        return redirect('/dashboard/subject/choice');
    }
}
