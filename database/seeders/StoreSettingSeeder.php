<?php

namespace Database\Seeders;

use App\Models\StoreSettings;
use App\Models\StoreSettingTypes;
use Illuminate\Database\Seeder;

class StoreSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoreSettings::create([
            'setting_type_id' => StoreSettingTypes::where('type', 'phone')->first()->id,
            'value' => '+371 47270202',
            'company_id' => 1
        ]);

        StoreSettings::create([
            'setting_type_id' => StoreSettingTypes::where('type', 'email')->first()->id,
            'value' => 'test@example.com',
            'company_id' => 1
        ]);

        StoreSettings::create([
            'setting_type_id' => StoreSettingTypes::where('type', 'address')->first()->id,
            'value' => 'Example street 9, Country',
            'company_id' => 1
        ]);

        StoreSettings::create([
            'setting_type_id' => StoreSettingTypes::where('type', 'soc_twitter')->first()->id,
            'value' => 'https://twitter.com/',
            'company_id' => 1
        ]);

        StoreSettings::create([
            'setting_type_id' => StoreSettingTypes::where('type', 'logo_file')->first()->id,
            'value' => 'logo.png',
            'company_id' => 1
        ]);
    }
}
