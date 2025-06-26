<?php

namespace App\Http\Controllers;

use App\Events\DeleteUserEvent;
use App\Events\SendNotifiyToUsers;
use App\Models\User;
use App\UserTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('assignedValue')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userTypes = UserTypeEnum::values();

        return view('users.create', compact('userTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'user_type' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::create($validatedData);

        event(new SendNotifiyToUsers($user));

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $userTypes = UserTypeEnum::values();

        return view('users.edit', compact('user', 'userTypes'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updatedData = $request->validate([
            'name' => 'required|string|max:255',
            'user_type' => 'required',
        ]);
        $user = User::find($id);

        if (!$user) {
            return redirect('users.edit')->with('error', 'User not Found!');
        }

        $user->name = $updatedData['name'];
        $user->user_type = $updatedData['user_type'];
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        User::destroy($id);

        event(new DeleteUserEvent($user));

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
