<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\JsonResponse;

class RoleController extends Controller
{
    public function index(): JsonResponse
    {
        $roles = new Role()->getRoles();

        return response()->json(['message' => "Roles of User", 'data' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request): JsonResponse
    {
        $role = new Role();
        $role = $role->newRole($request->name);

        return response()->json(['message' => "Role created successfully", 'data' => $role], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role): JsonResponse
    {
        return response()->json(['message' => "Role found", 'data' => $role], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, int $id): JsonResponse
    {
        $role = new Role();
        $role = $role->findRole($id);

        if (empty($role)) {
            return response()->json(['message' => "Role not found"], 404);
        }

        if (Role::checkStatus($role, Role::STATUS_ACTIVE)) {
            return response()->json(['message' => "Role is already assigned"], 400);
        }

        $role->update($request->all());

        return response()->json(['message' => "Role updated successfully", 'data' => $role], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $role = new Role();
        $role = $role->findRole($id);

        if (!$role) {
            return response()->json(['message' => "Role not found"], 404);
        }

        if (Role::checkStatus($role, Role::STATUS_ACTIVE)) {
            return response()->json(['message' => "Role is already assigned"], 400);
        }

        $role->delete();

        return response()->json(['message' => "Role deleted successfully"], 200);
    }
}
