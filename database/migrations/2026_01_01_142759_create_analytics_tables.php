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
        // Visitors table for unique visitor tracking
        Schema::create('analytics_visitors', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_token', 64)->unique();
            $table->timestamp('first_seen_at')->useCurrent();
            $table->timestamp('last_seen_at')->useCurrent()->useCurrentOnUpdate();
            $table->string('first_referrer', 500)->nullable();
            $table->string('first_referrer_domain', 255)->nullable();
            $table->string('user_agent', 500)->nullable();
            $table->string('device_type', 50)->nullable(); // mobile, desktop, tablet, bot
            $table->timestamps();

            $table->index('first_seen_at');
            $table->index('last_seen_at');
        });

        // Page views table for tracking every request
        Schema::create('analytics_page_views', function (Blueprint $table) {
            $table->id();
            $table->timestamp('occurred_at')->useCurrent();
            $table->foreignId('visitor_id')->nullable()->constrained('analytics_visitors')->onDelete('set null');
            $table->string('visitor_token', 64)->index();
            $table->string('session_id_hash', 64)->nullable()->index();

            // Request details
            $table->string('method', 10)->default('GET');
            $table->unsignedSmallInteger('status_code')->default(200);
            $table->string('path', 500)->index();
            $table->string('route_name', 100)->nullable()->index();

            // Page categorization
            $table->string('page_type', 50)->nullable()->index(); // landing, work_detail
            $table->string('page_key', 255)->nullable()->index(); // project slug for work_detail
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('set null');

            // Marketing attribution
            $table->string('referrer', 500)->nullable();
            $table->string('referrer_domain', 255)->nullable()->index();
            $table->string('utm_source', 100)->nullable()->index();
            $table->string('utm_medium', 100)->nullable()->index();
            $table->string('utm_campaign', 100)->nullable()->index();
            $table->string('utm_term', 100)->nullable();
            $table->string('utm_content', 100)->nullable();

            // Privacy-focused tracking
            $table->string('ip_hash', 64)->nullable();
            $table->string('user_agent', 500)->nullable();

            $table->timestamps();

            // Composite indexes for common queries
            $table->index(['occurred_at', 'page_type']);
            $table->index(['occurred_at', 'project_id']);
            $table->index(['visitor_id', 'occurred_at']);
        });

        // Daily aggregations table (optional, for performance)
        Schema::create('analytics_daily_aggregates', function (Blueprint $table) {
            $table->id();
            $table->date('date')->index();
            $table->string('page_type', 50)->nullable()->index();
            $table->string('page_key', 255)->nullable();
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('cascade');
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('unique_visitors')->default(0);
            $table->timestamps();

            $table->unique(['date', 'page_type', 'page_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_daily_aggregates');
        Schema::dropIfExists('analytics_page_views');
        Schema::dropIfExists('analytics_visitors');
    }
};
