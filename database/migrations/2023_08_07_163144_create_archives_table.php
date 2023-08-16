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

            $table->string('number_order');
            $table->string('call_number');
            $table->string('project')->nullable();
            $table->string('analyze');
            $table->string('piece')->nullable();
            $table->string('tenderer')->nullable();
            $table->string('extreme_date');
            $table->string('observation')->nullable();
            $table->timestamps();

            $table->foreignId('service_id')->nullable()->constrained();
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
