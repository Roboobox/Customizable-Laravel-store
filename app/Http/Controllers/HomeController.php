<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BenefitBanner;
use App\Models\ViewHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create()
    {
        $banner = Banner::latest()->take(1)->first();
        $benefitBanners = BenefitBanner::all();

        $recentlyViewed = [];
        if (Auth::check()) {
            $recentlyViewed = ViewHistory::latest()->take(10)->with(['product:name,id,slug', 'product.thumbnail'])->get(['product_id'])->unique('product_id');
        }
        // TODO : Add recently viewed items from session

        return view('home', [
            'recentlyViewed' => $recentlyViewed,
            'banner' => $banner,
            'benefitBanners' => $benefitBanners,
        ]);
    }
}
