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
        Schema::create('new_editions', function (Blueprint $table) {
            $table->id();
             $table->string('book_name')->nullable();
              $table->integer('language');
               $table->string('txtuplode')->nullable();
                $table->integer('txtstatus');
                 $table->string('isbn_no');
                  $table->integer('admin_id');
                   $table->date('create_date');
                     $table->date('update_date');
                     $table->string('edited_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_editions');
    }
};
