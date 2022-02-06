<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('mobile', 31)->nullable();
            $table->string('product_layout')->nullable();
            $table->string('product_sort')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            // Password can be null on social login accounts only
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreignId('account_type_id')->default(1)->constrained('account_types');
            $table->unique(['email', 'account_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
