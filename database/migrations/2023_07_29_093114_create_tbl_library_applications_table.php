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
        Schema::create('tbl_library_applications', function (Blueprint $table) {
        $table->id();
        $table->string('membership_no');
        $table->string('bar_code');
        $table->datetime('valid_upto');
        $table->string('name');
        $table->string('permanent_id');
        $table->string('designation');
        $table->datetime('retirement_date');
        $table->string('office_address')->default('NA');
        $table->string('section');
        $table->string('room_no');
        $table->string('building');
        $table->string('area');
        $table->string('category');
        $table->string('patna_pin');
        $table->string('residence_addr');
        $table->string('residence_pin');
        $table->string('email')->default('NA');
        $table->string('telephone')->default('NA');
        $table->string('mobile');
        $table->string('govtemptype');
        $table->string('diary_no')->default('NA');
        $table->string('diary_date');
        $table->string('ppo_no')->default('NA');
        $table->string('ppo_date');
        $table->string('ppo_copy');
        $table->string('specialmemtype');
        $table->string('upload_idproof');
        $table->string('upload_instituteletter');
        $table->string('upload_anyfirst_idproof');
        $table->string('upload_anysecond_idproof');
        $table->string('image');
        $table->string('img_sign');
        $table->string('old_ticket')->default('NA');
        $table->string('request_ip');
        $table->string('request_date');
        $table->string('final_doc');
        $table->string('administrative_head');
        $table->string('imgFwd_id');
        $table->integer('status');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_library_applications');
    }
};
