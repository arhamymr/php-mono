<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;

class UserController extends Controller
{
    protected function successResponse($message, $data = [], $status = JsonResponse::HTTP_OK)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    protected function errorResponse($message, $error = null, $status = JsonResponse::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'error' => $error,
        ], $status);
    }

    public function index()
    {
        try {
            $users = User::all();
            return $this->successResponse('Users retrieved successfully', $users);
        } catch (\Exception $e) {
            return $this->errorResponse('Error retrieving users', $e->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            // $request->validate([
            //     'username' => 'required|string',
            //     'phone_number' => 'required|unique:users|string',
            //     'password_hash' => 'required|string',
            // ]);


            $user = new User();

            $user->username = 'user';
            $user->phone_number = '08942323';
            $user->password_hash = bcrypt('password123');
            $user->save();

            return $this->successResponse('User created successfully', $user, JsonResponse::HTTP_CREATED);
        } catch (\Exception $e) {
            return $this->errorResponse('Error creating user', $e->getMessage());
        }
    }
}
