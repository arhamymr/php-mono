<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Users;

class UserController extends BaseController
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
            $users = Users::all();
            return $this->sendResponse($users, 'Users retrieved successfully',);
        } catch (\Exception $e) {
            return $this->errorError($e->getMessage());
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

            $users = new Users();
                    
            $users->username = $request->input("username");
            $users->phone_number = $request->input("phone_number");
            $users->password_hash = bcrypt($request->input("password_hash"));
            $users->save();

            return $this->sendResponse($users, 'User created successfully');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
