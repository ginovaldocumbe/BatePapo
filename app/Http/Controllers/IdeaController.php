<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }
    //
    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);
        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea registed successfully!');
    }

    public function destroy(Idea $idea)
    {
       $this->authorize('idea.destroy', $idea);
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
    public function edit(Idea $idea)
    {
        if ($idea->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to see this edit page.');
        }
        $editing = true;
        return view('ideas.show', compact('idea', 'editing'));
    }

    public function update(Idea $idea)
    {
        if ($idea->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to update this idea.');
        }
        request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully!');
    }
}
