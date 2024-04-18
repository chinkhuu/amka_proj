<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order($id)
    {
        $game_center = Center::findOrFail($id);
        return view('frontend.order_form', compact('game_center'));
    }

    public function booking_order(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'game_center' => 'required',
            'person_quantity' => 'required|integer|min:1',
            'start_date_time' => 'required',
            'room_type' => 'required',
            'end_date_time' => 'required',
            'total_play_time' => 'required',
            'total_payment_amount' => 'required'
        ]);

        if ($user->point < $request->total_payment_amount) {
            return back()->withErrors(['total_payment_amount' => 'Уг худалдан авалтыг хийхэд таны үлдэгдэл хүрэлцэхгүй байна.'])->withInput();
        }

        Order::create([
            'user_id' => $user->id,
            'center_id' => $validatedData['game_center'],
            'person_quantity' => $validatedData['person_quantity'],
            'start_date_time' => $validatedData['start_date_time'],
            'end_date_time' => $validatedData['end_date_time'],
            'room_type' => $validatedData['room_type'],
            'total_play_time' => $validatedData['total_play_time'],
            'total_payment_amount' => $validatedData['total_payment_amount']
        ]);

        $user->point -= $request->total_payment_amount;
        $user->save();

        $center = Center::findOrFail($validatedData['game_center']);
        $center->total_point += $request->total_payment_amount;
        $center->save();

        return redirect('/')->with('message','Захиалга амжилттай, захиалгийн шийдвэр гартал түр хүлээнэ үү');
    }

    public function my_order()
    {
        $user = Auth::user();
        $orders =  Order::where('user_id',$user->id)->get();
        return view('frontend.order',compact('orders'));

    }

}
