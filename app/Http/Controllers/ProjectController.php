<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function create(){
        return view('project.create');
    }
    public function store(Request $request){
        $validation = $request->validate([
            'name'=>'required',
            'code'=>'required',
            'status'=>'required',

        ]);
        $project=new Project;
        $project->name=$request->name;
        $project->code=$request->code;
        $project->status=$request->status;
        $project->save();

        return redirect()->route('project.index');
    }
    public function index()
    {
        $project = Project::all();
        return view('project.index',compact('project'));
    }
    public function edit($id,Request $request)
    {
        $project=Project::find($id);
        return view('project.edit',compact('project'));
    }
    public function update($id,Request $request)
    {
        $validation = $request->validate([
            'name'=>'required',
            'code'=>'required',
            'status'=>'required',

        ]);
        $project=Project::find($id);
        $project->name=$request->name;

        $project->code=$request->code;
        $project->status=$request->status;

        $project->update();


        return redirect()->route('project.index')->with('massage','update successfully');


    }
    public function delete($id)
    {
        $project=Project::find($id);
        $project->delete();
        return redirect()->route('project.index');


    }

}
