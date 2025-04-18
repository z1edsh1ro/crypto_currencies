<?php

namespace App\Http\Controllers;

use App\Models\Trade;
use App\Http\Resources\TradeResouce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Trade::latest()->get();

        return response()->json([
            'fetch success',
            TradeResouce::collection($data),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'buy_order_id' => 'required|integer',
            'sell_order_id' => 'required|integer',
            'message' => 'required|string',
            'amount' => 'required|numeric|regex:/^\d{1,8}(\.\d{1,2})?$/',
        ]);

        // when fail
        if ($validator->fails()) {
            return response()->json([
                'create fail',
                $validator->errors(),
            ]);
        }

        $createData = Trade::create([
            'buy_order_id' => $request->buy_order_id,
            'sell_order_id' => $request->sell_order_id,
            'message' => $request->message,
            'amount' => $request->amount,
        ]);

        return response()->json([
            'created success',
            new TradeResouce($createData),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Trade $trade)
    {
        return response()->json([
            'fetch by id success',
            $trade,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trade $trade)
    {
        $validator = Validator::make($request->all(), [
            'buy_order_id' => 'required|integer',
            'sell_order_id' => 'required|integer',
            'message' => 'required|string',
            'amount' => 'required|numeric|regex:/^\d{1,8}(\.\d{1,2})?$/',
        ]);

        // when fail
        if ($validator->fails()) {
            return response()->json([
                'update fail',
                $validator->errors(),
            ]);
        }

        $trade->buy_order_id = $request->buy_order_id;
        $trade->sell_order_id = $request->sell_order_id;
        $trade->message = $request->message;
        $trade->amount = $request->amount;

        $trade->save();

        return response()->json([
            'updated success',
            new TradeResouce($trade),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trade $trade)
    {
        $trade->delete();

        return response()->json(
            'deleted success',
        );
    }
}
