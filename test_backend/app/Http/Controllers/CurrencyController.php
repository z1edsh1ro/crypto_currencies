<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Resources\CurrencyResouce;
use Illuminate\Support\Facades\Validator;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Currency::latest()->get();

        return response()->json([
            'fetch success',
            CurrencyResouce::collection($data),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|regex:/^\d{1,8}(\.\d{1,2})?$/',
        ]);

        // when fail
        if ($validator->fails()) {
            return response()->json([
                'create fail',
                $validator->errors(),
            ]);
        }

        $createData = Currency::create([
            'name' => $request->name,
            'rate' => $request->rate,
        ]);

        return response()->json([
            'created success',
            new CurrencyResouce($createData),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        return response()->json([
            'fetch by id success',
            $currency,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'rate' => 'required|numeric|regex:/^\d{1,8}(\.\d{1,2})?$/',
        ]);

        // when fail
        if ($validator->fails()) {
            return response()->json([
                'update fail',
                $validator->errors(),
            ]);
        }

        $currency->name = $request->name;
        $currency->rate = $request->rate;

        $currency->save();

        return response()->json([
            'updated success',
            new CurrencyResouce($currency),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        return response()->json(
            'deleted success',
        );
    }
}
