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
