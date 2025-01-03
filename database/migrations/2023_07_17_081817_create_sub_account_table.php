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
        Schema::create('subAccount', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('code')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('accountId');

            $table->foreign('accountId')->references('id')->on('account');

            $table->string('isLocked')->default("false");
            $table->string('status')->default("true");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subAccount');
    }
};
