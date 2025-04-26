<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
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
        $this->authorize('update', $user);

        $ideas = $user->ideas()->paginate(3);
        return view('users.edit', compact('user',  'ideas'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {


        $validated = $request->validated();
        if ($request->has('image')) {
            $validated['image'] = $request->file('image')->store('profile', 'public');

            Storage::disk('public')->delete($user->image ?? ''); // Delete the old image if it exists
        }
        $user->update($validated);

        return redirect()->route('users.show', $user)->with('success', 'Profile updated successfully');
    }
}
