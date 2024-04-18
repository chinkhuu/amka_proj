<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::orderBy("created_at", 'desc')->get();
        return view('admin.game.index', compact('games'));
    }

    public function create()
    {
        return view('admin.game.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Game::create([
            'name' => $validatedData['name'],
        ]);

        return redirect('admin/game')->with('message', 'Game created Successfully');

    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('admin.game.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $game->name = $validatedData['name'];
        $game->save();

        return redirect('admin/game')->with('message', 'Game updated successfully');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect('admin/game')->with('message', 'Subject deleted successfully');
    }
}
