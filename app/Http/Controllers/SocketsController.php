<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Broadcasting\Broadcasters\PusherBroadcaster;
use Illuminate\Http\Request;
use Pusher\Pusher;
use Illuminate\Support\Facades\Artisan;
use App\Actions\WebsocketsServeAction;
use App\Jobs\WebsocketsServeJob;
class SocketsController
{
    public function connect(Request $request)
    {
        $broadcaster = new PusherBroadcaster(
            new Pusher(
                env("PUSHER_APP_KEY"),
                env("PUSHER_APP_SECRET"),
                env("PUSHER_APP_ID"),
                []
            )
        );

        return $broadcaster->validAuthenticationResponse($request, []);
    }

    public function serve(WebsocketsServeAction $websocketsServeAction)
    {
        // Dispatch the job
        WebsocketsServeJob::dispatch();

        return response()->json(['message' => 'WebSocket server start job dispatched']);
    }
}
