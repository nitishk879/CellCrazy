<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);

        $notifications = $user->unreadNotifications;

        return view('admin.notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::id());

        $notifications = $user->unreadNotifications;

        return $notifications->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        tap(auth()->user()->unreadNotifications)->markAsRead();

        return redirect('admin.index')->with('success', 'All notifications marks as read.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = tap(auth()->user()->unreadNotifications)->markAsRead();

        return view('admin.notifications.view', compact('notification', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.notifications.notification', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->unreadNotifications($request->id)->markAsRead();
        return redirect('admin.notifications');
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        return response()->json('Notification removed');
    }

    public function markAsRead(Notification $notification){

        $notification->update(['read_at' => now()]);

        return response()->json('Thanks, marked as read.');
    }
}
