<?php

namespace App\Http\Controllers;
use App\Models\ProjectGroup;
use App\Models\ProjectGroupReserve;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\QueryException;

use Illuminate\Http\Request;

class ProjectGroupReserveController extends Controller
{
      
    public function index()
    {

        $projectGroupReserveCollection = ProjectGroupReserve::latest();
        

        if (request()->has('project_id')) {
            $projectGroupReserveCollection = $projectGroupReserveCollection
                ->where('project_id', request('project_id'));
                

        }

        if (request('search')) {
            $projectGroupReserveCollection = $projectGroupReserveCollection
                ->where('project_id', 'like', '%' . request('search') . '%');
                // ->orWhere('student_id', 'like', '%' . request('search') . '%')
                // ->orWhere('teacher_id', 'like', '%' . request('search') . '%');
        }

        $projectGroupReserve = $projectGroupReserveCollection->paginate(10);
        // dd($projectGroupReserve);
        $roles = Role::all();
        $teachers = Teacher::all();
        $students = Student::all();
        $projects = ProjectGroup::all();

        return view('backend.projectGroupReserves.index', [
            'projectGroupReserves' => $projectGroupReserve,
            'roles' => $roles,
            'teachers'=> $teachers,
            'students'=> $students,
            'projects'=> $projects
        ]);
    }

    public function create()
    {
        $projectGroups = ProjectGroup::all();
        $roles = Role::all();
        $teachers = Teacher::all();
       
        $students_id = Student::all();

        // dd($students_id);
        
        return view('backend.projectGroupReserves.create', [
            'roles' => $roles,
            'teachers'=> $teachers,
            'students'=> $students_id,
            'projectGroups'=> $projectGroups
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        ProjectGroupReserve::create([
            'project_group_id' => $request->project_group_id,

            'student_id' =>  json_encode($request->student_id),
           
      
           
        ]);

        return redirect()->route('projectGroupReserves.index');
    }

    public function edit(ProjectGroupReserve $projectGroupReserves)
    {
        // dd($projectGroupReserves);
        $projectGroupReserves = ProjectGroupReserve::find($projectGroupReserves->first() ->id);
        $roles = Role::latest()->get();
        $teachers = Teacher::latest()->get();
        $students = Student::latest()->get();
        $projectGroups = ProjectGroup::latest()->get();
        return view('backend.projectGroupReserves.edit', [
            'projectGroupReserve' => $projectGroupReserves,
            'roles' => $roles,
            'teachers'=> $teachers,
            'students'=> $students,
            'projectGroups'=> $projectGroups
        ]);
    }

    public function update(Request $request, ProjectGroupReserve $ProjectGroupReserves)
    {
        try {
            $projectGroupReserves = ProjectGroupReserve::find($ProjectGroupReserves->first() ->id);

            $requestData = [
                'project_id' => $request->project_id,
                'student_id' => json_encode($request->student_id),
            ];
            
            // $ProjectGroupReserve-> students()->attach($request->student_id);
            $ProjectGroupReserves->update($requestData);


            return redirect()->route('projectGroupReserves.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(ProjectGroupReserve $ProjectGroupReserves)
    {
        try {
            $ProjectGroupReserves->find($ProjectGroupReserves->first() ->id)->delete();

            // $ProjectGroupReserves->forceDelete();
            return redirect()->route('projectGroupReserves.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
