<?php

namespace App\Http\Controllers;
use App\Models\Fees;
use App\Models\Process;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function create(){
        $process=Process::all();
        return view('fees.create',compact('process'));
    }
    public function store(Request $request){
        $validation = $request->validate([
            'name'=>'required',
            'amount'=>'required',
            'balance'=>'required',
            'current'=>'required',


        ]);
        $fees=new Fees;
        $fees->name=$request->name;
        $fees->amount=$request->amount;
        $fees->balance=$request->balance;
        $fees->current=$request->current;
        $fees->save();

        return redirect()->route('fees.index');
    }
    public function index()
    {
        $fees = Fees::all();
        return view('fees.index',compact('fees'));
    }
    public function edit($id,Request $request)
    {
        $fees=Fees::find($id);
        $process=Process::all();
        return view('fees.edit',compact('fees','process'));
    }
    public function update($id,Request $request)
    {
        $validation = $request->validate([
            'name'=>'required',
            'amount'=>'required',
            'balance'=>'required',
            'current'=>'required',


        ]);
        $fees=Fees::find($id);
        $fees->name=$request->name;

        $fees->amount=$request->amount;
        $fees->balance=$request->balance;
        $fees->current=$request->current;

        $fees->save();


        return redirect()->route('fees.index')->with('massage','update successfully');


    }
    public function delete($id,Request $request)
    {
        $fees=Fees::find($id);
        $fees->delete();
        return redirect()->route('fees.index');


    }

}
