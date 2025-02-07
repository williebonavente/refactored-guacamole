<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    // Index Method – Retrieve and display all faculty members
    public function index()
    {
        $faculty = DB::table('faculty')->paginate(10); // Paginate with 10 faculty members per page
        return view('faculty.index', compact('faculty'));
    }

    // Create Method – Show the form to add a new faculty member
    public function create()
    {
        return view('faculty.create');
    }

    // Store Method – Insert the new faculty member data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email|unique:faculty',
            'department' => 'required',
        ]);

        DB::table('faculty')->insert([
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'department' => $request->department,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('faculty.index')->with('success', 'Faculty member created successfully.');
    }

    // Edit Method – Show the form to edit a faculty member's details
    public function edit($id)
    {
        $faculty = DB::table('faculty')->where('id', $id)->first();
        return view('faculty.edit', compact('faculty'));
    }

    // Update Method – Update the faculty member's information
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:faculty,email,' . $id,
            'department' => 'required',
        ]);

        DB::table('faculty')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'updated_at' => now(),
        ]);

        return redirect()->route('faculty.index')->with('success', 'Faculty member updated successfully.');
    }

    // Destroy Method – Delete a faculty member record
    public function destroy($id)
    {
        DB::table('faculty')->where('id', $id)->delete();
        return redirect()->route('faculty.index')->with('success', 'Faculty member deleted successfully.');
    }
}