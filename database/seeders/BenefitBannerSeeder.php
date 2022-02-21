<?php

namespace Database\Seeders;

use App\Models\BenefitBanner;
use Illuminate\Database\Seeder;

class BenefitBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BenefitBanner::create([
            'title' => 'Free Shipping & Returns',
            'subtitle' => 'For all orders over $99',
            'icon' => 'w-icon-truck',
            'company_id' => 1
        ]);

        BenefitBanner::create([
            'title' => 'Secure Payment',
            'subtitle' => 'We ensure secure payment',
            'icon' => 'w-icon-bag',
            'company_id' => 1
        ]);

        BenefitBanner::create([
            'title' => 'Money Back Guarantee',
            'subtitle' => 'Any back within 30 days',
            'icon' => 'w-icon-money',
            'company_id' => 1
        ]);

        BenefitBanner::create([
            'title' => 'Customer Support',
            'subtitle' => 'Call or email us 24/7',
            'icon' => 'w-icon-chat',
            'company_id' => 1
        ]);
    }
}
