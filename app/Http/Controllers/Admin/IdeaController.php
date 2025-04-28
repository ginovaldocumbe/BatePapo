<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //
    public function index()
    {
        // Fetch all ideas from the database ordered by created_at in descending order and paginate them
        $ideas = Idea::orderBy('created_at', 'desc')->paginate(5);

        // Return the view with the ideas
        return view('admin.ideas.index', compact('ideas'));
    }
    public function destroy($id)
    {
        // Find the idea by ID and delete it
        $idea = Idea::findOrFail($id);
        $idea->delete();

        // Redirect back to the ideas index with a success message
        return redirect()->route('admin.ideas.index')->with('success', 'Idea deleted successfully.');
    }
}
