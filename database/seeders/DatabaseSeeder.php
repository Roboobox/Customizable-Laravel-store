<?php

namespace Database\Seeders;

use App\Models\Clients;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDiscount;
use App\Models\ProductPhoto;
use App\Models\ProductSpecification;
use App\Models\User;
use App\Models\ViewHistory;
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
        // Make clients
        Clients::factory(15)->create();

        $this->call([
            ProductSeeder::class,
        ]);
    }
}
