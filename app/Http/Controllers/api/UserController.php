<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\User\StoreRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list() {
        return response()->json(User::with('role')->latest()->get(), 200);
    }

    public function store(StoreRequest $request) {
        User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User has been created.'
        ], 201);
    }

    public function getUser(User $user) {
        return response()->json($user, 200);
    }

    public function update(Request $request, User $user) {
        $user->update([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User has been updated.'
        ], 200);
    }

    public function destroy(User $user) {

        $user->delete();

        return response()->json([
            'message' => 'User has been deleted.'
        ], 201);
    }

}
