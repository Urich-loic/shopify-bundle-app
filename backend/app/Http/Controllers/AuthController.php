<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Installation de l'app Shopify
     */
    public function install(Request $request)
    {
        $shop = $request->query('shop');

        if (!$shop) {
            return response()->json(['error' => 'Missing shop parameter'], 400);
        }

        $apiKey = env('SHOPIFY_API_KEY');
        $scopes = env('SHOPIFY_SCOPES', 'read_products,write_products');
        $redirectUri = env('SHOPIFY_REDIRECT_URI');

        // URL d'installation OAuth
        $installUrl = "https://{$shop}/admin/oauth/authorize?" . http_build_query([
            'client_id' => $apiKey,
            'scope' => $scopes,
            'redirect_uri' => $redirectUri,
        ]);

        return redirect()->away($installUrl);
    }

    /**
     * Callback après l'installation pour récupérer le token offline
     */
    public function callback(Request $request)
    {
        $shop = $request->query('shop');
        $code = $request->query('code');

        if (!$shop || !$code) {
            return response()->json(['error' => 'Invalid callback parameters'], 400);
        }

        // Échange le code contre un token permanent (offline access token)
        $response = Http::asForm()->post("https://{$shop}/admin/oauth/access_token", [
            'client_id' => env('SHOPIFY_API_KEY'),
            'client_secret' => env('SHOPIFY_API_SECRET'),
            'code' => $code,
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to get access token'], 500);
        }

        $data = $response->json();

        $accessToken = $data['access_token'];

        // Sauvegarde dans la base
        Shop::updateOrCreate(
            ['shop_domain' => $shop],
            ['access_token' => $accessToken]
        );

        // Optionnel : mettre en session pour test
        Session::put('shop', $shop);
        Session::put('access_token', $accessToken);

        return response()->json([
            'message' => 'App installed successfully',
            'shop' => $shop,
            'access_token' => $accessToken
        ]);
    }
}
