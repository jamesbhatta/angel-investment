<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamDepartment;
use App\Service\ImageService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function index()
    {
        $teams = Team::positioned()->get();

        return view('Team.index', compact('teams'));
    }

    public function create()
    {
        return $this->showForm(new Team([
            'position' => Team::getNextPosition()
        ]));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_department_id' => 'required',
            'name' => 'required',
            'title' => 'nullable',
            'content' => 'nullable',
            'position' => 'nullable',
            'photo' => 'nullable',
        ]);

        $team = Team::create([
            'team_department_id' => $request->team_department_id,
            'name' => $request->name,
            'title' => $request->title,
            'content' => $request->content,
            'position' => $request->position,
        ]);

        if ($request->hasFile('photo')) {
            $team->photo = $this->imageService->swapImage($team->photo, $request->file('photo'));
            $team->save();
        }

        $this->flash()->success('Team added successfully.');

        return redirect()->route('backend.teams.index');
    }

    public function edit(Team $team)
    {
        return $this->showForm($team);
    }

    public function update(Request $request, Team $team)
    {
        $request->validate([
            'team_department_id' => 'required',
            'name' => 'required',
            'title' => 'nullable',
            'content' => 'nullable',
            'position' => 'nullable',
            'photo' => 'nullable',
        ]);

        $team->update([
            'team_department_id' => $request->team_department_id,
            'name' => $request->name,
            'title' => $request->title,
            'content' => $request->content,
            'position' => $request->position,
        ]);

        if ($request->hasFile('photo')) {
            $team->photo = $this->imageService->swapImage($team->photo, $request->file('photo'));
            $team->save();
        }

        $this->flash()->success('Team updated successfully.');

        return redirect()->route('backend.teams.index');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        $this->flash()->success('Team deleted successfully.');
        return redirect()->route('backend.teams.index');
    }

    public function showForm(Team $team)
    {
        $updateMode = false;
        if ($team->exists) {
            $updateMode = true;
        }

        $departments = TeamDepartment::positioned()->get();

        return view('Team.form', compact('team', 'updateMode', 'departments'));
    }
}
