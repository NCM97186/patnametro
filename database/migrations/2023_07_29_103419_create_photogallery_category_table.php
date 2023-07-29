<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('photogallery_category', function (Blueprint $table) {
            $table->int('id')->unsigned();
            $table->string('name');
            $table->tinyint('language');
            $table->tinyint('status')->default(1)->comment('0 = Inactive and 1 = active');
            $table->date('modified');
            $table->date('created');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photogallery_category');
    }
};
