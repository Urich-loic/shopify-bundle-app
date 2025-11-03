<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ShopifyService
{
    protected $shop;
    protected $token;

    public function __construct($shop)
    {
        $this->shop = $shop;
        $this->token = DB::table('shops')->where('shop_domain', $shop)->value('access_token');
    }

    public function getProducts()
    {
        $url = "https://{$this->shop}/admin/api/2025-01/products.json";
        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => $this->token
        ])->get($url);
        

        return $response->json();
    }

    public function createBundle($title, $productIds)
    {
        $bundleProduct = [
            "product" => [
                "title" => $title,
                "body_html" => "Bundle de test",
                "variants" => [["price" => "49.99"]],
                "tags" => "bundle",
                "metafields" => [
                    ["key" => "bundle_products", "value" => implode(',', $productIds), "type" => "single_line_text_field"]
                ]
            ]
        ];

        $url = "https://{$this->shop}/admin/api/2025-01/products.json";

        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => $this->token
        ])->post($url, $bundleProduct);

        return $response->json();
    }
}
