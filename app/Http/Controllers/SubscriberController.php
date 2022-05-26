<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
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
