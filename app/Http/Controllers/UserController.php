<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // $users = User::get();
        $users = User::paginate();
        return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->only(['name', 'email']));
        return redirect()->route('users.index')
            ->withSuccess('Created user: ' . $request->name . ' Email: ' . $request->email);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));
        return redirect()->route('users.index')->withSuccess('Updated user' . $user->name);
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->route('users.index')->withDanger('Delete user' . $user->name);
    }
}
