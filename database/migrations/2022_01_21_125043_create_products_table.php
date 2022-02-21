<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // TODO : Make slugs unique for every company (slug+company_id?)
            $table->string('slug')->unique();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->boolean('is_deleted');
            $table->unsignedInteger('inventory');
            $table->unsignedDecimal('price', 9, 2);
            $table->unsignedTinyInteger('discount_percent');
            $table->timestamps();

            $table->foreignId('category_id')->constrained('product_categories');
            $table->foreignId('company_id')->constrained('companies');

            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
