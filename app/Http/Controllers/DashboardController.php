<?php

namespace App\Http\Controllers;
// use App\Models\Dashboard;
use App\Models\process;
use App\Models\Timesheet;
use App\Models\Fees;
use App\Models\Project;

use Illuminate\Http\Request;

class DashboardController extends Controller
{    public function index()
    {

    $total_process= Process::all()->count();
    $total_timesheet= Timesheet::all()->count();
    $total_fees= Fees::all()->count();
    $total_project= Project::all()->count();
    return view('dashboard',compact('total_process','total_timesheet','total_fees','total_project'));

}
}
