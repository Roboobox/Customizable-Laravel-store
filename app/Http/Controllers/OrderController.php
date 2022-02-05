<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display orders page.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        return view('account.orders');
    }
}
