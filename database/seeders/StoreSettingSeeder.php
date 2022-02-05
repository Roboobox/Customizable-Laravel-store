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
            'value' => '+371 47270202'
        ]);

        StoreSettings::create([
            'setting_type_id' => StoreSettingTypes::where('type', 'email')->first()->id,
            'value' => 'test@example.com'
        ]);

        StoreSettings::create([
            'setting_type_id' => StoreSettingTypes::where('type', 'soc_twitter')->first()->id,
            'value' => 'https://twitter.com/'
        ]);
    }
}
