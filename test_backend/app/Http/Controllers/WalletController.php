<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Http\Resources\WalletResouce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Wallet::latest()->get();

        return response()->json([
            'fetch success',
            WalletResouce::collection($data),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'currency_id' => 'required|integer',
            'amount' => 'required|numeric|regex:/^\d{1,8}(\.\d{1,2})?$/',
        ]);

        // when fail
        if ($validator->fails()) {
            return response()->json([
                'create fail',
                $validator->errors(),
            ]);
        }

        $createData = Wallet::create([
            'user_id' => $request->user_id,
            'currency_id' => $request->currency_id,
            'amount' => $request->amount,
        ]);

        return response()->json([
            'created success',
            new WalletResouce($createData),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Wallet $wallet)
    {
        return response()->json([
            'fetch by id success',
            $wallet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wallet $wallet)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'currency_id' => 'required|integer',
            'amount' => 'required|numeric|regex:/^\d{1,8}(\.\d{1,2})?$/',
        ]);

        // when fail
        if ($validator->fails()) {
            return response()->json([
                'update fail',
                $validator->errors(),
            ]);
        }

        $wallet->user_id = $request->user_id;
        $wallet->currency_id = $request->currency_id;
        $wallet->amount = $request->amount;

        $wallet->save();

        return response()->json([
            'updated success',
            new WalletResouce($wallet),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wallet $wallet)
    {
        $wallet->delete();

        return response()->json(
            'deleted success',
        );
    }
}
