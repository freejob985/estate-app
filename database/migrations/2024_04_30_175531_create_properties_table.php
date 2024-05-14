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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('unit_code');
            $table->string('unit_type');
            $table->string('phase');
            $table->string('floor');
            $table->decimal('area', 8, 2);
            $table->decimal('received', 8, 2)->nullable();
            $table->decimal('paid', 8, 2)->nullable();
            $table->decimal('over_payment', 8, 2)->nullable();
            $table->decimal('down_payment', 8, 2)->nullable();
            $table->decimal('installments', 8, 2)->nullable();
            $table->decimal('remaining', 8, 2)->nullable();
            $table->decimal('maintenance', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->text('notes')->nullable();
            $table->string('client_number');
            $table->string('region');
            $table->timestamp('last_updated')->nullable();
            $table->string('compound_name');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
