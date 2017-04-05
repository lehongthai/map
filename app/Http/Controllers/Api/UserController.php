<?php
namespace App\Http\Controllers\Api;
use App\Models\StatusUser;
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
                    'error_msg' => 'null',
                    'user' => [
                        'email' => $email,
                        'name' => Auth::user()->name,
                        'mobile_token' => Auth::user()->mobile_token
                    ]
                ], 200);
            } else {
                $respone = $responseFactory->json([
                    'error' => true,
                    'error_msg' => 'login fail',
                    'user' => 'null'
                ], 400);
            }
        } else {
            $respone = $responseFactory->json([
                'error' => true,
                'error_msg' => 'data not json',
                'user' => 'null'
            ], 400);
        }
        return $respone;
    }

    public function updateLocal(Request $request, ResponseFactory $responseFactory)
    {
        $validator = \Validator::make($request->all(), [
            'delivery_id' => 'required|numeric|exists:deliverys,id',
            'token' => 'required|exists:users,mobile_token',
            'lat' => 'required',
            'lng' => 'required'
        ]);

        if ($validator->fails()) {
            $respone = $responseFactory->json([
                'error' => true,
                'error_msg' => $validator->messages()
            ], 400);
        } else {
            $longitude = $request->lng;
            $latitude = $request->lat;
            $mobile_token = $request->token;
            $did = $request->delivery_id;
            $timeOff = $request->timeoff;
            $delivery = new Delivery();
            $statusUser = new StatusUser();
            $statusUser->updateStatus($timeOff, $mobile_token);
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


    public function postOnline(Request $request, ResponseFactory $responseFactory)
    {
         $validator = \Validator::make($request->all(), 
            [
            'token' => 'required|exists:users,mobile_token',
            'online' => 'required|numeric'
            ],
            [
            'token.exists' => 'can\'t find token'
            ]);

        if ($validator->fails()) {
            $respone = $responseFactory->json([
                'error' => true,
                'error_msg' => $validator->messages()
            ], 400);
        } else {
            $online = $request->online;
            $mobile_token = $request->token;
            $user = new User();
            if ($user->updateStatus($mobile_token,$online)) {
                $respone = $responseFactory->json([
                    'error' => false,
                    'error_msg' => 'null'
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
