<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\CenterGame;
use App\Models\Game;
use Illuminate\Http\Request;

class CenterGameController extends Controller
{
    public function index()
    {
        $center_games = CenterGame::orderBy("created_at", 'DESC')->get();
        return view('admin.center_game.index',compact('center_games'));
    }

    public function create()
    {
        $centers = Center::all();
        $games = Game::all();

        return view('admin.center_game.create',compact('centers','games'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'center_id' => 'required|integer',
            'games' => 'required|array',
        ]);

        $centerId = $validatedData['center_id'];
        $games = $validatedData['games'];

        if (!empty($games)) {
            foreach ($games as $gameId) {

                $existingRecord = CenterGame::where('center_id', $centerId)
                    ->where('game_id', $gameId)
                    ->first();

                if (!$existingRecord) {
                    CenterGame::create([
                        'center_id' => $centerId,
                        'game_id' => $gameId,
                    ]);
                }
            }
        } else {
            return redirect()->back()->with('message', 'Subjects have not been selected');
        }

        return redirect('admin/center-games')->with('message', 'ClassSubjects created successfully');
    }


    public function edit($centerId)
    {
        $selectedGames = CenterGame::where('center_id', $centerId)->get();

        if ($selectedGames->isEmpty()) {
            return redirect()->back()->with('error', 'No subjects selected for this class.');
        }

        $unselectedGames = Game::whereNotIn('id', $selectedGames->pluck('game_id'))->get();
        $center_id = $centerId;
        $centers = Center::all();

        return view('admin.center_game.edit', compact('selectedGames', 'unselectedGames', 'center_id', 'centers'));
    }

    public function addAction($centerId, $gameId)
    {
        $centerGames = CenterGame::where('center_id', $centerId)->where('game_id', $gameId)->first();

        if (!$centerGames) {
            CenterGame::create([
                'center_id' => $centerId,
                'game_id' => $gameId,
            ]);
        }

        return redirect()->route('admin.center-games.edit', $centerId)->with('message', 'Subject added to the class successfully');
    }

    public function removeAction($centerId, $gameId)
    {
        $centerGame = CenterGame::where('center_id', $centerId)->where('game_id', $gameId)->first();

        if ($centerGame) {
            $centerGame->delete();
        }

        return redirect()->route('admin.center-games.edit', $centerId)->with('message', 'Subject removed from the class successfully');
    }
}
