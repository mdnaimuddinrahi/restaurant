<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignPermissionToRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    public function index(): JsonResponse
    {
        $permissions = new Permission()->getPermissions();

        return response()->json(['message' => 'Permissions retrieved successfully', 'data' => $permissions]);
    }

    public function assignPermissionToRole(AssignPermissionToRoleRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $role = new Role()->findRole($request->role_id);

            $role->permissions()->sync(
                $request->permissions
            );
            DB::commit();

            Cache::forever(
                "role_permissions_{$role->id}",
                $role->permissions()
                    ->pluck('slug')
                    ->toArray()
            );

            return response()->json([
                'success' => true,
                'message' => 'Permissions assigned successfully.',
            ]);

        } catch (\Throwable $e) {

            DB::rollBack();
            Log::error('Failed to assign permissions to role', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);


            return response()->json([
                'success' => false,
                'message' => 'Something went wrong.',
            ], 500);
        }
    }
}
