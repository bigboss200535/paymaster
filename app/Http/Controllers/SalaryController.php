<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Salary;

class SalaryController extends Controller
{

    public function index()
    {
        $employees = DB::table('employee')
            ->join('salary_account', 'employee.employee_id', '=', 'salary_account.employee_id')
            ->select('employee.*', 'salary_account.account_number', 'salary_account.basic_salary')
            ->where('employee.archived', 'NO')
            ->get();
        // $staff_list = DB::table('salary_account')->get();
        return view('salary.list', compact('employees'));
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


    public function viewedit()
    {
       
    }
    /**
     * Display the user's profile form.
     */


    public function editpassword(Request $request)
    {
        
    }

    public function profiledetails(Request $request)
    {
        
    }
    /**
     * Update 
     */
    public function update()
    {
        
    }

    /**
     * delete the salary's account.
     */
    public function destroy(Request $request)
    {
        
    }
}
