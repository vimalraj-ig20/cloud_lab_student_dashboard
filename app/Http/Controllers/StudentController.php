<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$data['students'] = student::orderBy('id','desc')->paginate(5);
return view('students.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('students.create');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$request->validate([
'roll_no'=> 'required',
'name' => 'required',
'email' => 'required',
'department' => 'required',
'ph_no' => 'required',
'mentor' => 'required',
'mentor_no' => 'required',
]);
$student = new student;
$student->roll_no = $request->roll_no;
$student->name = $request->name;
$student->email = $request->email;
$student->department = $request->department;
$student->ph_no = $request->ph_no;
$student->mentor = $request->mentor;
$student->mentor_no = $request->mentor_no;
$student->save();
return redirect()->route('students.index')
->with('success','student has been created successfully.');
}
/**
* Display the specified resource.
*
* @param  \App\student  $student
* @return \Illuminate\Http\Response
*/
public function show(student $student)
{
return view('students.show',compact('student'));
} 
/**
* Show the form for editing the specified resource.
*
* @param  \App\student  $student
* @return \Illuminate\Http\Response
*/
public function edit(student $student)
{
return view('students.edit',compact('student'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  \App\student  $student
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$request->validate([
    'roll_no'=> 'required',
    'name' => 'required',
    'email' => 'required',
    'department' => 'required',
    'ph_no' => 'required',
    'mentor' => 'required',
    'mentor_no' => 'required',
]);
$student = student::find($id);
$student->roll_no = $request->roll_no;
$student->name = $request->name;
$student->email = $request->email;
$student->department = $request->department;
$student->ph_no = $request->ph_no;
$student->mentor = $request->mentor;
$student->mentor_no = $request->mentor_no;
$student->save();
return redirect()->route('students.index')
->with('success','student Has Been updated successfully');
}
/**
* Remove the specified resource from storage.
*
* @param  \App\student  $student
* @return \Illuminate\Http\Response
*/
public function destroy(student $student)
{
$student->delete();
return redirect()->route('students.index')
->with('success','student has been deleted successfully');
}
}