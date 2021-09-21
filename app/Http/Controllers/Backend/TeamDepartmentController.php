<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TeamDepartment;
use Illuminate\Http\Request;

class TeamDepartmentController extends Controller
{
    public function index()
    {
        return $this->showForm(new TeamDepartment([
            'position' => TeamDepartment::getNextPosition()
        ]));
    }

    public function create()
    {
        return $this->showForm(new TeamDepartment([
            'position' => TeamDepartment::getNextPosition()
        ]));
    }

    private function showForm(TeamDepartment $department)
    {
        $updateMode = false;
        if ($department->exists) {
            $updateMode = true;
        }

        $departments = TeamDepartment::positioned()->latest()->get();

        return view('department.index', compact(['departments', 'department', 'updateMode']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'position' => 'nullable',
        ]);

        $department = TeamDepartment::create([
            'title' => $request->title,
            'position' => $request->position,
        ]);

        $this->flash()->success('Department added successfully.');

        return redirect()->route('backend.departments.index');
    }

    public function edit(TeamDepartment $department)
    {
        return $this->showForm($department);
    }

    public function update(Request $request, TeamDepartment $department)
    {
        $request->validate([
            'title' => 'required',
            'position' => 'nullable',
        ]);

        $department->update([
            'title' => $request->title,
            'position' => $request->position,
        ]);

        $this->flash()->success('Department updated successfully.');

        return redirect()->route('backend.departments.index');
    }

    public function destroy(TeamDepartment $department)
    {
        if (!$department->canBeDeletedSafely()) {
            $this->flash()->success('Sorry this Department cannot be deleted.');

            return redirect()->back();
        }

        $department->delete();
        $this->flash()->success('Department deleted successfully.');

        return redirect()->route('backend.departments.index');
    }
}
