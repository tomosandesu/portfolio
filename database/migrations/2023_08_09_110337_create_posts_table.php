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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->time('bed_time_start');
            $table->time('bed_time_end');
            $table->double('body_temperature', 3, 1);
            $table->text('phone_time');
            $table->text('exercise_time');
            $table->text('job_time');
            $table->text('bathing_time');
            $table->text('performance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
