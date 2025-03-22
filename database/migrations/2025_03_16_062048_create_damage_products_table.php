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
        Schema::create('damage_products', function (Blueprint $table) {
            $table->id();
            $table->string('factory_name');
            $table->date('chalan_date');
            $table->enum('claim_type', ['replacement', 'outofpolicy']);
            $table->decimal('claim_amount', total: 12, places: 2)->default(0);
            $table->string('claim_photo')->nullable();
            $table->integer('business_id'); // From which business
            $table->integer('company_id'); // In which company we claimed 
            $table->integer('employee_id'); // claimed by employee
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('damage_products');
    }
};
