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
        Schema::create('all_service_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_detail_id')->constrained('service_details')->onDelete('cascade');
            $table->enum('type', ['included', 'excluded']);
            $table->string('icon');
            $table->string('text');
            $table->text('description')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_service_details');
    }
};
