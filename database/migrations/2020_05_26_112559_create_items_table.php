<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->string('slug');
            $table->boolean('published')->default(0);
            $table->boolean('stock')->default(0);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('variant_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('price_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
