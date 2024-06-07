<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;


class Dashboard extends Component
{
    public $count_users;
    public $count_locum;
    public $count_permanent;
    public $count_active;
    public $count_inactive;
    public $workers;

    public function mount()
    {
        $this->updateData();
    }

    public function updateDate()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $this->count_users = DB::table('users')->where('archived', 'No')->count();
        $this->count_locum = DB::table('employee')->where('staff_type', 'locum')->count();
        $this->count_permanent = DB::table('employee')->where('staff_type', 'permanent')->count();
        $this->count_active = DB::table('employee')->where('status', 'Active')->count();
        $this->count_inactive = DB::table('employee')->where('status', 'Inactive')->count();
        $this->workers = DB::table('employee')->get();
        session()->put('count_active', $this->count_active);
    }

    public function render()
    {
        return view('livewire.dashboard',[
            'workers' =>$this->workers,
            'count_locum' => $this->count_locum,
        ]);
        // return view('livewire.dashboard');
    }
}
