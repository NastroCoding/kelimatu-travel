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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->text('embed')->nullable();
            $table->text('address')->nullable();
            $table->text('map')->nullable();
            $table->text('operational')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('img_jumbotron')->nullable();
            $table->text('title_info')->nullable();
            $table->text('info')->nullable();
            $table->text('img_info')->nullable();
            $table->text('title_info2')->nullable();
            $table->text('info2')->nullable();
            $table->text('img_info2')->nullable();
            $table->text('quote')->nullable();
            $table->text('img_quote')->nullable();
            $table->text('history')->nullable();
            $table->bigInteger('whatsapp_num')->nullable();
            $table->bigInteger('whatsapp_num2')->nullable();
            $table->string('gmail')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
