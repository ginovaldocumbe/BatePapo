<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(3);
        return view('users.show', compact('user', 'ideas'));
    }
    public function edit(User $user)
    {

        $ideas = $user->ideas()->paginate(3);
        return view('users.edit', compact('user',  'ideas'));
    }
    public function update(User $user) {
        $validated = request()->validate([
            'name' => 'required|min:3|max:255',
            'bio' => 'nullable|max:255',
            'image' => 'nullable|image|max:2048'
        ]);
        if (request('image')) {
            $validated['image'] = request()->file('image')->store('profile', 'public');

            Storage::disk('public')->delete($user->image ?? ''); // Delete the old image if it exists
        }
        $user->update($validated);

        return redirect()->route('users.show', $user)->with('success', 'Profile updated successfully');
    }
}
