<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ShopifyService
{
    protected $shop;
    protected $token;

    public function __construct($shop)
    {
        $this->shop = $shop;
        $this->token = env('SHOPIFY_ACCESS_TOKEN');
    }

    public function getProducts()
    {
        $url = "https://{$this->shop}/admin/api/2025-01/products.json";
        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => $this->token
        ])->get($url);
        return $response->json();
    }
}
