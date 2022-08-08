<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\MarkInput;
use App\Models\Student;
use App\Models\Year;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MarkInputController extends Controller
{
    public function index()
    {

        $markinputCollection = MarkInput::latest();

        if (request('search')) {
            $markinputCollection = $markinputCollection
                ->where('exam_name', 'like', '%' . request('search') . '%');
        }

        $markinput = $markinputCollection->paginate(10);

        return view('backend.markinput.index', [
            'markinputs' => $markinput
        ]);
    }

    public function create()
    {
        // $this->authorize('create-markinput');
        $cours = Course::all();
        $year = Year::all();
        $students = Student::all();
        return view('backend.markinput.create', [
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
            MarkInput::create([
                'exam_name' => $request->exam_name,
                'year' => $request->year,
                'course_name' => $request->course_name,
                'student_id' => $request->student_id,
                'mark_Co_Ordinator' => $request->mark_Co_Ordinator,
                'mark_SuperViser' => $request->mark_SuperViser,


            ]);
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('markinput.index')->withMessage('Successfully Created!');
    }


    public function edit(MarkInput $markinput)
    {
        $cours = Course::all();
        $year = Year::all();
        $students = Student::all();
        return view('backend.markinput.edit', [
            'single_markinput' => $markinput,
            'courses' => $cours,
            'years' => $year,
            'students' => $students,
        ]);
    }

    public function show(MarkInput $markinput)
    {
        return view('backend.markinput.show', [
            'show_markinput' => $markinput
        ]);
    }

    public function update(Request $request, $id)
    {
        $markinput = MarkInput::find($id);

        $markinput->update([

            'exam_name' => $request->exam_name,
            'year' => $request->year,
            'course_name' => $request->course_name,
            'student_id' => $request->student_id,
            'mark_Co_Ordinator' => $request->mark_Co_Ordinator,
            'mark_SuperViser' => $request->mark_SuperViser,
        ]);

        $markinput->update();


        return redirect()->route('markinput.index');
    }

    public function destroy(MarkInput $markinput)
    {
        try {
            $markinput->delete();
            return redirect()->route('markinput.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
