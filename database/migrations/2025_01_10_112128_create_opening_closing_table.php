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
        Schema::create('opening_closing', function (Blueprint $table) {
            $table->id();
            $table->decimal('security_money', total: 12, places: 2)->default(0);
            $table->decimal('investment_amount', total: 12, places: 2)->default(0);
            $table->decimal('bank_deposit_amount', total: 12, places: 2)->default(0);
            $table->decimal('product_received_amount', total: 12, places: 2)->default(0);
            $table->decimal('slab_received_amount', total: 12, places: 2)->default(0);
            $table->decimal('vat_adjustment_received_amount', total: 12, places: 2)->default(0);
            $table->decimal('promotion_received_amount', total: 12, places: 2)->default(0);
            $table->decimal('insentive_received_amount', total: 12, places: 2)->default(0);
            $table->decimal('sales_amount', total: 12, places: 2)->default(0);
            $table->decimal('collection_amount', total: 12, places: 2)->default(0);
            $table->decimal('due_amount', total: 12, places: 2)->default(0);
            $table->decimal('due_realize_amount', total: 12, places: 2)->default(0);
            $table->decimal('total_due_amount', total: 12, places: 2)->default(0);
            $table->decimal('ho_deposit_amount', total: 12, places: 2)->default(0);
            $table->date('report_date');
            $table->integer('month');
            $table->year('year');
            $table->integer('business_id');
            $table->enum('period', ['opening', 'closing']);
            $table->enum('status', ['running', 'ended']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opening_closing');
    }
};
