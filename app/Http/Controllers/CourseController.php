<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    
    public function index()
    {

        $courseCollection = Course::latest();

        if (request('search')) {
            $courseCollection = $courseCollection
                ->where('course_name', 'like', '%' . request('search') . '%');
        }

        $course = $courseCollection->paginate(10);

        return view('backend.course.index', [
            'courses' => $course
        ]);
    }

    public function create()
    {
        // $this->authorize('create-course');

        return view('backend.course.create');
    }

    public function store(Request $request)
    {
        //  @dd($request);
        try {
            Course::create([
                'course_name' => $request->course_name,
                'course_code' => $request->course_code,
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

        return redirect()->route('course.index')->withMessage('Successfully Created!');
    }


    public function edit(Course $course)
    {
        return view('backend.course.edit', [
            'single_course' => $course
        ]);
    }

    public function show(Course $course)
    {
        return view('backend.course.show', [
            'show_course' => $course
        ]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $course->update([
         
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,

        ]);

        $course->update();


        return redirect()->route('course.index');
    }

    public function destroy(Course $course)
    {
        try {
            $course->delete();
            return redirect()->route('course.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
