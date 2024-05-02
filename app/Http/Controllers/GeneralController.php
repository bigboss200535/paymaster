<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeneralController extends Controller
{
    public function dashboard()
    {
        // fetch all employee
        $count_users = DB::table('users')->where('archived', 'No')->count();
        $countlocum = DB::table('employee')->where('staff_type', 'locum')->count();
        $countpermanent = DB::table('employee')->where('staff_type', 'permanent')->count();
        $count_active = DB::table('employee')->where('status', 'ACTIVE')->count();
        $count_inactive = DB::table('employee')->where('status', 'INACTIVE')->count();
        $workers = DB::table('employee')->get();
        session()->put('count_active', $count_active);
        return view('home', compact('workers', 'countlocum', 'countpermanent', 'count_active', 'count_inactive', 'count_users'));
    }

    public function online()
    {

        try {
            $response = Http::get('http://www.google.com:80/');
            if ($response->successful()) {
                return "<b style='color:green'>ONLINE</b>";
            } else {
                return "<b style='color:red'>NO INTERNET</b>";
            }
        } catch (\Exception $e) {
            return "<b style='color:red'>NO INTERNET</b>";
        }
    }

   public function greetings()
   { 

        $hour = Carbon::now()->hour;

            if(date('H')<12){
                return 'Good Morning';
            }else if(date('H')>=12 && date('H')<=17){
                return 'Good Afternoon';
            }else if(date('H')>=18 && date('H')<=20){
                return 'Good Evening';
            }else if(date('H')>=21){
                return 'Good Night';
            }else{
                return 'Welcome';
            }
    }


}
