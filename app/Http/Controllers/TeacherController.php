<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Image;

class TeacherController extends Controller
{

    public function index()
    {

        $teachersCollection = Teacher::latest();

        if (request('search')) {
            $teachersCollection = $teachersCollection
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('phone', 'like', '%' . request('search') . '%');
        }

        $teachers = $teachersCollection->paginate(10);

        return view('backend.teachers.index', [
            'teachers' => $teachers
        ]);
    }

    public function create()
    {
        // $this->authorize('create-teacher');

        return view('backend.teachers.create');
    }

    public function store(Request $request)
    {
        try {
            $techer = Teacher::create([
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'phone' => $request->phone, 
            ]);
            if(request()->file('img')){
                $techer->img = $this->uploadimg(request()->file('img'));
                $techer->save();
            }

            return redirect()->route('teachers.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Teacher $teacher)
    {
        return view('backend.teachers.show', [
            'teacher' => $teacher
        ]);
    }

    public function edit(Teacher $teacher)
    {
        return view('backend.teachers.edit', [
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request, Teacher $teacher)
    {
        try {
            $requestData = [
                'name' => $request->name,
                'designation' => $request->designation,
                'email' => $request->email,
                'phone' => $request->phone,
            ];

            if ($request->hasFile('img')) {
                $img = $request->file('img');
                $name = time() . '.' . $img->getClientOriginalExtension();
                $destinationPath = storage_path('/app/public/teachers/');
                $img->move($destinationPath, $name);
                $teacher->img = $name;
            }

            $teacher->update($requestData);

            return redirect()->route('teachers.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(Teacher $teacher)
    {
        try {
            $teacher->delete();
            return redirect()->route('teachers.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    // Softdelete
    public function trash()
    {
        $teachers = Teacher::onlyTrashed()->get();

        return view('backend.teachers.trashed', [
            'teachers' => $teachers
        ]);
    }

        public function restore($teacher)
    {
        $teacher = Teacher::onlyTrashed()->findOrFail($teacher);
        $teacher->restore();
        return redirect()->route('teachers.trashed')->withMessage('Successfully Restored!');
    }


    public function delete($id)
    {
        $teacher = Teacher::onlyTrashed()->findOrFail($id);
        unlink(public_path('storage/teachers/' . $teacher->img));
        $teacher->forceDelete();
        return redirect()->route('teachers.trashed')->withMessage('Successfully Deleted Permanently!');
    }

    public function uploadimg($file)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        Image::make($file)
            ->resize(270, 270)
            ->save(storage_path() . '/app/public/teachers/' . $fileName);

        return $fileName;
    }
}
