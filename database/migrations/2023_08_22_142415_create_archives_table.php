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
        Schema::create('archives', function (Blueprint $table) {
            $table->id();

            $table->string('call_number')->unique();
            $table->string('analyze');
            $table->integer('duree');
            $table->string('project')->nullable();
            $table->string('piece')->nullable();
            $table->string('tenderer')->nullable();
            $table->string('extreme_date')->nullable();
            $table->string('observation')->nullable();
            $table->string('final_sort')->nullable();
            $table->timestamps();

            $table->foreignId('service_id')->constrained();
            $table->foreignId('department_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archives');
    }
};
