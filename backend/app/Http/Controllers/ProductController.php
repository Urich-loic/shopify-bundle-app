<?php

namespace App\Http\Controllers;

use App\Services\ShopifyService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $shop = 'https://admin.shopify.com/';
        $products = (new ShopifyService($shop))->getProducts();
        return response()->json($products);
    }
}
