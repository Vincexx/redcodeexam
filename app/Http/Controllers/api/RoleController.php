<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Role\StoreRequest;
use App\Models\Role;

class RoleController extends Controller
{
    public function list() {
        return response()->json(Role::latest()->get(), 200);
    }

    public function store(StoreRequest $request) {

        Role::create($request->only('name', 'description'));

        return response()->json([
            'message' => 'Role has been added.'
        ], 201);

    }

    public function getRole(Role $role) {
        return response()->json($role, 200);
    }

    public function update(Request $request, Role $role) {

        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Role has been updated.'
        ], 200);
    }

    public function destroy(Role $role) {
        $role->delete();

        return response()->json([
            'message' => 'Role has been deleted.'
        ], 200);
    }
}
