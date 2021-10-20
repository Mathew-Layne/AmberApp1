<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function viewStudent(){
        session()->put('admin', 'addStudent');
        return view('dashboard');
    }


    public function addStudent(Request $request){

        $validation = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'email|required|unique:students,email',
            'dob' => 'required',
            'gender' => 'string|required',
            'phoneno' => 'required|numeric',
            'class' => 'required',
        ]);

        $student = new Student();
        $student->first_name = $request->fname;
        $student->last_name = $request->lname;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->dob = $request->dob;
        $student->phoneno = $request->phoneno;
        $student->class = $request->class;
        $student->save();

        return redirect('dashboard');
    }

    public function studentList()
    {

        session()->put('admin', 'studentList');

        $students = Student::all();
        return view('dashboard', compact('students'));
    }

    public function editview($id)
    {
        session()->put('admin', 'editstudent');

        $data = Student::where('id', $id)->get();
        return view('dashboard', compact('data'));
    }

    public function editStudent(Request $request, $id)
    {

        Student::where('id', $id)->update([

            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'phoneno' => $request->phoneno,
            'class' => $request->class,
        ]);
        
        return redirect('dashboard/studentlist');
    }

    public function deleteStudent($id)
    {

        Student::where('id', $id)->delete();
        return redirect('dashboard/studentlist');
    }
}
