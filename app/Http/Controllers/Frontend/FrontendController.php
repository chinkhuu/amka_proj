<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function book()
    {
        $centers = Center::all();
        return view('frontend.book.index',compact('centers'));
    }

    public function show_book($id)
    {
        $decId =  decrypt($id);

        $game_center = Center::findOrFail($decId);
        return view('frontend.book.show', compact('game_center'));
    }

    public function team()
    {
        return view('frontend.team');
    }

    public function feedback(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|digits:8',
            'title' => 'required|string',
            'explanation' => 'required|string'
        ]);

        Feedback::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'title' => $validatedData['title'],
            'explanation' => $validatedData['explanation']
        ]);

        return redirect('/')->with('message', 'Санал хүсэлтийг амжилттай илгээлээ');
    }


}
