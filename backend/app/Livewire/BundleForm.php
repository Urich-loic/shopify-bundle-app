<?php

namespace App\Livewire;

use Livewire\Component;

class BundleForm extends Component
{
    public string $title = '';
    public array $selectedProducts = [];

    public function save()
    {
        // Sauvegarder en base ou envoyer à Shopify
        session()->flash('message', "Bundle '{$this->title}' créé !");
    }
    public function render()
    {
        return view('livewire.bundle-form');
    }
}
