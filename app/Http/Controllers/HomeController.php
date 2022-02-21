<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BenefitBanner;
use App\Models\Product;
use App\Models\ViewHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function create()
    {
        $banner = Banner::latest()->where('company_id', config('company.id'))->first();
        $benefitBanners = BenefitBanner::where('company_id', config('company.id'))->get();

        $recentlyViewed = [];
        if (Auth::check()) {
            $recentlyViewed = Product::whereIn('id', function ($query) {
                return $query->fromSub(function($subQuery) {
                    $subQuery->select('product_id')->distinct()
                        ->from('view_histories')
                        ->where('user_id', Auth::user()->id)
                        ->where('company_id', config('company.id'))
                        ->limit(10);
                }, 'sq');
            })->with('thumbnail', 'category')->get();
        } else if (session()->has('viewHistory')) {
            $recentlyViewed = Product::whereIn('id', session('viewHistory'))
                ->with('thumbnail', 'category')
                ->limit(10)
                ->get();
        }
        // TODO : Add recently viewed items from session

        return view('home', [
            'recentlyViewed' => $recentlyViewed,
            'banner' => $banner,
            'benefitBanners' => $benefitBanners,
        ]);
    }
}
