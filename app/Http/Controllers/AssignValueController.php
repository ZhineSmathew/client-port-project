<?php

namespace App\Http\Controllers;

use App\Models\AssignedValue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignValueController extends Controller
{
    public function index()
    {
        $assignedValues = AssignedValue::with(['users', 'createdBy'])->get();

        return view('assign.index', compact('assignedValues'));
    }

    public function create()
    {
        $userList = User::where('user_type', 'client_user')->get();

        return view('assign.create', compact('userList'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'value' => 'required|string|max:255',
            'user_list' => 'required|array',
            'user_list.*' => 'exists:users,id',
        ]);

        $assignedValue = AssignedValue::create([
            'unique_value' => $validatedData['value'],
            'created_by' => Auth::user()->id,
        ]);

        // Attach users to pivot table
        $assignedValue->users()->attach($validatedData['user_list']);

        return redirect()->route('assign.index')->with('success', 'Value assigned successfully.');
    }

    public function edit(string $id)
    {
        $assignedData = AssignedValue::with('users')->findOrFail($id);

        $userList = User::where('user_type', 'client_user')->get();

        return view('assign.edit', compact('assignedData', 'userList'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'value' => 'required|string|max:255',
            'user_list' => 'required|array',
            'user_list.*' => 'exists:users,id',
        ]);

        // Find the assigned value record
        $assignedValue = AssignedValue::findOrFail($id);

        // Update the value field
        $assignedValue->update([
            'unique_value' => $validatedData['value'],
        ]);

        // Sync user assignments (updates the pivot table)
        $assignedValue->users()->sync($validatedData['user_list']);

        return redirect()->route('assign.index')->with('success', 'Assigned value updated successfully.');
    }

    public function destroy(string $id)
    {
        AssignedValue::destroy($id);

        return redirect()->route('assign.index')->with('success', 'User deleted successfully');
    }

    public function showAssignedValue()
    {
        $user = Auth::user();

        $assignedValue = $user->assignedValue()->get();

        return view('view_value', compact('assignedValue'));
    }


}
