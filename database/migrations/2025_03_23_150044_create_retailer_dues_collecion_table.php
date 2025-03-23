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
        Schema::create('retailer_dues_collecion', function (Blueprint $table) {
            $table->id();
            $table->integer('retailer_id');
            $table->string('invoice', 30);
            $table->date('invoice_date');
            $table->enum('transaction', ['sales', 'realization']);
            $table->decimal('sales_amount', total: 12, places: 2)->default(0);
            $table->decimal('collection_amount', total: 12, places: 2)->default(0);
            $table->decimal('due_amount', total: 10, places: 2)->default(0);
            $table->string('photo')->nullable();
            $table->integer('business_id'); // Business
            $table->integer('employee_id'); // Delivery Man
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retailer_dues_collecion');
    }
};
