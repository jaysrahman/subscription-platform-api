<?php

namespace App\Http\Controllers;

use App\Models\{Post, Subscribe, Subscriber};
use Illuminate\Http\Request;
use App\Mail\SubscriberEmail;

class PostController extends Controller
{
    /**
     * List of posts.
     *
     * @return void
     */
    public function list()
    {
        $posts = Post::all();
        return $this->getResponse('Success', 'Successfully retrieved post data', $posts, 200);
    }

    /**
     * Create a new post.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function create(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->id_website = $request->id_website;

        if (!$request->title) {
            return $this->getResponse('Failed', 'Please fill the title', [], 400);
        }

        if (!$request->description) {
            return $this->getResponse('Failed', 'Please fill the description', [], 400);
        }

        if (!$request->id_website) {
            return $this->getResponse('Failed', 'Please fill the website id', [], 400);
        }

        $post->save();

        $emailBody = [
            'title' => $post->title,
            'description' => $post->description
        ];

        $subscribe = Subscribe::where('id_website', $request->id_website)->get();
        $subscriber = Subscriber::whereIn('id', $subscribe->pluck('id_subscriber'))->get();
        $receiver = $subscriber->pluck('email');

        foreach ($receiver as $email) {
            \Mail::to($email)->send(new SubscriberEmail($emailBody));
        }

        return $this->getResponse('Success', 'Successfully created post, subscribers can check email for updates from this website', $post, 201);
    }
}
