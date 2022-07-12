<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Timesheet;
use Illuminate\Support\Facades\File;

class TimesheetController extends Controller
{

    public function create(){
        return view('timesheet.create');
    }
    public function store(Request $request){
        $validation = $request->validate([
            'date'=>'required',
            'projects'=>'required',
            'tasks'=>'required',
            'status'=>'required',
            'remarks'=>'required',


        ]);
        $timesheet=new Timesheet;
        $timesheet->date=$request->date;
        $timesheet->projects=$request->projects;
        $timesheet->tasks=$request->tasks;
        $timesheet->status=$request->status;
        $timesheet->remarks=$request->remarks;
        $timesheet->save();

        return redirect()->route('timesheet.index');
    }
    public function index()
    {
        $timesheet = Timesheet::all();
        return view('timesheet.index',compact('timesheet'));
    }
    public function edit($id,Request $request)
    {
        $timesheet=timesheet::find($id);
        return view('timesheet.edit',compact('timesheet'));
    }
    public function update($id,Request $request)
    {
        $validation = $request->validate([
            'date'=>'required',
            'projects'=>'required',
            'tasks'=>'required',
            'status'=>'required',
            'remarks'=>'required',


        ]);
        $timesheet=Timesheet::find($id);
        $timesheet->date=$request->date;
        $timesheet->projects=$request->projects;
        $timesheet->tasks=$request->tasks;
        $timesheet->status=$request->status;
        $timesheet->remarks=$request->remarks;

        $timesheet->save();


        return redirect()->route('timesheet.index')->with('massage','update successfully');


    }
    public function delete($id,Request $request)
    {
        $timesheet=timesheet::find($id);
        $timesheet->delete();
        return redirect()->route('timesheet.index');


    }
        }






