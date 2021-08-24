<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('players.index', $players);
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
