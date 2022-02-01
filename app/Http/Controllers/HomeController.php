<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\ViewHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create()
    {
        $clients = Clients::all();

        $recentlyViewed = [];
        if (Auth::check()) {
            $recentlyViewed = ViewHistory::latest()->take(10)->with(['product:name,id,slug', 'product.thumbnail'])->get(['product_id'])->unique('product_id');
        }
        // TODO : Add recently viewed items from session

        return view('home', [
            'clients' => $clients,
            'recentlyViewed' => $recentlyViewed,
        ]);
    }
}
