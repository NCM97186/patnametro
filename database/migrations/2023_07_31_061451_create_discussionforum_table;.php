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
        Schema::create('discussionforum', function (Blueprint $table) {
            $table->integer('userid');
            $table->string('title')->nullable();
            $table->text('description');
            $table->integer('postdate');
            $table->tinyint('poststatus')->default(1)->comment('1=draft and 2=Aproval AND 3=Publish');
            $table->integer('language');
            $table->integer('parent');
            $table->string('userdiscussion');
            
            $table->string('userdiscussionreply')->nullable();
            $table->time('dateadded');
            $table->time('datereply');
            $table->time('deleted');
            $table->time('deletedon');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discussionforum');
    }
};
