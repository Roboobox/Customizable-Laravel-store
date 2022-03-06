<?php

namespace Database\Seeders;

use App\Models\AccountType;
use App\Models\Company;
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
        // Store setting types
        StoreSettingTypes::create(['type' => 'phone']);
        StoreSettingTypes::create(['type' => 'email']);
        StoreSettingTypes::create(['type' => 'address']);
        StoreSettingTypes::create(['type' => 'logo_file']);
        StoreSettingTypes::create(['type' => 'main_banner_image']);
        StoreSettingTypes::create(['type' => 'main_banner_html']);
        StoreSettingTypes::create(['type' => 'soc_facebook']);
        StoreSettingTypes::create(['type' => 'soc_instagram']);
        StoreSettingTypes::create(['type' => 'soc_twitter']);
        StoreSettingTypes::create(['type' => 'soc_pinterest']);
        StoreSettingTypes::create(['type' => 'soc_youtube']);

        AccountType::create(['id' => 1, 'type' => 'default']);
        AccountType::create(['id' => 2, 'type' => 'google']);
        AccountType::create(['id' => 3, 'type' => 'facebook']);

        Company::create(['name' => 'Hilma Biocare', 'url' => '']);
        Company::create(['name' => 'Test Company', 'url' => '']);

        $user = User::factory()->create(['email' => 'test@email.com', 'company_id' => 1]);

        $this->call([
            ProductSeeder::class,
            StoreSettingSeeder::class,
            BannerSeeder::class,
            BenefitBannerSeeder::class,
            AboutUsSeeder::class,
            FAQSeeder::class,
        ]);
    }
}
