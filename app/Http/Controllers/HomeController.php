<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\ViewHistory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create()
    {
        $clients = Clients::all();

        return view('home', [
            'clients' => $clients
        ]);
    }
}
