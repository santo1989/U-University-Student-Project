<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Year;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {

        $examCollection = Exam::latest();

        if (request('search')) {
            $examCollection = $examCollection
                ->where('exam_name', 'like', '%' . request('search') . '%');
        }

        $exam = $examCollection->paginate(10);

        return view('backend.exam.index', [
            'exams' => $exam
        ]);
    }

    public function create()
    {
        // $this->authorize('create-exam');
        $exam=Exam::all();
        $year=Year::all();
        return view('backend.exam.create',[
            'exam'=>$exam,
            'years'=>$year,
        ]);
    }

    public function store(Request $request)
    {
        //  @dd($request);
        $year=Year::all();
        $exam=Exam::all();
        try {
            Exam::create([
                'exam_name' => $request->exam_name,
                'exam_date' => $request->exam_date,
                'year' => $request-> year,
                'status' => $request->status,
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('exam.index')->withMessage('Successfully Created!');
    }


    public function edit(Exam $exam)
    {   
        $cours=Course::all();
        $year=Year::all();
        $students=Student::all();
        return view('backend.exam.edit', [
            'single_exam' => $exam,
            'years'=>$year,
            'courses'=>$cours,
            'students'=>$students,
        ]);
    }

    public function show(Exam $exam)
    {
        return view('backend.exam.show', [
            'show_exam' => $exam
        ]);
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);

        $exam->update([
         
            'exam_name' => $request->exam_name,
            'exam_date' => $request->exam_date,
            'year' => $request-> year,
            'status' => $request->status,

        ]);

        $exam->update();


        return redirect()->route('exam.index');
    }

    public function destroy(Exam $exam)
    {
        try {
            $exam->delete();
            return redirect()->route('exam.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
