<?php
namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\MarkInput;
use App\Models\Notification;
use App\Models\Result;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use App\Models\Year;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {  
        $resultsCollection = [
            $user_id = auth()->user()->id,
            $student_name = auth()->user()->name,
            $student_id = Student::where('user_id', $user_id)->first()->student_id,
            $courses_registration = Year::where('student_id', $student_id)->get(),
            $result = MarkInput::where('student_id', $student_id)->get(),   
        ];
        return view('backend.result.index', [
            'results' => $resultsCollection
        ]);
       
    }

    public function create()
    {
        // $this->authorize('create-result');

        return view('backend.results.create');
    }

    public function store(Request $request)
    {
        try {
            $techer = Result::create([
                'student_id' => $request->student_id,
                'year' => $request->year,
                'course_id' => $request->course_id,
                'mark_Co_Ordinator' => $request->mark_Co_Ordinator,
                'mark_SuperViser' => $request->mark_SuperViser,
                'total' => ($request->mark_Co_Ordinator + $request->mark_SuperViser),


            ]);
            $notification = Notification::create([
                'name' => 'New Result Added of ' . $request->student_id,
                'link' => "route('home')",
                'status' => 'unread',
                'color' => 'green',
            ]);


            return redirect()->route('result.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Result $result)
    {
        return view('backend.result.show', [
            'result' => $result
        ]);
    }

    public function edit(Result $result)
    {
        return view('backend.result.edit', [
            'result' => $result
        ]);
    }

    public function update(Request $request, Result $result)
    {
        try {
            $requestData = [
                'student_id' => $request->student_id,
                'year' => $request->year,
                'course_id' => $request->course_id,
                'mark_Co_Ordinator' => $request->mark_Co_Ordinator,
                'mark_SuperViser' => $request->mark_SuperViser,
                'total' => ($request->mark_Co_Ordinator + $request->mark_SuperViser),
            ];

            $result->update($requestData);

            return redirect()->route('results.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Result $result)
    {
        try {
            $result->delete();
            return redirect()->route('results.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function printResult()
    {
        $fullresultsCollection = [
            $user_id = Role::where('name', 'student')->first()->id,
            $student_name = User::find($user_id)->name,
            $student_id = Student::all()->where('user_id', $user_id)->first()->student_id,
            $courses_registration = Year::where('student_id', $student_id)->get(),
            $result = MarkInput::where('student_id', $student_id)->get(),   
        ];
        //    dd($fullresultsCollection);
        
        return view('backend.result.printResult', [
            'fullresults' => $fullresultsCollection
        ]);
    }
}
