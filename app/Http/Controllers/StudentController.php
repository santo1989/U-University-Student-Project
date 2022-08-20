<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Year;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {

        $studentCollection = Student::latest();

        if (request('search')) {
            $studentCollection = $studentCollection
                ->where('student_id', 'like', '%' . request('search') . '%')
                ->orWhere('year', 'like', '%' . request('search') . '%');
        }

        $student = $studentCollection->paginate(10);

        return view('backend.student.index', [
            'students' => $student
        ]);
    }

    public function create()
    {
        // $this->authorize('create-markinput');
        $cours = Course::all();
        $year = Year::all();
        $students = Student::all();
        return view('backend.student.create', [
            'courses' => $cours,
            'years' => $year,
            'students' => $students,
        ]);
    }

    public function store(Request $request)
    {
        //  @dd($request);
        $cours = Course::all();
        $year = Year::all();
        $students = Student::all();
        try {
            Student::create([
                'user_id' => $request->user_id,
                'student_id' => $request->student_id,
                'year' => $request->year,
                'student_session' => $request->student_session,
                'course_name' => $request->course_name,
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('student.index')->with('success', 'Student created successfully');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $cours = Course::all();
        $year = Year::all();
        $students = Student::all();
        return view('backend.student.edit', [
            'single_student' => $student,
            'courses' => $cours,
            'years' => $year,
            'students' => $students,
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $cours = Course::all();
        $year = Year::all();
        $students = Student::all();

        try {
            $student->update([
                'user_id' => $request->user_id,
                'student_id' => $request->student_id,
                'year' => $request->year,
                'student_session' => $request->student_session,
                'course_name' => $request->course_name,
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('student.index')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        try {
            $student->delete();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('student.index')->with('success', 'Student deleted successfully');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        $cours = Course::all();
        $year = Year::all();
        $students = Student::all();
        return view('backend.student.show', [
            'show_student' => $student,
            'courses' => $cours,
            'years' => $year,
            'students' => $students,
        ]);
    }
}
