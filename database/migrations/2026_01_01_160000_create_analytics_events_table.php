<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('analytics_events', function (Blueprint $table) {
            $table->id();
            $table->timestamp('occurred_at')->index();

            $table->foreignId('visitor_id')->nullable()->constrained('analytics_visitors')->onDelete('set null');
            $table->string('visitor_token', 64)->index();
            $table->string('session_id_hash', 64)->nullable()->index();

            $table->string('event_type', 50)->index();
            $table->string('event_name', 100)->index();
            $table->string('context', 100)->nullable()->index();

            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('set null');
            $table->foreignId('pricing_plan_id')->nullable()->constrained('pricing_plans')->onDelete('set null');
            $table->string('package_name', 255)->nullable();
            $table->string('package_price', 255)->nullable();

            $table->string('referrer', 500)->nullable();
            $table->string('referrer_domain', 255)->nullable()->index();

            $table->string('utm_source', 100)->nullable()->index();
            $table->string('utm_medium', 100)->nullable()->index();
            $table->string('utm_campaign', 100)->nullable()->index();
            $table->string('utm_term', 100)->nullable();
            $table->string('utm_content', 100)->nullable();

            $table->string('ip_hash', 64)->nullable();
            $table->string('user_agent', 500)->nullable();

            $table->timestamps();

            $table->index(['occurred_at', 'event_type', 'event_name']);
            $table->index(['pricing_plan_id', 'occurred_at']);
            $table->index(['project_id', 'occurred_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('analytics_events');
    }
};
