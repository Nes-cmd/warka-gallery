<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Events\PaymentProcessed;

class PusherNotificationController extends Controller
{
    public function notification($id)
    {
        // $data['message'] = 'Hello Nesren';
        // $data['id'] = $id;
        // event(new PaymentProcessed($data));

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), 
            $options
        );

        $data['message'] = 'Hello Nesren';
        $pusher->trigger('warkaorder'.$id, 'App\\Events\\PaymentProcessed', $data);

    }
}