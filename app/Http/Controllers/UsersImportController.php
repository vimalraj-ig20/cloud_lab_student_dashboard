<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersImportController extends Controller
{
    public function import() 
    {
        Excel::import(new UsersImport, 'users.xlsx');
        
        return redirect('/')->with('success', 'All good!');
    }
    public function show(){
        return view('users.import');

    }

    public function store(){
        
    }
}
