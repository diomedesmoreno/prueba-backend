<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currencies;
use App\Http\Requests\CurriencieStoreRequest;
use App\Http\Resources\CurriencieResource;
use Illuminate\Support\Facades\Validator;

class CurrenciesController extends Controller
{

    public function index()
    {
        $currency = Currencies::get();

        return CurriencieResource::collection($currency);
    }

    public function show($id)
    {
        $currency = Currencies::find($id);

        if (!empty($currency)) {
            return response()->json($currency, 200);
        } else {
            return response()->json(['message' => 'Currency no entonctrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:50',
            'symbol' => 'required|string|max:5',
            'exchange_rate' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $currency = Currencies::create($data);
        return new CurriencieResource($currency);
    }

    public function update(Request $request)
    {

        $currency = Currencies::findOrFail($request->input('id'));

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:50',
            'symbol' => 'required|string|max:5',
            'exchange_rate' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $currency->update($request->all());
        return new CurriencieResource($currency);
    }

    public function destroy($id)
    {
        
        $currency = Currencies::find($id);
        
        if (!empty($currency)) {
            $currency->delete();
            return response()->json(['message' => 'Currency deleted successfully']);
        } else {
            return response()->json(['message' => 'Currency no entonctrado'],404 );
        }       
    }
}
