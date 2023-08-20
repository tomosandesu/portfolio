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
        Schema::table('posts', function(Blueprint $table){
            $table->integer('phone_time')->change();
            $table->integer('exercise_time')->change();
            $table->integer('job_time')->change();
            $table->integer('bathing_time')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function(Blueprint $table){
        $table->text('phone_time')->change();
        $table->text('exercise_time')->change();
        $table->text('job_time')->change();
        $table->text('bathing_time')->change();
        });
    }
};
