<?php

namespace App\Http\Controllers;

use App\Models\ProjectUser;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        Gate::authorize('delete',Auth::user());
        $projectUsers  = ProjectUser::with('user', 'project')->get();
        return view('admin.project_user.index',[ 'projectUsers'=>$projectUsers]);


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
        $project->users()->updateExistingPivot($request->users, ['status' => 1]);

        return redirect()->back();
    }

    public function assignUser(Request $request,Project $project)
    {
        //
        //dd($project);

        $project->users()->attach(Auth::user());
        return redirect()->back();
    }
    public function resetAssignUser(Request $request,Project $project)
    {
        $project->users()->detach(Auth::id());
        return redirect()->back();
    }

    public function projectUserRefuse(Request $request,Project $project,User $user)
    {
        $project->users()->updateExistingPivot($user->id, ['status' => 0]);
        return redirect()->back();
    }

    public function projectUserAccept(Request $request,Project $project,User $user)
    {
        $project->users()->updateExistingPivot($user->id, ['status' => 1]);

        return redirect()->back();
    }




}
