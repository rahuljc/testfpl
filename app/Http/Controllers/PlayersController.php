<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index()
    {
        $teams = Player::all();
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
