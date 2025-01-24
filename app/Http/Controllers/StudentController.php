<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('students')->paginate(5);
        return view('students.index', compact('students'));
    }
    
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'age' => 'required|integer',
            'course' => 'required',
        ]);

        DB::table('students')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'course' => $request->course,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'age' => 'required|integer',
            'course' => 'required',
        ]);

        DB::table('students')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'course' => $request->course,
            'updated_at' => now(),
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}