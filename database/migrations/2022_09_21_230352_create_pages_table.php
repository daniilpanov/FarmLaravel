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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->mediumText('description')->nullable();
            $table->mediumText('keywords')->nullable();
            $table->string('alias')->unique();
            $table->boolean('clickable')->default(true);
            $table->boolean('visible')->default(true);
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('header_image_id')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
