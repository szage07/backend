<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentRequest; 

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StudentRequest $request)
    {
        $validated = $request->validated();
        $carousel = Student::create($validated);
        return  $carousel;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $validated = $request->validated();
        $student = Student::create($validated);
        return  $student;   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Student::findOrFail($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return  $student; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        $student = Student::findOrFail($id);
        $validated = $request->validated();
        $student->update($validated);
        return $student;
    }
    public function email(StudentRequest $request, string $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validated();
 
        $student->email = $validated ['email'];
 
        $student->save();

        return $student;
    }
}
