<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validator = \Validator::make($request->all(), [
            'email' => ['required', 'email']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()->first(),
            ]);
        }

        $subscription = Newsletter::firstOrCreate([
            'email' => $request->input('email'),
            'company_id' => config('company.id'),
        ]);

        if ($subscription->wasRecentlyCreated)
        {
            return response()->json([
                'status' => 'success',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'error' => 'You have already subscribed to newsletter',
        ]);
    }
}
