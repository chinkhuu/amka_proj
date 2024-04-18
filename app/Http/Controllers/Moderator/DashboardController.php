<?php

namespace App\Http\Controllers\Moderator;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('moderator.dashboard');
    }

    public function orders()
    {
        $authUser = Auth::user();
        $center = $authUser->center;

        if ($authUser->role_as == 2)
        {
            $orders = Order::where('center_id',$center->id)->get();
            return view('moderator.order',compact('orders'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function changeStatus(Request $request,$id)
    {
        $order = Order::findOrFail($id);

        if ($order->status_change_chance < 1) {
            return redirect()->back()->with('error', 'Төлөв өөрчлөх боломжгүй');
        }

        $allowedStatus = ['refused', 'accepted'];
        if (!in_array($request->status, $allowedStatus)) {
            return redirect()->back()->with('error', 'Сонгох боломжгүй сонголт');
        }

        if ($request->status == 'refused') {
            $user = $order->user;
            $user->point += $order->total_payment_amount;
            $user->save();
        }

        $order->update([
            'status' => $request->status,
            'comment' => $request->comment,
            'status_change_chance' => 0
        ]);

        return redirect('moderator/orders')->with('message', 'Захиалгийн төлөв амжилттай шинэчлэгдлээ');
    }

}
