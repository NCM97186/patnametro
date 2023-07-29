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
        Schema::create('tenders', function (Blueprint $table) {
        $table->id();
        $table->string('title')->default(0);
        $table->string('url')->default(0);
        $table->string('page_url');
        $table->int('is_new');
        $table->int('language');
        $table->int('menutype');
        $table->string('metakeyword');
        $table->string('metadescription');
        $table->longText('description');
        $table->string(' txtuplode');
        $table->string('txtweblink');
        $table->int('txtstatus');
        $table->admin_id('txtstatus');
        $table->date('start_date');
        $table->date('end_date');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
