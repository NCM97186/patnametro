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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->string('page_url');
            $table->integer('is_new');
            $table->integer('language');
            $table->integer('menutype');
            $table->string('metakeyword');
            $table->string('metadescription');
            $table->longtext('description');
            $table->string('txtuplode')->nullable();
            $table->string('txtweblink');
            $table->integer('txtstatus');
            $table->integer('admin_id');
            $table->date('startdate');
            $table->date('enddate');
            $table->date('create_date')->nullable();
            $table->date('update_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
