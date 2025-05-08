<?php
// app/Services/FirebaseService.php
namespace App\Services;

use Kreait\Firebase\Factory;

class FirebaseService
{
    protected $messaging;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(storage_path('app/firebase/crm-staffshaw-fad5f829a71a.json'));

        $this->messaging = $factory->createMessaging();
    }

    // public function test()
    // {
    //     return $this->messaging;
    // }

    public function sendNotification($token, $title, $body)
    {
        $message = [
            'token' => $token,
            'notification' => [
                'title' => $title,
                'body' => $body,
            ],
        ];

        // return $this->messaging;

        return $this->messaging->send($message);
    }
}
