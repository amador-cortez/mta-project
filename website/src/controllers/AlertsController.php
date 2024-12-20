<?php

namespace App\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Notification\AlertsNotification;

class AlertsController extends Controller
{
    public function send()
    {
        $user = User::first();

        $project = [
            'greeting' => 'Hi',
            'body' => 'This is a sample notification.',
            'thanks' => 'Thank you for using our app!',
            'actionText' => 'View Project',
            'actionURL' => url('/'),
            'id' => 1
        ];

        Notification::send($user, new AlertsNotification($project));

        dd('Notification sent!');
    }
}
