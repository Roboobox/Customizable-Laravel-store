<?php

namespace Database\Seeders;

use App\Models\StoreSettingTypes;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create(['email' => 'test@email.com']);

        // Store setting types
        StoreSettingTypes::create(['type' => 'phone']);
        StoreSettingTypes::create(['type' => 'email']);
        StoreSettingTypes::create(['type' => 'address']);
        StoreSettingTypes::create(['type' => 'logo_path']);
        StoreSettingTypes::create(['type' => 'main_banner_image']);
        StoreSettingTypes::create(['type' => 'main_banner_html']);
        StoreSettingTypes::create(['type' => 'soc_facebook']);
        StoreSettingTypes::create(['type' => 'soc_instagram']);
        StoreSettingTypes::create(['type' => 'soc_twitter']);
        StoreSettingTypes::create(['type' => 'soc_pinterest']);
        StoreSettingTypes::create(['type' => 'soc_youtube']);


        $this->call([
            ProductSeeder::class,
            StoreSettingSeeder::class,
            BannerSeeder::class,
            BenefitBannerSeeder::class,
        ]);
    }
}
