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
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->bigInteger('role_id');
            $table->string('role_name')->nullable();
            $table->string('module_id')->nullable();
            $table->tinyInteger('role_status');
            $table->integer('role_type')->nullable();
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_roles');
    }
};
