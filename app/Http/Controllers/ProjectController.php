<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.projects.index',[ 'projects'=>Project::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $partners=Partner::all(['id','name']);
        return view('admin.projects.add',compact('partners'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //

        $champs=$request->all();
        $champs['image']=$request->file('image')->store('projects','public');
        Project::create($champs);
        return to_route('projects.index')->with('success', 'Project added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        $project->load('users');
        $users=User::all(['id','name']);

        return view('admin.projects.show',[
            'project'=>$project,
            'users'=>$users
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        $partners=Partner::all(['id','name']);
        return view('admin.projects.edit',[
            'project'=>$project,
            'partners'=>$partners
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
        $champs = $request->all();

        if ($request->hasFile('image')) {
            $champs['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($champs);

        return redirect()->route('projects.index')->with('success', "project  updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();

        return redirect()->route('projects.index')->with('success', "Book $project->title delete successfully");

    }

    public function all()
    {


        return view('index',[
            'projects'=>Project::all()

        ]);
    }


}
