<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ProductList extends Component
{
    public array $products = [];

    public function mount()
    {
        $shopifyServices = new \App\Services\ShopifyService('test-store-1100000000000000000000000000000001934.myshopify.com');
        $response = $shopifyServices->getProducts();

        $this->products = cache()->remember('products',300, function() use ($response) {
            return $response;
        });

        // $this->products = $response;
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
