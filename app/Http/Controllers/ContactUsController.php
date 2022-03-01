<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\FrequentQuestion;
use App\Models\StoreSettings;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    public function index(): View
    {
        $questions = FrequentQuestion::where('company_id', config('company.id'))->get();
        $storeSettings = StoreSettings::where('company_id', config('company.id'))
            ->whereIn('setting_type_id', function ($query) {
                $query->select('id')->from('store_setting_types')->whereIn('type', [
                    'phone',
                    'email',
                    'address',
                ]);
            })
            ->select(['type','value'])
            ->leftJoin('store_setting_types', 'store_setting_types.id', '=', 'setting_type_id')
            ->get()
            ->keyBy('type');

        return view('contact-us', ['questions' => $questions, 'settings' => $storeSettings]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'max:3000'],
        ]);

        ContactMessage::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'company_id' => config('company.id'),
        ]);

        return redirect()->route('contact')->with('contact-success', 'Message sent!');
    }
}
