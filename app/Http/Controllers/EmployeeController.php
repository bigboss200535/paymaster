<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Employee;
use App\Models\Gender;
use App\Models\Designation;



class EmployeeController extends Controller
{

    public function index()
    {
        // fetch all employee
        $gender = Gender::where('archived', 'No')->where('status', '=','Active')->get();
        $title = DB::table('title')->where('archived', 'No')->where('status', 'Active')->get();
        $countlocum = Employee::where('archived', 'No')->where('status', '=','Active')->where('staff_type', '=','locum')->count();
        $countpermanent = Employee::where('archived', 'No')->where('status', '=','Active')->where('staff_type', '=','permanent')->count();
        $count_active = Employee::where('archived', 'No')->where('status', '=','Active')->count();
        $count_inactive = Employee::where('archived', 'No')->where('status', '=','Inactive')->count();
        $workers = Employee::where('archived', 'No')->get();
        $designation = Designation::where('archived', 'No')->get();
        $department = Department::where('archived', 'No')->where('status', 'Active')->get();

        return view('employee.index', compact('designation','department','workers', 'countlocum', 'countpermanent', 'count_active', 'count_inactive', 'gender', 'title'));
    }
    
    public function show(Request $request, $employee_id)
    {
        $staff = Employee::rightJoin('users', 'users.user_id', '=', 'employee.user_id')
        ->where('employee.employee_id', $employee_id)
        ->select('employee.*', 'employee.employee_id as emp_id', 'users.user_id as userid', 'users.fullname as name')
        ->orderBy('employee.added_date', 'asc') 
        ->first();

        $salary_list = Employee::join('salary_account', 'salary_account.employee_id', '=', 'employee.employee_id')
        ->where('salary_account.employee_id', $employee_id)
        ->where('salary_account.archived', 'No')
        ->select('salary_account.*', 'employee.employee_id as emp_id')
        ->orderBy('salary_account.added_date', 'asc') 
        ->get();

        return view('employee.show', compact('staff', 'salary_list'));
    }
    
    public function applications()
    {
        // fetch all employee
        $count_apps = DB::table('employee')->where('application_process', '1')->where('status', 'Active')->where('archived', 'No')->count();
        $count_interview = DB::table('employee')->where('application_process', '2')->where('status', 'Active')->where('archived', 'No')->count();
        $count_decline = DB::table('employee')->where('application_process', '3')->where('status', 'Active')->where('archived', 'No')->count();
        $count_incline = DB::table('employee')->where('application_process', '4')->where('status', 'Active')->where('archived', 'No')->count();
        // $workers = DB::table('employee')->where('registration_type', 'applicant')->get();
        $workers = DB::table('employee')
        // ->where('registration_type', 'applicant')
        ->where('status', 'Active')
        ->where('archived', 'No')
        ->where('registration_type', 'applicant')
        ->get();
       
        return view('employee.applications', compact('workers', 'count_apps', 'count_interview', 'count_decline', 'count_incline'));
    }


    public function create()
    {   $gender = DB::table('gender')->where('archived', 'No')->where('status', 'Active')->get();
        $title = DB::table('title')->where('archived', 'No')->where('status', 'Active')->get();
        return view('employee.create', compact('title', 'gender'));
    }


    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'title' => 'required|min:3|max:50',
        //     'firstname' => 'required|min:3|max:100',
        //     'middlename' => 'nullable|min:3|max:100',
        //     'lastname' => 'required |min:3|max:100',
        //     'gender' => 'required',
        //     'telephone' => 'nullable',
        //     'birth_date' => 'nullable',
        //     'portfolio' => 'nullable',
        //     'department' => 'nullable',
        //     'last_known_school' => 'nullable|min:3|max:150',
        //     'last_known_class' => 'nullable|min:3|max:50',
        //     'user_id' => 'nullable|min:3|max:50',
        //     'transaction' => 'nullable',            
            // 'image' => 'nullable',
            // 'added_id' => 'nullable',
            // 'user_id' => 'nullable',
            
        // ]);
        $existing_employee = Employee::where('firstname', $request->input('firstname'))
        ->where('surname', $request->input('lastname'))
        ->where('birthdate', $request->input('birthdate'))
        ->first();

        if ($existing_employee) {
                return redirect()->back()->withErrors(
                    ['error' => 'Employee with the same details already exists.']
                );
        }

                $id_generated = $this->generate_id($request);         

                $payer_details = new Employee();
                $payer_details->employee_id = $id_generated;
                $payer_details->title = $request->input('title');
                $payer_details->firstname = $request->input('firstname');
                $payer_details->middlename = $request->input('middlename');
                $payer_details->surname = $request->input('lastname');
                $payer_details->gender = $request->input('gender');
                $payer_details->telephone = $request->input('nationality');
                $payer_details->birthdate = $request->input('birth_date');
                $payer_details->portfolio = $request->input('portfolio');
                $payer_details->department_id = $request->input('department');
                $payer_details->designation_id = $request->input('designation');
                $payer_details->religion = $request->input('religion');
                $payer_details->address = $request->input('address');
                $payer_details->region = $request->input('region');
                $payer_details->bank = $request->input('bank');
                $payer_details->bank_account = $request->input('bank_account');
                $payer_details->ssnit_number = $request->input('ssnit_number');
                $payer_details->file_number = $request->input('file_number');
                $payer_details->staff_type = $request->input('staff_type');
                $payer_details->user_id =  Auth::user()->user_id;
                $payer_details->gh_card = $request->input('gh_card');
                $payer_details->save();

            return response()->json(['success' => true, 'id_generated' => $id_generated], 200);
    }

    private function generate_id(Request $request)
    {
        // Retrieve the count of existing
        $count_payers = Employee::count();
        // Extract the initials from the surname and firstname
        $surname_initial = strtoupper(substr($request->input('firstname'), 0, 1));
        $firstname_initial = strtoupper(substr($request->input('lastname'), 0, 1));
        $count_plus_one = $count_payers + 1;
        $currentHour = date('H');
        $currentDay = date('d');
        $currentMonth = date('m');
        $currentYear = date('Y');
        $desiredLength = 4;
        $formatted_id = str_pad($count_plus_one, $desiredLength, '0', STR_PAD_LEFT);
        $id_generated = $surname_initial.$formatted_id.$firstname_initial.$currentHour.$currentDay.$currentMonth.$currentYear;
        return $id_generated;
    }

    public function viewedit()
    {
        // fetch all user
        // $users = DB::table('users')->get();
        return view('profile.detailed');
    }

   
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function editpassword(Request $request): View
    {
        return view('profile.password-change', [
            'user' => $request->user(),
        ]);
    }

    public function profiledetails(Request $request): View
    {
        return view('profile.profile', [
            'user' => $request->user(),
        ]);
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }
}
