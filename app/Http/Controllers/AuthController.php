<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // ✅ Manual JSON validation response
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors(),
            ], 422);
        }
        $input = $validator->validated();

        // $user = User::where('email', $input['email'])->first();'
        $user = new User()->findUser($input);

        // ✅ Manual JSON error for wrong credentials
        if (! $user || ! Hash::check($input['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'The provided credentials are incorrect.',
            ], 401);
        }

        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success'      => true,
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user'         => $user,
        ], 200);
    }

    public function logout(Request $request)
    {
        /** @var \Laravel\Sanctum\PersonalAccessToken|null $token */
        // $request->user()->currentAccessToken()?->delete();
        // $request->user()->tokens()->delete();
        
        $token = $request->user()->currentAccessToken();

        $token?->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    public function store(RegisterRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $input = $request->validated();

            $user = User::create([
                'name'        => $input['name'],
                'username'    => $input['username'],
                'email'       => $input['email'],
                'password'    => Hash::make($input['password']),
                'role_id'     => $input['role_id'],
                'profile_img' => $input['profile_img'] ?? '',
            ]);

            $role = Role::query()
                ->lockForUpdate()
                ->find($input['role_id']);

            if (!$role) {
                DB::rollBack();

                return response()->json([
                    'success' => false,
                    'message' => 'Role not found.',
                ], 404);
            }

            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $role->id,
            ]);

            if (Role::checkStatus($role, Role::STATUS_INACTIVE)) {
                $role->update([
                    'status' => Role::STATUS_ACTIVE,
                ]);
            }

            DB::commit();

            event(new Registered($user));

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success'      => true,
                'message'      => 'Registration successful.',
                'access_token' => $token,
                'token_type'   => 'Bearer',
                'user'         => $user->fresh(),
            ], 201);

        } catch (\Throwable $e) {

            DB::rollBack();

            Log::error('User registration failed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again later.',
            ], 500);
        }
    }

    public function customerLogin(Request $request)
    {
        // ✅ Manual JSON validation response
        $validator = Validator::make($request->all(), [
            'email'    => ['required', 'email'],
            'password' => ['required', 'string','min:3'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors'  => $validator->errors(),
            ], 422);
        }
        $input = $validator->validated();

        // $customer = Customer::where('email', $input['email'])->first();'
        $customer = new Customer()->findCustomer($input);

        // ✅ Manual JSON error for wrong credentials
        if (! $customer || ! Hash::check($input['password'], $customer->password)) {
            return response()->json([
                'success' => false,
                'message' => 'The provided credentials are incorrect.',
            ], 401);
        }

        $customer->tokens()->delete();

        $token = $customer->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success'      => true,
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user'         => $customer,
        ], 200);
    }

    public function customerStore(StoreCustomerRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $input = $request->validated();

            $customer = Customer::create([
                'name'        => $input['name'],
                'email'       => $input['email'],
                'phone'       => $input['phone'] ?? '',
                'password'    => Hash::make($input['password']),
            ]);


            DB::commit();

            event(new Registered($customer));

            $token = $customer->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success'      => true,
                'message'      => 'Registration successful.',
                'access_token' => $token,
                'token_type'   => 'Bearer',
                'user'         => $customer->fresh(),
            ], 201);

        } catch (\Throwable $e) {

            DB::rollBack();

            Log::error('Customer registration failed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again later.',
            ], 500);
        }
    }

    
    public function customerLogout(Request $request)
    {
        /** @var \Laravel\Sanctum\PersonalAccessToken|null $token */
        // $request->user()->currentAccessToken()?->delete();
        // $request->user()->tokens()->delete();
        
        $token = $request->user()->currentAccessToken();

        $token?->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function customerMe(Request $request)
    {
         
        return response()->json($request->auth('customer')->user());
    }
}

