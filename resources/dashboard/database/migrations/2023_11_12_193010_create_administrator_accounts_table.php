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
        Schema::create('administrator_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('administrator_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('first_name_kana');
            $table->string('last_name_kana');
            $table->date('birth_date');
            $table->timestamps();

            $table->foreign('administrator_id')->references('id')->on('administrators');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrator_accounts');
    }
};
