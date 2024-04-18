<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        return view('admin.feedback', compact('feedbacks'));
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect('admin/feedback')->with('message', 'Feedback deleted successfully');
    }

    public function changeStatus($id, $status)
    {
        $feedback = Feedback::findOrFail($id);

        $allowedStatus = ['resolved', 'not_resolved'];
        if (!in_array($status, $allowedStatus)) {
            return redirect()->back()->with('message', 'Invalid status selected');
        }

        $feedback->update(['status' => $status]);

        return redirect('admin/feedback')->with('message', 'Status changed successfully');
    }
}
