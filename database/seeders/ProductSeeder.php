<?php

namespace Database\Seeders;

use App\Models\Clients;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductPhoto;
use App\Models\ProductSpecification;
use App\Models\Specification;
use App\Models\SpecificationLabel;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpecificationLabel::create(['label' => 'Form']);
        SpecificationLabel::create(['label' => 'Capacity']);
        SpecificationLabel::create(['label' => 'Dosage']);

        $csvFile = fopen("C:/wamp64/csv/product_list.csv", "rb");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                $category = ProductCategory::where('name', $data[0])->first();
                if (!$category) {
                    $category = ProductCategory::create(['name' => $data[0], 'icon' => 'w-icon-heartbeat']);
                }
                $product = Product::factory([
                    "name" => $data['4'],
                    "description" => null,
                    'category_id' => $category->id,
                    "discount_percent" => 0
                ])->create();
                $image = ProductPhoto::factory([
                    "product_id" => $product->id,
                    "photo_path" => $data['5']
                ])->create();
                // Form label
                $this->insertSpec(1, $data, $product);
                // Capacity label
                $this->insertSpec(2, $data, $product);
                // Dosage label
                $this->insertSpec(3, $data, $product);

            }
            $firstline = false;
        }

        fclose($csvFile);
    }

    public function insertSpec(int $labelId, $data, $product) {
        $spec = Specification::where('specification_label_id', $labelId)->where('value', $data[ (string)$labelId ])->first();
        if (!$spec) {
            $spec = Specification::create(['specification_label_id' => $labelId, 'value'=>$data[(string)$labelId]]);
        }
        ProductSpecification::create(['product_id' => $product->id, 'specification_id' => $spec->id]);
    }
}
