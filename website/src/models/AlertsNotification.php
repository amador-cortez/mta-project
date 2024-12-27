<?php
namespace App\Notification;

class AlertsNotification {
    private $to;
    private $subject;
    private $message;
    private $headers;

    public function __construct($project = []) {
        $this->to = 'a1283472@uabc.edu.mx';
        $this->subject = 'Monitor Alert Notification';
        $this->message = $this->buildMessage($project);
        $this->headers = $this->buildHeaders();
    }

    private function buildMessage($project): string {
        return "
            <html>
            <head>
                <title>{$this->subject}</title>
            </head>
            <body>
                <h2>" . ($project['greeting'] ?? 'Hi') . "</h2>
                <p>" . ($project['body'] ?? 'This is a notification from the monitoring system.') . "</p>
                <p>" . ($project['thanks'] ?? 'Thank you for using our monitoring system!') . "</p>
            </body>
            </html>
        ";
    }

    private function buildHeaders(): string {
        return implode("\r\n", [
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=UTF-8',
            'From: Monitor System <noreply@yourdomain.com>',
            'X-Mailer: PHP/' . phpversion()
        ]);
    }

    public function send(): bool {
        return mail($this->to, $this->subject, $this->message, $this->headers);
    }
}

