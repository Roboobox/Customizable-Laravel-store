<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
           'company_id' => config('company.id'),
           'content' =>
               '<h2 class="title text-left mt-4">We Provide Continuous &amp; Kind Service for Customers</h2>
                <p class="mb-0">
                    Lorem ipsum dolor sit eiusamet, consectetur adipiscing elit,
                    sed do eius mod tempor incididunt ut labore
                    et dolore magna aliqua. Venenatis tell
                    us in metus vulputate eu scelerisque felis. Vel pretium vulp.
                </p>
                <h2 class="title text-left mt-4">Example heading</h2>
                <p class="mb-0">
                    Etiam blandit quam non urna viverra, imperdiet lobortis nisl fermentum. Suspendisse in enim sagittis, bibendum ante sed, lacinia ligula. Morbi consequat leo id velit luctus auctor. Curabitur nec ex eget tortor varius molestie non vel sem. Nullam vulputate venenatis ligula eu convallis. Phasellus sollicitudin erat vel libero viverra molestie. Nunc in magna justo. Ut blandit ipsum sed est facilisis, sit amet pretium mi vehicula. Integer vitae eros faucibus, tempor ipsum in, sodales tellus. Phasellus pharetra nunc lectus, lobortis commodo erat mollis sit amet. Etiam venenatis ut ligula sed suscipit. Aliquam id arcu vel leo lobortis commodo.
                </p>
                <h2 class="title text-left mt-4">Example heading</h2>
                <p class="mb-0">
                    Etiam blandit quam non urna viverra, imperdiet lobortis nisl fermentum. Suspendisse in enim sagittis, bibendum ante sed, lacinia ligula. Morbi consequat leo id velit luctus auctor. Curabitur nec ex eget tortor varius molestie non vel sem. Nullam vulputate venenatis ligula eu convallis. Phasellus sollicitudin erat vel libero viverra molestie. Nunc in magna justo. Ut blandit ipsum sed est facilisis, sit amet pretium mi vehicula. Integer vitae eros faucibus, tempor ipsum in, sodales tellus. Phasellus pharetra nunc lectus, lobortis commodo erat mollis sit amet. Etiam venenatis ut ligula sed suscipit. Aliquam id arcu vel leo lobortis commodo.
                </p>'
        ]);
    }
}
