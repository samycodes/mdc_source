<?php

namespace App\Http\Composer;

use Illuminate\Contracts\View\view;

use App\Objects\Notification;

class Notify
{
    public function compose(View $view)
    {
        
        $activityCount = Notification::where('read_status','unread')->count();
       
        $recentActivities = Notification::orderBy('created_at', 'desc')
                            ->where('read_status','unread')
                            ->take(3)->get();

        $view->with('activityCount', $activityCount);
        $view->with('recentActivities', $recentActivities);
    }
}
