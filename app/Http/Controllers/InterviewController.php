<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InterviewController extends Controller
{
   public function index()
    {
        // fetch all interviews
        $applicant_list = DB::table('employee_interview')->get();
        return view('interview.list', compact('applicant_list'));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {
        
    }
}
