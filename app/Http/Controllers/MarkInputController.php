<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\FileUpload;
use App\Models\MarkInput;
use App\Models\Notification;
use App\Models\Student;
use App\Models\Year;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Symfony\Component\Console\Input\Input as InputInput;

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
        // die('check');
        $courses = Course::all();
        $years = Year::all();
        $exams = Exam::all();
        $students = Student::all();
        $fileuploads = FileUpload::all();
        return view('backend.markinput.create', [
            'courses' => $courses,
            'years' => $years,
            'exams' => $exams,
            'students' => $students,
            'fileuploads' => $fileuploads
        ]);
    }

    public function store(Request $request)
    {
        //  @dd($request);
        $courses = Course::all();
        $years = Year::all();
        $students = Student::all();
        $exams = Exam::all();
        try {


            // @dd($request);

            MarkInput::create([
                'exam_name' => $request->exam_name,
                'student_id' => $request->student_id,
                'file_name' => $request->file_name,

                'mark_Co_Ordinator' => $request->mark_Co_Ordinator,
                'mark_SuperViser' => $request->mark_SuperViser,

            ]);

            Notification::create([
                'name' => 'Result Of Student ID: ' . $request->student_id . 'is published',
                'status' => 'unread',
                'link' => route("result.index", $request->student_id),
                'color' => 'success'
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
        $courses = Course::all();
        $years = Year::all();
        $exams = Exam::all();
        $students = Student::all();
        $fileuploads = FileUpload::all();
        return view('backend.markinput.edit', [
            'single_markinput' => $markinput,
            'courses' => $courses,
            'years' => $years,
            'exams' => $exams,
            'students' => $students,
            'fileuploads' => $fileuploads
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
            'student_id' => $request->student_id,
            'file_name' => $request->file_name,
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
