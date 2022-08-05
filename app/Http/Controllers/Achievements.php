<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Achievements extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['Achievements'] = Student::orderBy('id','asc')->paginate(100);
        return view('admin.Achievements.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.Achievements.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        {
            $request->validate([
            'roll_no'=> 'required',
            'name' => 'required',
            'event' => 'required',
            'department' => 'required',
            'ph_no' => 'required',
            'mentor' => 'required',
            'mentor_no' => 'required',
            ]);


            Student::create($request->all());
            return redirect()->route('admin.students.index')            
            ->with('success','student has been created successfully.');
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Achievements  $Achievements
     * @return \Illuminate\Http\Response
     */
    public function show(Achievements $Achievements)
    {
        //
        return view('Achievements.show',compact('Achievements'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Achievements  $Achievements
     * @return \Illuminate\Http\Response
     */
    public function edit(Achievements $Achievements)
    {
        //
        return view('Achievements.edit',compact('Achievements'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Achievements  $Achievements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achievements $Achievements)
    {
        //

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
            // $student = student::find($id);
            // $student->roll_no = $request->roll_no;
            // $student->name = $request->name;
            // $student->email = $request->email;
            // $student->department = $request->department;
            // $student->ph_no = $request->ph_no;
            // $student->mentor = $request->mentor;
            // $student->mentor_no = $request->mentor_no;
            // $student->save();
            $id->update($request->all());
            return redirect()->route('Achievements.index')
            ->with('success','student Achievements Has Been updated successfully');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Achievements  $Achievements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievements $Achievements)
    {
        //
        
            $student->delete();
            return redirect()->route('admin.Achievements.index')
            ->with('success','student Achievements has been deleted successfully');
    }
}
