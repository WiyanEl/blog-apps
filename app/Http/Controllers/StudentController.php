<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    public function index() 
    {
        return view('student', [
            'title' => 'Student',
            'active' => 'student'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'addMoreInputFields.*.subject' => 'required'
        ]);
     
        foreach ($request->addMoreInputFields as $key => $value) {
            Student::create($value);
        }
     
        return back()->with('success', 'New subject has been added.');
    }
}
