<?php

namespace App\Http\Controllers;

use App\Models\ProjectUser;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::with('users')->get();
        return view('admin.project_user.index',[ 'projectUsers'=>$projects]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Project $project)
    {
        //
        //dd($project);

        $project->users()->sync($request->users);



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( ProjectUser $project_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
