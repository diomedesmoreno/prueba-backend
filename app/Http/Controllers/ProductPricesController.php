<?php

namespace App\Http\Controllers;

use App\Models\ProductPrices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProductPriceResource;

class ProductPricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductPrices::get();

        return ProductPriceResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'price' => 'required|numeric|min:0',
            'currency_id' => 'required|exists:currencies,id',
            'product_id' => 'required|exists:products,id',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $product = ProductPrices::create($data);
        return new ProductPriceResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductPrices  $productPrices
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $products = ProductPrices::details($id)->get();

        if (!empty($products)){
            return ProductPriceResource::collection($products);
            // return response()->json($products, 200);
        } else {
            return response()->json(['message' => 'Products no entonctrado'], 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductPrices  $productPrices
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductPrices $productPrices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductPrices  $productPrices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPrices $productPrices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductPrices  $productPrices
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductPrices $productPrices)
    {
        //
    }
}
