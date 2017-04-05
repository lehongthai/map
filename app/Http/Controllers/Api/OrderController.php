<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Models\Delivery;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function getOrder(Request $request, ResponseFactory $responseFactory)
    {
        $mobile_token = $request->get('token');
        $user = User::where('mobile_token', $mobile_token)->first();
        if(!$user){
            $respone = $responseFactory->json([
                    'error' => true,
                    'error_msg' => 'can\'t find user'
                ], 400);
        }else{
            $id = $user->id;
            $delivery = new Delivery();
            $orders = $delivery->getOrder($id);
            if (!$orders) {
                $respone = $responseFactory->json([
                    'error' => true,
                    'error_msg' => 'can\'t find delivery'
                ], 400);
            }else{
                $respone = $responseFactory->json([
                        'error' => false,
                        'error_msg' => null,
                        'orders' => $orders 
                ], 200);
            }
        }
        return $respone;
    }

     public function update_order(Request $request, ResponseFactory $responseFactory)
    {
        $mobile_token = $request->get('token');
        $id_order = $request->get('id_order');
        $user = User::where('mobile_token', $mobile_token)->first();
        $id = Delivery::where('id',$id_order)->first();       
        if(!$user){
            $respone = $responseFactory->json([
                    'error' => true,
                    'error_msg' => 'can\'t find user'
                ], 400);
        }
        elseif(!$id)
        {
            $respone = $responseFactory->json([
                    'error' => true,
                    'error_msg' => 'can\'t find id_order'
                ], 400);
        }
        else{
            $user = $user->id;
            $id = $id->id;     
            $delivery = new Delivery();
            $orders = $delivery->getupdateOrder($user,$id);
            if (!$orders) {
                $respone = $responseFactory->json([
                    'error' => true,
                    'error_msg' => 'can\'t find delivery'
                ], 400);
            }else{
                $a = $request->id_order;
                $b = $request->status_order;
                $delivery->updateStatus($a,$b);
                $orders = $delivery->getupdateOrder($user,$id);
                $respone = $responseFactory->json([
                        'error' => false,
                        'error_msg' => null,
                        'orders' => $orders 
                ], 200);
            }
        }
        return $respone;
    }

    public function lastOrder(Request $request, ResponseFactory $responseFactory){
        $mobile_token = $request->get('token');
        $user = User::where('mobile_token', $mobile_token)->first();
        if (!$user){
            return $responseFactory->json([
                'error' => true,
                'error_msg' => 'cna\'t find user'
            ], 400);
        }
        $lastOrder = json_decode(json_encode(Delivery::getLastOrder($user->id)), true);
        return $responseFactory->json([
            'error' => false,
            'error_msg' => null,
            'orders' => $lastOrder[0]
        ], 200);
    }
}
