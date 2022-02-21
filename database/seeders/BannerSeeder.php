<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'photo_file' => 'banner_image.png',
            'background_file' => 'banner_background.jpg',
            'content' =>
                '<div style="width: 380px">
                    <h5>Buy over</h5>
                    <h5 class="underline">1000 EUR</h5>
                    <p>and recieve <b>20% discount</b></p>
                </div>',
            'company_id' => 1,
        ]);
    }
}
