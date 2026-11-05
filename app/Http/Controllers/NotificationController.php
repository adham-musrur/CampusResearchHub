<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{


    public function index()
    {
        $notifications = auth()
            ->user()
            ->notifications()
            ->latest()
            ->paginate(10);


        return view(
            'notifications.index',
            compact('notifications')
        );
    }





    public function markAsRead($id)
    {

        $notification = auth()
            ->user()
            ->notifications()
            ->where('id',$id)
            ->firstOrFail();



        $notification->markAsRead();



        return back();

    }





    public function markAllRead()
    {

        auth()
            ->user()
            ->unreadNotifications
            ->markAsRead();


        return back();

    }


}