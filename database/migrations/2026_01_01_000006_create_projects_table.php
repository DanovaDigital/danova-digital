<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(true);

            $table->string('slug')->unique();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('client')->nullable();
            $table->string('industry')->nullable();
            $table->string('year')->nullable();
            $table->string('duration')->nullable();

            $table->text('hero_image_url')->nullable();
            $table->foreignId('hero_media_id')->nullable()->constrained('media')->nullOnDelete();

            $table->longText('challenge')->nullable();
            $table->longText('solution')->nullable();

            $table->json('results')->nullable();
            $table->json('features')->nullable();
            $table->json('tech')->nullable();
            $table->json('testimonial')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
