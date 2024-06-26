<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProfileController extends Controller
{

    public function index()
    {
        $users = User::where('archived', 'No')->where('status', '=','Active')->get();
        return view('profile.index', compact('users'));
    }

    public function create()
    {
        return view('profile.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'username' => 'required|integer|min:1',
        ]);

         $product = User::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
        ]);  
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

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('username')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
