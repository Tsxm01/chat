<?php

namespace App\Actions;

use Spatie\QueueableAction\QueueableAction;

class WebsocketsServeAction
{
    use QueueableAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute()
    {
        \Artisan::call('websockets:serve');
    }
}
