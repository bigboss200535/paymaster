<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeneralController extends Controller
{

    public function index()
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

    public function sendotp(Request $request)
    {
        $telephone = $request->input('telephone');
        $otp = rand(100000, 999999);

    }

    public function get_salary(Request $request)
    {
        // $version = 2023;
        // $count_users = DB::table('users')->where('archived', 'No')->count();

                $ssnit_employee = $request->basic * 0.055;
                $employer_ssnit = $request->basic * 0.13;
                $employer_tier_one = $request->basic * 0.135;
                $employer_tier_two = $request->basic * 0.05;

                $income_to_be_taxed = $request->basic - $ssnit_employee;
                $rounded_income = round($income_to_be_taxed, 2);

            if($request->basic)
            {
                $next_chargeable = [490, 110, 130, 3166.67, 16000, 30520, 50000];
                $rate_percent = [0, 0.05, 0.1, 0.175, 0.25, 0.3, 0.35];
            }

            $taxable_amounts = [];
            $tax_rates = [];
            $total_tax = 0;
            $remaining_income = $income_to_be_taxed;

            foreach ($next_chargeable as $i => $chargeable) {
                $taxable_amount = $remaining_income > $chargeable ? $chargeable : $remaining_income;
                $remaining_income -= $taxable_amount;
                $taxable_amounts[] = $taxable_amount;
                $tax_rates[] = $rate_percent[$i];
                $total_tax += $taxable_amount * $rate_percent[$i];

                if ($remaining_income <= 0) {
                break;

                }
            }

            $final_tax = round($total_tax, 2);
            $deductions = $ssnit_employee + $final_tax;
            $take_home_salary = $request->basic - $deductions;

            $result = [
                'basic' => $request->basic,
                'taxable_income' => $rounded_income,
                'salary' => round($take_home_salary, 2),
                'employee_ssf_5.5%' => round($ssnit_employee, 2),
                'employer_ssf_13%' => round($employer_ssnit, 2),
                'ssnit_tier_1' => round($employer_tier_one, 2),
                'approved_trustee_tier_2' => round($employer_tier_two, 2),
                'paye' => $final_tax,
                'date' => date('Y-m-d'),
                'time' => date('h:i A')
            ];

            return json_encode($result);
                    

    }
}
