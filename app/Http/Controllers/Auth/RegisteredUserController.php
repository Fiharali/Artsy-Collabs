<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('admin.users.add');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role_id' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => 'required'
        ]);

          User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully');

    }

    public function index()
    {
        //
        return view('admin.users.index',[ 'users'=>User::paginate(5)]);
    }

    public function edit(User $user)
    {
        //
        return view('admin.users.edit',[ 'user'=>$user]);

    }

    public function update(Request $request, User $user)
    {
        //
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', "User  updated successfully");
    }
    public function destroy(User $user)
    {
        Gate::authorize('delete',Auth::user());
        $user->delete();
       return redirect()->route('users.index')->with('success', "Book $user->name delete successfully");
    }

}
