<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('business_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_id')->nullable()->constrained('leads')->nullOnDelete();
            $table->string('document_type', 40)->index();
            $table->string('document_number', 64)->unique();
            $table->string('title', 200);
            $table->date('issue_date');
            $table->date('due_date')->nullable();
            $table->string('status', 32)->default('draft')->index();

            // Client details
            $table->string('client_name', 180);
            $table->string('client_company', 180)->nullable();
            $table->string('client_phone', 40)->nullable();
            $table->string('client_email', 180)->nullable();
            $table->text('client_address')->nullable();

            // Line items & totals
            $table->json('items');
            $table->unsignedBigInteger('discount')->default(0);
            $table->decimal('tax_percent', 5, 2)->default(0);
            $table->unsignedBigInteger('dp_percent')->default(50);
            $table->unsignedBigInteger('paid_amount')->default(0);

            // Terms, notes & company kop override
            $table->text('payment_terms')->nullable();
            $table->text('notes')->nullable();
            $table->string('company_name', 180)->nullable();
            $table->string('company_tagline', 200)->nullable();
            $table->text('company_address')->nullable();
            $table->text('bank_info')->nullable();

            // Electronic Signatures
            $table->string('signer_name', 120);
            $table->string('signer_role', 120);
            $table->longText('signature_data')->nullable();
            $table->string('client_signer_name', 120)->nullable();
            $table->longText('client_signature_data')->nullable();
            $table->string('verification_code', 32)->unique();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('business_documents');
    }
};
