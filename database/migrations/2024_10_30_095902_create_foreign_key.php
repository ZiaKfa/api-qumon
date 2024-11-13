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
        Schema::table('answer', function (Blueprint $table) {
            $table->foreign('quiz_id')->references('id')->on('quiz')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quiz', function (Blueprint $table) {
            $table->dropForeign(['answer_id']);
        });

        Schema::table('answer', function (Blueprint $table) {
            $table->dropForeign(['quiz_id']);
        });
    }
};
