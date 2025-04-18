<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResouce;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::latest()->get();

        return response()->json([
            'fetch success',
            OrderResouce::collection($data),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'currency_id' => 'integer',
            'amount' => 'required|numeric|regex:/^\d{1,8}(\.\d{1,2})?$/',
            'method' => 'required|numeric|in:0,1',
        ]);

        // when fail
        if ($validator->fails()) {
            return response()->json([
                'create fail',
                $validator->errors(),
            ]);
        }

        $createData = Order::create([
            'user_id' => $request->user_id,
            'currency_id' => $request->currency_id,
            'amount' => $request->amount,
            'method' => $request->method,
        ]);

        return response()->json([
            'created success',
            new OrderResouce($createData),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return response()->json([
            'fetch by id success',
            $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'currency_id' => 'integer',
            'amount' => 'required|numeric|regex:/^\d{1,8}(\.\d{1,2})?$/',
            'method' => 'required|numeric|in:0,1',
        ]);

        // when fail
        if ($validator->fails()) {
            return response()->json([
                'update fail',
                $validator->errors(),
            ]);
        }

        $order->user_id = $request->user_id;
        $order->currency_id = $request->currency_id;
        $order->amount = $request->amount;
        $order->method = $request->method;


        $order->save();

        return response()->json([
            'updated success',
            new OrderResouce($order),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(
            'deleted success',
        );
    }
}
