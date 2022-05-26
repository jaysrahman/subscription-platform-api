<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * List of websites.
     *
     * @return void
     */
    public function list()
    {
        $websites = Website::all();
        return $this->getResponse('Success', 'Successfully retrieved website data', $websites, 200);
    }

    /**
     * Create a new website.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $website = new Website;

        $website->domain = $request->domain;

        if (!$request->domain) {
            return $this->getResponse('Failed', 'Please fill the domain', [], 400);
        }

        $website->save();
        return $this->getResponse('Success', 'Successfully created website!', $website, 201);
    }
}
