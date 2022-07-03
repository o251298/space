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
        Schema::create('near_earths', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->float('speed')->default(0);
            $table->boolean('is_hazardous')->default(false);
            $table->timestamp('data')->default(date('Y-m-d H:i:s'));
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
        Schema::dropIfExists('near_earths');
    }
};
