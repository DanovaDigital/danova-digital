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
        Schema::table('projects', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['hero_media_id']);
            // Drop the column
            $table->dropColumn('hero_media_id');
            // Add new direct image column
            $table->string('hero_image')->nullable()->after('slug');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['avatar_media_id']);
            // Drop the column
            $table->dropColumn('avatar_media_id');
            // Add new direct image column
            $table->string('avatar_image')->nullable()->after('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('hero_image');
            $table->foreignId('hero_media_id')->nullable()->constrained('media')->onDelete('set null');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('avatar_image');
            $table->foreignId('avatar_media_id')->nullable()->constrained('media')->onDelete('set null');
        });
    }
};
