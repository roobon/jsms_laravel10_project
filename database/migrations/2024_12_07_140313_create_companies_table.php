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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 50);
            $table->date('business_starts');
            $table->decimal('security_money', total: 8, places: 2);
            $table->string('company_address');
            $table->string('contact_person', 50);
            $table->string('contact_number', 20);
            $table->string('contact_email', 50)->unique();
            $table->string('website', 100);
            $table->date('last_business_date')->nullable();
            $table->decimal('last_balance', total: 8, places: 2)->default(0);
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};