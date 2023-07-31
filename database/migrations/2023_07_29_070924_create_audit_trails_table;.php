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
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('audit_id');
            $table->string('user_login_id');
            $table->bigInteger('page_id');
            $table->boolean('page_name');
            $table->string('page_action')->default('null');
            $table->string('page_category')->default('null');
            $table->dateTime('page_action_date')->default('null');
            $table->string('ip_address')->default('null');
            $table->bigInteger('lang')->default('null');
            $table->string('page_title')->default('null');
            $table->string('approve_status')->default('null');
            $table->string('usertype')->default('null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
