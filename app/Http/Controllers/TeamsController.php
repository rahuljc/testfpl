<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return response()->json($teams);
    }

    public function create()
    {

    }

    public function show($teamId)
    {

    }

    public function store(Request $request)
    {

    }

    public function delete($teamId)
    {

    }
}
