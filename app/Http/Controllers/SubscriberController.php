<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * List of subscribers.
     *
     * @return void
     */
    public function list()
    {
        $subscribers = Subscriber::all();
        return $this->getResponse('Success', 'Successfully retrieved subscriber data', $subscribers, 200);
    }

    /**
     * Create a new subscriber.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $subscriber = new Subscriber;

        $subscriber->email = $request->email;

        if (!$request->email) {
            return $this->getResponse('Failed', 'Please fill the email', [], 400);
        }

        $subscriber->save();
        return $this->getResponse('Success', 'Successfully created subscriber!', $subscriber, 201);
    }
}
