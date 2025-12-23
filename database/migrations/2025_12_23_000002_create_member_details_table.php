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
        Schema::create('member_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            
            // Section A: Basic Information
            $table->string('full_name');
            $table->string('phone_whatsapp');
            $table->string('business_company_name');
            $table->json('role_in_company'); // Multiple selection
            $table->string('role_other')->nullable();
            
            // Section: NGO Representation Information
            $table->enum('represent_ngo', ['Yes', 'No'])->default('No');
            $table->string('ngo_position')->nullable();
            $table->string('ngo_name')->nullable();
            $table->string('ngo_business_count')->nullable();
            
            // Section B: Business Registration
            $table->enum('ssm_status', ['Yes, I already have SSM', 'No, but I am interested (PPUM will try to guide you)', 'In the process of registering SSM']);
            $table->string('ssm_registration_number');
            $table->enum('has_bank_account', ['Yes', 'No']);
            
            // Section D: Location & Proof
            $table->text('office_address');
            $table->string('office_state');
            $table->string('office_district');
            
            // Section: Current Business Issues
            $table->json('business_problems'); // Multiple selection
            $table->string('business_problems_other')->nullable();
            $table->json('support_required'); // Multiple selection
            $table->string('support_required_other')->nullable();
            $table->text('suggestions_feedback');
            
            // Section: Social Media Presence
            $table->json('social_media_accounts')->nullable(); // Multiple selection
            $table->string('social_media_other')->nullable();
            $table->string('social_media_link')->nullable();
            
            // Section G: Business Listing in Food Delivery App
            $table->enum('delivery_app_interest', ['Yes', 'No']);
            
            // Section H: Referral / Source
            $table->json('learned_from'); // Multiple selection
            $table->string('invited_by');
            
            // Final Declaration
            $table->boolean('declaration_consent')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_details');
    }
};

