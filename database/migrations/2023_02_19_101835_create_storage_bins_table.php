<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_bins', function (Blueprint $table) {
            $table->id();
            $table->foreignid('warehouse_id');
            $table->string('identifier')->unique();
            $table->integer('capacity');
            $table->decimal('replenish', 8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_bins');
    }
};
