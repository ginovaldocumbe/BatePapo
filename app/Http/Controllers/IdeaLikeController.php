<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaLikeController extends Controller
{
    //
    public function like(Idea $idea)
    {
        $liker = auth()->user();
        $idea->likes()->attach($liker->id);

        return redirect()->back()->with('success', 'You liked this idea.');
    }
    public function unlike(Idea $idea)
    {
        $liker = auth()->user();
        $idea->likes()->detach($liker->id);

        return redirect()->back()->with('success', 'You unliked this idea.');
    }
}
