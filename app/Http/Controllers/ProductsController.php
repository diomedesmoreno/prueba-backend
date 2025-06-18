<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        $currency = Products::get();

        return ProductResource::collection($currency);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:5',
            'price' => 'required|numeric|min:0',
            'tax_cost' => 'required|numeric|min:0',
            'manufacturing_cost' => 'required|numeric|min:0',
            'currency_id' => 'required|exists:currencies,id',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $product = Products::create($data);
        return new ProductResource($product);
    }

    public function show($id)
    {
        $product = Products::find($id);

        if (!empty($product)) {
            return response()->json($product, 200);
        } else {
            return response()->json(['message' => 'Product no entonctrado'], 404);
        }
    }

    public function update(Request $request)
    {
        $product = Products::findOrFail($request->input('id'));

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:5',
            'price' => 'required|numeric|min:0',
            'tax_cost' => 'required|numeric|min:0',
            'manufacturing_cost' => 'required|numeric|min:0',
            'currency_id' => 'required|exists:currencies,id',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $product->update($request->all());

        return new ProductResource($product);
    }

    public function destroy($id)
    {
        $product = Products::find($id);

        if (!empty($product)) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        } else {
            return response()->json(['message' => 'Product no entonctrado'],404 );
        }   
    }
}
