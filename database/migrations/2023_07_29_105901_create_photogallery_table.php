<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //pushpendra
    public function up(): void
    {
        Schema::create('photogallery', function (Blueprint $table) {
            $table->id();
             $table->string('title')->nullable();
              $table->integer('language');
               $table->string('txtuplode')->nullable();
                $table->integer('txtstatus');
                 $table->integer('admin_id');
                  $table->date('create_date')->nullable();
                  $table->date('update_date');
                   $table->integer('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photogallery');
    }
};
