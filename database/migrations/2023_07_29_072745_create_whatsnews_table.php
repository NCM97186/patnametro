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
        Schema::create('whatsnews', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->string('page_url');
            $table->bigInteger('is_new');
            $table->bigInteger('language');
            $table->bigInteger('menutype');
            $table->string('metakeyword');
            $table->string('metadescription');
            $table->string('description');
            $table->string('txtuplode')->nullable();;
            $table->string('txtweblink');
            $table->bigInteger('txtstatus');
            $table->bigInteger('admin_id');
            $table->date('startdate');
            $table->date('enddate');

            $table->timestamps();
            });
            }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whatsnews');
    }
};
