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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administrator_id');
            $table->text('thumbnail');
            $table->text('title');
            $table->text('explanation');
            $table->string('category');
            $table->integer('point');
            $table->dateTime('activated');
            $table->dateTime('deactivated');
            $table->timestamps();

            $table->foreign('administrator_id')->references('id')->on('administrators');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
