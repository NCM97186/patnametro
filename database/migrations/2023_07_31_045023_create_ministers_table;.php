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
        Schema::create('ministers', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->string('page_url');
            $table->integer('language');
            $table->string('designation');
            $table->string('metakeyword');
            $table->string('metadescription');
            $table->longtext('description');
            $table->string('txtuplode')->nullable();
            $table->string('txtweblink');
            $table->integer('txtstatus');
            $table->integer('admin_id');
            $table->time('create_date')->nullable();
            $table->time('update_date');
            $table->timestamps();

             });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ministers');
    }
};
