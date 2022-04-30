<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['edit', 'update']);
    }

    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function create()
    {
        return view('users.create')->with('roles', ['writer', 'admin']);
    }

    public function store(Request $request)
    {
        return $request;
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->all();

        if ($request->picture) {
            $data['picture'] = $request->picture->store('profile', 'public');
        }

        $user->update($data);
        $user->profile->update($data);

        return redirect()->route('users.edit', $user->id)->with('success', "profile has been updated.");
    }

    public function makeAdmin(Request $request, User $user)
    {
        $user->update(['role' => 'admin']);
        return redirect()->route('users.index')->with('success', "$user->name is an admin now.");
    }

    public function removeAdmin(Request $request, User $user)
    {
        $user->update(['role' => 'writer']);
        return redirect()->route('users.index')->with('success', "$user->name is an writer now.");
    }
}
