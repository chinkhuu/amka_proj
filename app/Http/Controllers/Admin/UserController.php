<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function recharge(Request $request,$id)
    {
        $authUser = Auth::user();

        if ($authUser->role_as == 1 ) {
            $request->validate([
                'recharge_amount' => 'required|numeric'
            ]);

            $mpaidAmount = $request->input('recharge_amount');

            $decryptId = decrypt($id);

            $user_payment = User::find($decryptId);

            if (0 <= $mpaidAmount) {
                $user_payment->point += $mpaidAmount;
                $user_payment->save();
            } else {
                return redirect('admin/users')->with('error', 'Төлсөн утга 0 ээс бага байх боломжгүй');
            }
        }else {
            return redirect()->back()->with('message', 'Таньд хэрэглэгч нэмэх эрх байхгүй байна');
        }

        return redirect('admin/users')->with('message', 'Цэнэглэлт амжилттай');
    }

}
