<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\Delivery;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request, ResponseFactory $responseFactory)
    {
        if ($request->acceptsJson()) {
            $email = $request->email;
            $password = $request->password;
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                $respone = $responseFactory->json([
                    'error' => false,
                    'error_msg' => null,
                    'user' => [
                        'email' => $email,
                        'name' => Auth::user()->name,
                        'created_at' => Auth::user()->created_at,
                        'mobile_token' => Auth::user()->mobile_token
                    ]
                ], 200);
            } else {
                $respone = $responseFactory->json([
                    'error' => true,
                    'error_msg' => 'login fail',
                    'user' => null
                ], 400);
            }
        } else {
            $respone = $responseFactory->json([
                'error' => true,
                'error_msg' => 'data not json',
                'user' => null
            ], 400);
        }
        return $respone;
    }

    public function updateLocal(Request $request, ResponseFactory $responseFactory)
    {
        $validator = \Validator::make($request->all(), [
            'did' => 'required|numeric|exists:deliverys,id',
            'token' => 'required|exists:users,mobile_token',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        if ($validator->fails()) {
            $respone = $responseFactory->json([
                'error' => true,
                'error_msg' => $validator->messages()
            ], 400);
        } else {
            $longitude = $request->longitude;
            $latitude = $request->latitude;
            $mobile_token = $request->token;
            $did = $request->did;
            $delivery = new Delivery();
            $user = new User();
            if ($delivery->updateRoutes($did, $longitude, $latitude) && $user->updateLocal($mobile_token, $latitude, $longitude)) {
                $respone = $responseFactory->json([
                    'error' => false
                ], 200);
            } else {
                $respone = $responseFactory->json([
                    'error' => true,
                    'error_msg' => 'update fail'
                ], 400);
            }
        }
        return $respone;
    }
}
