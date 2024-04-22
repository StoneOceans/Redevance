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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('flpl_call_sign', 9)->nullable();
            $table->string('flpl_depr_airp', 4)->nullable();
            $table->string('flpl_arrv_airp', 4)->nullable();
            $table->string('airc_type', 25)->nullable();
            $table->integer('aobt')->nullable();
            $table->integer('eobt')->nullable();
            $table->integer('file_date')->nullable();
            $table->string('flight_state', 25)->nullable();
            $table->string('flight_type', 25)->nullable();
            $table->string('ifps_registration_mark', 25)->nullable();
            $table->string('initial_flight_rule', 25)->nullable();
            $table->string('nm_ifps_id', 25)->nullable();
            $table->string('nm_tactical_id', 25)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
