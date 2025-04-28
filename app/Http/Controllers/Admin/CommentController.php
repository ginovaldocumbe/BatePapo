<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index()
    {
      
        // Fetch comments from the database order by lastest and paginate
        $comments = Comment::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.comments.index', compact('comments'));
    }

    public function destroy($id)
    {
        // Find the comment by ID and delete it
        $comment = Comment::findOrFail($id);
        $comment->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
