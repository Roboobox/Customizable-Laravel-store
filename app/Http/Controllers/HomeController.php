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
            $recentlyViewed = ViewHistory::latest()->take(10)->with(['product:name,id,slug', 'product.photos:photo_path,product_id'])->get();
        }
        // TODO : Add recently viewed items from session

        return view('home', [
            'clients' => $clients,
            'recentlyViewed' => $recentlyViewed,
        ]);
    }
}
