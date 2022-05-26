<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Subscribe to a website.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function subscribe(Request $request)
    {
        $subscribe = new Subscribe;

        $subscribe->id_subscriber = $request->id_subscriber;
        $subscribe->id_website = $request->id_website;

        if (!$request->id_subscriber) {
            return $this->getResponse('Failed', 'Please fill the subscriber id', [], 400);
        }

        if (!$request->id_website) {
            return $this->getResponse('Failed', 'Please fill the website id', [], 400);
        }

        $subscribe->save();
        return $this->getResponse('Success', 'Successfully subscribed to the website!', $subscribe, 201);
    }
}
