<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = User::where(['email'=> $request->email])->first();
                $accessToken = $user->createToken('authToken')->accessToken;

                $data = [
                    'access_token' => $accessToken,
                    'userData' => $user,
                ];
                return response()->successResponse('Login successful', $data);
            } else {
                return response()->errorResponse('Mobile or password is incorrect', 401);
            }
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->errorResponse($e->getMessage());
        }
    }

    public function register(UserRequest $request)
    {
        try {
            $data = $request->except('password');
            $data['password'] = bcrypt($request->password);
            $user = User::create($data);

            return response()->successResponse('Registration Successful', new UserResource($user));
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->errorResponse();
        }
    }

    public function logout()
    {
        try {
            $user = Auth::user()->token();
            $user->revoke();
            return response()->successResponse('Logout successful', '');
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->errorResponse();
        }
    }
}
