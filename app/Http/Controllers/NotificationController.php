<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications()->recent()->paginate(20);
        return view('admin.notifications.index', compact('notifications'));
    }

    public function unreadCount()
    {
        $count = Auth::user()->notifications()->unread()->count();
        return response()->json(['count' => $count]);
    }

    public function apiIndex()
    {
        $notifications = Auth::user()->notifications()->recent()->take(10)->get();
        return response()->json($notifications);
    }

    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        Auth::user()->notifications()->unread()->update(['read_at' => now()]);
        return redirect()->back()->with('success', 'All notifications marked as read');
    }
}
