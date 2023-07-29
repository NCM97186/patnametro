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
        Schema::create('tbl_exhibitions', function (Blueprint $table) {
            $table->id();
            $table->string('event_name')->nullable();
            $table->string('page_url');
            $table->string('language');
            $table->string('txtuplode')->nullable();
            $table->int('event_type');
            $table->tinyint('menutype');
            $table->string('pdf_upload')->nullable();
            $table->int('txtstatus');
            $table->text('sortdesc');
            $table->longText('description');
            $table->int('admin_id');
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
        Schema::dropIfExists('tbl_exhibitions');
    }
};
