<?php

namespace App\Http\Controllers;

use App\Models\ProjectGroup;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProjectGroupController extends Controller
{
    public function index()
    {

        $projectGroups = ProjectGroup::get();
        $teachers = Teacher::all();

        return view('backend.projectGroups.index', [
            'projectGroups' => $projectGroups,
            'teachers' => $teachers,
        ]);
    }

    public function create()
    {
        return view('backend.projectGroups.create', [
            'teachers' => Teacher::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => ['required', 'string', 'max:255'],
            'teacher_id' => ['required', 'integer'],
        ]);

        ProjectGroup::create([
            'project_id' => $request->project_id.', UID= '.time(),
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->route('projectGroups.index');
    }

    public function edit(ProjectGroup $projectGroups)
    {
        return view('backend.projectGroups.edit', [
            'projectGroup' => $projectGroups,
            'teachers' => Teacher::all(),
        ]);
    }

    public function update(Request $request, ProjectGroup $projectGroups)
    {
        // dd($request->all());
        $request->validate([
            'project_id' => ['required', 'string', 'max:255'],
            'teacher_id' => ['required'],
        ]);

        $projectGroups->update([
            'project_id' => $request->project_id,
            'teacher_id' => $request->teacher_id,
        ]);

        return redirect()->route('projectGroups.index');
    }

    public function destroy(ProjectGroup $projectGroups)
    {
        $projectGroups->delete();

        return redirect()->route('projectGroups.index');
    }
}
