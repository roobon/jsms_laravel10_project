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
        Schema::create('retailer_dues', function (Blueprint $table) {
            $table->id();
            $table->integer('retailer_id');
            $table->date('sales_date');
            $table->string('invoice_number', 50);
            $table->decimal('sales_amount', total: 10, places: 2)->default(0);
            $table->decimal('collection_amount', total: 10, places: 2)->default(0);
            $table->decimal('due_amount', total: 10, places: 2)->default(0);
            $table->string('photo')->nullable();
            $table->integer('business_id');
            $table->integer('employee_id'); // Delivery Man
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retailer_dues');
    }
};
