<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        // fetch all interviews
        // $applicant_list = DB::table('employee_interview')->get();
        return view('sales.index');
    }
}
