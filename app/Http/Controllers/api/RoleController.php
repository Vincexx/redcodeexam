<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Role\StoreRequest;
use App\Models\Role;
use Exception;
use DB;

class RoleController extends Controller
{
    public function list() {
        try {
            return response()->json(Role::latest()->get(), 200);
        } catch (Exception $e) {
            return response()->json([
                'errors'    =>  [ 'Roles not found!' ]
            ], 400);
        }
    }

    public function store(StoreRequest $request) {

        DB::beginTransaction();

        try {
            Role::create($request->only('name', 'description'));
            DB::commit();
            return response()->json([
                'message' => 'Role has been added.'
            ], 201);
        } catch(Exception $e) {
            DB::rollback();
            return response()->json([
                'errors' =>  [ 'There is something wrong with our end. Contact us to fix it.' ]
            ], 500);
        }

    }

    public function getRole(Role $role) {
        try {
            return response()->json($role, 200);
        } catch (Exception $e) {
            return response()->json([
                'errors'    =>  [ 'Role not found!' ]
            ], 400);
        }
    }

    public function update(Request $request, Role $role) {
        DB::beginTransaction();
        try {
            $role->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            DB::commit();
            return response()->json([
                'message' => 'Role has been updated.'
            ], 200);
        } catch(Exception $e) {
            DB::rollback();
            return response()->json([
                'errors' =>  [ 'There is something wrong with our end. Contact us to fix it.' ]
            ], 500);
        }
    }

    public function destroy(Role $role) {
        DB::beginTransaction();
        try {
            $role->delete();
            DB::commit();
            return response()->json([
                'message' => 'Role has been deleted.'
            ], 200);
        } catch(Exception $e) {
            DB::rollback();
            return response()->json([
                'errors' =>  [ 'There is something wrong with our end. Contact us to fix it.' ]
            ], 500);

        }
    }
}
