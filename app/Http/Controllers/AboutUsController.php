<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    public function index(): View
    {
        $aboutUsContent = AboutUs::where('company_id', config('company.id'))->first();
        return view('about-us', ['content' => $aboutUsContent]);
    }
}
