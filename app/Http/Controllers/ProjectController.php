<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index()
    {
        return view('pages.projects');
    }

    public function show()
    {
        return view('pages.project');
    }

    public function create()
    {
        return view('auth.new-project');
    }
}
