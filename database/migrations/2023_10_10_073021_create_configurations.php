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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->Integer('language');
            $table->string('sender_mail');
            $table->string('cof_type')->nullable();
            $table->string('password');
            $table->Integer('port');
            $table->longtext('contact_msg')->nullable();
            $table->longtext('reset_pass_msg')->nullable();
            $table->longtext('reg_msg')->nullable();
            $table->longtext('feedback_msg')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
