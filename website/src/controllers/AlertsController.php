<?php
namespace App\Controllers;

use App\Models\AlertsNotification;

class AlertsController {
    public function send() {
        try {
            $project = [
                'greeting' => 'Hi',
                'body' => 'Your monitored URL is currently active and functioning correctly.',
                'thanks' => 'Thank you for using our monitoring system!'
            ];

            $notification = new AlertsNotification($project);
            $result = $notification->send();

            if ($result) {
                return ['success' => true, 'message' => 'Notification sent successfully'];
            } else {
                return ['success' => false, 'message' => 'Failed to send notification'];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }
}