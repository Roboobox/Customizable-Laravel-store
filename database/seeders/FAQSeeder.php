<?php

namespace Database\Seeders;

use App\Models\FrequentQuestion;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrequentQuestion::create([
            'company_id' => 1,
            'question' => 'How do I cancel my order?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler isque felis. Vel pretium.'
        ]);

        FrequentQuestion::create([
            'company_id' => 1,
            'question' => 'Why is my registration delayed?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler isque felis. Vel pretium.'
        ]);

        FrequentQuestion::create([
            'company_id' => 1,
            'question' => 'What do I need to buy products?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler isque felis. Vel pretium.'
        ]);

        FrequentQuestion::create([
            'company_id' => 1,
            'question' => 'How can I get money back?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler isque felis. Vel pretium.'
        ]);
    }
}
