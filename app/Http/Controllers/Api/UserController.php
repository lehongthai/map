<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request, ResponseFactory $responseFactory){
        if ($request->acceptsJson()){
            $email = $request->email;
            $password = $request->password;
            if (Auth::attempt(['email' => $email, 'password' => $password])){
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
            }else{
                $respone = $responseFactory->json([
                   'error' => true,
                   'error_msg' => 'login fail',
                    'user' => null
               ], 400);
            }
        }else{
            $respone = $responseFactory->json([
                'error' => true,
                'error_msg' => 'data not json',
                'user' => null
            ], 400);
        }
        return $respone;
    }

    public function updateLocal(Request $request, ResponseFactory $responseFactory){
        $longitude = $request->longitude;
        $latitude = $request->latitude;
        $mobile_token = $request->token;
        if ($latitude == NULL or $longitude == NULL or $mobile_token == NULL){
            $respone = $responseFactory->json([
                'error' => true,
                'error_msg' => 'data not found'
            ], 400);
        }else{
            $user = User::where('mobile_token', $mobile_token)->first();
            if ($user){
                $checkAddress = $this->callApiGoogleMap($longitude, $latitude);
                if ($checkAddress){
                    $user->address = $checkAddress;
                }
                $user->lng = $longitude;
                $user->lat = $latitude;
                if ($user->save()){
                    $respone = $responseFactory->json([
                        'error' => false
                    ], 200);
                }else{
                    $respone = $responseFactory->json([
                        'error' => true,
                        'error_msg' => 'update fail'
                    ], 400);
                }
            }else{
                $respone = $responseFactory->json([
                    'error' => true,
                    'error_msg' => 'user not fount',
                ], 400);
            }

        }

        return $respone;
    }

    private function callApiGoogleMap($lng, $lat){
        $curl = curl_init();
        $http = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lng . '&sensor=false';
        curl_setopt_array(
            $curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $http,
                CURLOPT_USERAGENT => 'API GET LOCAL GOOGLE MAP',
            )
        );
        $resp = curl_exec($curl);
        curl_close($curl);
        $json_result = json_decode($resp);
        if ($json_result->status == 'OK'){
            if ($json_result->results[0]->formatted_address){
                return $json_result->results[0]->formatted_address;
            }
        }
        return false;
    }
}
