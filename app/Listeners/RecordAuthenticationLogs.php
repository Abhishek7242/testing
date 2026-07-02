<?php

namespace App\Listeners;

use App\Models\LoginLog;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;

class RecordAuthenticationLogs
{
    protected $request;

    /**
     * Create the event listener.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle authentication events.
     */
    public function handle(object $event): void
    {
        $payload = [
            'ip_address' => $this->request->ip(),
            'user_agent' => $this->request->userAgent(),
        ];

        if ($event instanceof Login) {
            $payload['user_id'] = $event->user->id;
            $payload['email'] = $event->user->email;
            $payload['event'] = 'login';
            $payload['status'] = 'success';

            // Mark user as active immediately upon login
            $event->user->touch();
        } elseif ($event instanceof Logout) {
            if ($event->user) {
                $payload['user_id'] = $event->user->id;
                $payload['email'] = $event->user->email;
            }
            $payload['event'] = 'logout';
            $payload['status'] = 'success';
        } elseif ($event instanceof Failed) {
            if ($event->user) {
                $payload['user_id'] = $event->user->id;
                $payload['email'] = $event->user->email;
            } else {
                $payload['email'] = $event->credentials['email'] ?? null;
            }
            $payload['event'] = 'login';
            $payload['status'] = 'failure';
        } else {
            return;
        }

        LoginLog::create($payload);
    }
}
