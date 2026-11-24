<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->uuid('draft_id')->unique();
            $table->string('brand', 100);
            $table->string('phone', 15);
            $table->string('service', 120);
            $table->string('plan')->nullable();
            $table->json('addons');
            $table->string('budget', 80)->nullable();
            $table->string('timeline', 80)->nullable();
            $table->text('notes')->nullable();
            $table->string('estimate', 120)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
