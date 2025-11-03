<?php

namespace App\Http\Controllers;

use App\Services\ShopifyService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $shop = 'test-store-1100000000000000000000000000000001934.myshopify.com';
        $products = (new ShopifyService($shop))->getProducts();
        // dd(class_exists(\App\Services\ShopifyService::class));
        return response()->json($products);
    }
}
