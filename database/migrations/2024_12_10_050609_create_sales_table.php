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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('retailer_id');
            $table->string('invoice_number', 30);
            $table->decimal('total_amount', total: 10, places: 2);
            $table->decimal('collection_amount', total: 10, places: 2)->default(0);
            $table->decimal('due_amount', total: 10, places: 2);
            $table->integer('point_id');
            $table->integer('company_id');
            $table->date('sales_date');
            $table->string('voucher_photo');
            $table->integer('employee_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
