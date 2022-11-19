<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->whereCategory($request->input('category'));
            })
            ->when($request->filled('price'), function ($query) use ($request) {
                $query->where('price', '>=', $request->input('price'));
            })
            ->get();

        JsonResource::wrap('products');

        return ProductResource::collection($products);
    }
}
