<?php

namespace App\Http\Controllers;

use App\Tweet;

class TweetsController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()
                ->user()
                ->timeline(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'body' => 'required|max:255',
            'image' => 'nullable|image|dimensions:min_width=100,min_height=200',
        ]);

        // if has image, create repo in storage
        if(request('image')) {
            $attributes['image'] = request('image')->store('images');
        }

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body'],
            'image' => (!is_null(request('image')) ? $attributes['image'] : null),
        ]);

        return redirect()->route('home');
    }
}
