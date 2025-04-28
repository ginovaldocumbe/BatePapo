<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        // Fetch all users from the database order by lastest and paginate
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect back with a success message
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
