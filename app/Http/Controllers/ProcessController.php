<?php

namespace App\Http\Controllers;
use App\Models\Process;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProcessController extends Controller
{
    public function create(){
        return view('process.create');
    }
    public function store(Request $request){
        $validation = $request->validate([
            'name'=>'required',
            'address'=>'required',
            'pin_code'=>'required',
            'adhar_id'=>'required',
            'mobile'=>'required',
            'select_faculty'=>'required',
            'gender'=>'required',
            'education'=>'required',
            'upload_file'=>'required',
            'email'=>'required',
            'profile_image'=>'required',

        ]);
        $process=new process;
        $process->name=$request->name;
        $process->address=$request->address;
        $process->pin_code=$request->pin_code;
        $process->adhar_id=$request->adhar_id;
        $process->mobile=$request->mobile;
        $process->select_faculty=$request->select_faculty;
        $process->gender=$request->gender;
        $process->education=$request->education;
        if($request->hasfile('upload_file'))
        {
            $file = $request->file('upload_file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/Id_proof/', $filename);
            $process->upload_file = $filename;
        }
        $process->email=$request->email;
        if($request->hasfile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/process/', $filename);
            $process->profile_image = $filename;
        }


        $process->save();

        return redirect()->route('process.index');
    }
    public function index()
    {
        $process = Process::all();
        return view('process.index',compact('process'));
    }
    public function edit($id,Request $request)
    {
        $process=process::find($id);
        return view('process.edit',compact('process'));
    }
    public function update($id,Request $request){
        $validation = $request->validate([
            'name'=>'required',
            'address'=>'required',
            'pin_code'=>'required',
            'adhar_id'=>'required',
            'mobile'=>'required',
            'select_faculty'=>'required',
            'gender'=>'required',
            'education'=>'required',
            'upload_file'=>'required',
            'email'=>'required',
            'profile_image'=>'required',

        ]);
        $process=process::find($id);
        $process->name=$request->name;
        $process->address=$request->address;
        $process->pin_code=$request->pin_code;
        $process->adhar_id=$request->adhar_id;
        $process->mobile=$request->mobile;
        $process->select_faculty=$request->select_faculty;
        $process->gender=$request->gender;
        $process->education=$request->education;
        if($request->hasfile('upload_file'))
        {
            $destination = 'uploads/process/'.$process->upload_file;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('upload_file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/Id_proof/', $filename);
            $process->upload_file= $filename;
        }
        $process->email=$request->email;
        if($request->hasfile('profile_image'))
        {
            $destination = 'uploads/process/'.$process->profile_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/process/', $filename);
            $process->profile_image = $filename;
        }


        $process->save();

        return redirect()->route('process.index')->with('massage','update successfully');
    }



public function delete($id,Request $request)
{
    $process=Process::find($id);
    $process->delete();
    return redirect()->route('process.index');


}

}
