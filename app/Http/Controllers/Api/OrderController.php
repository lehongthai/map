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

     public function putOrder(Request $request, ResponseFactory $responseFactory)
    {
       
         $validator = \Validator::make($request->all(), 
            [
            'delivery_id' => 'required|exists:deliverys,id',
            'order_code' => 'required|exists:deliverys,order_code',
            'token' => 'required|exists:users,mobile_token',
            'status' => 'required|numeric',
            'image' =>  'exists:deliverys,image'
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
            $delivery_id = $request->delivery_id;
            $mobile_token = $request->token;
            $user = User::where('mobile_token', $mobile_token)->first()->id;
            $order_code = $request->order_code;
            $status = $request->status; 
            $image = $request->image;         
            $delivery = new Delivery();
            if ($delivery->onoff($delivery_id,$user,$order_code,$image,$status)) {
                $respone = $responseFactory->json([
                    'error' => false,
                    'error_msg' => null
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
