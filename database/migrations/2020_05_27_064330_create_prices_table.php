<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->string('regular');
            $table->string('sales')->nullable();
            $table->string('discount')->nullable();
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('condition_id')->nullable();
            $table->unsignedInteger('memory_id')->nullable();
            $table->unsignedInteger('network_id')->nullable();
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
        Schema::dropIfExists('prices');
    }
}
