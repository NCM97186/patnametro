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
        Schema::create('menu', function (Blueprint $table) {
        $table->bigInteger('m_id');
        $table->integer('m_type');
        $table->integer('m_flag_id')->nullable();
        $table->integer('menu_positions');
        $table->integer('language_id');
        $table->string('m_name')->nullable();
        $table->string('m_url')->nullable();
        $table->string('m_title')->nullable();
        $table->text('m_keyword');
        $table->text('m_description')->nullable();
        $table->longtext('content');
        $table->string('doc_uplode')->nullable();
        $table->string('linkstatus')->nullable();
        $table->time('start_date');
        $table->time('end_date');
        $table->time('create_date');
        $table->time('update_date');
        $table->tinyint('approve_status')->default(0);
        $table->integer('admin_id');
        $table->integer('page_postion')->nullable();
        $table->integer('current_version');
        $table->text('welcomedescription');
        $table->timestamps();

             });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
