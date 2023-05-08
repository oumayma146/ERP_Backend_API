<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Retrieve all users with their corresponding roles
    public function index()
    {
        $users = User::with('roles')->get();
        return response()->json($users);
    }

    // Retrieve a specific user with their corresponding roles
    public function show($id)
    {
        $user = User::with('roles')->find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    // Create a new user with roles
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        // Attach roles to user
        $roles = $request->input('roles');
        if ($roles) {
            $user->roles()->attach($roles);
        }

        return response()->json($user, 201);
    }

    // Update a user's details and roles
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->save();

            // Sync updated roles for user
            $roles = $request->input('roles');
            if ($roles) {
                $user->roles()->sync($roles);
            }

            return response()->json($user, 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted'], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}