<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams', $teams));
    }

    public function create()
    {

    }

    public function show($teamId)
    {

    }

    public function edit($teamId)
    {
        $team = Team::findOrFail($teamId);
        return view('teams.form', compact('team', $team));
    }

    public function update($teamId, Request $request)
    {
        if($request->submit_type == 'Delete'){
            return $this->delete($teamId);
        }

        $team = Team::findOrFail($teamId);
        $team->name = $request->name;
        $team->is_active = !! $request->is_active;
        $path = $request->file('logo')->store(
            'team_logo/'.$team->id, 'public'
        );

        Storage::disk('public')->get($path);
        $team->logo_uri = $path;
        $team->save();

        return redirect()->route('teams.edit', $team->id);
    }

    public function store(Request $request)
    {

        // $team = Team::findOrFail($teamId);

        // var_dump(request()->all());
        // return redirect()->route('teams.edit', $team->id);
    }

    public function delete($teamId)
    {
        $team = Team::findOrFail($teamId);
        $team->delete();

        return redirect()->route('teams.index')->with('message', 'success|Record deleted.');
    }
}
