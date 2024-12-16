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
        Schema::create('sales_payments_stocks', function (Blueprint $table) {
            $table->id();
            $table->decimal('ims_target', total: 8, places: 2)->default(0);
            $table->decimal('collection_target', total: 8, places: 2)->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('sales_amount', total: 8, places: 2)->default(0);
            $table->decimal('collection_amount', total: 8, places: 2)->default(0);
            $table->decimal('deposit_amount', total: 8, places: 2)->default(0);
            $table->decimal('collTargetVSdeposit', total: 8, places: 2)->default(0);
            $table->decimal('startMonthdue', total: 8, places: 2)->default(0);
            $table->decimal('endMonthdue', total: 8, places: 2)->default(0);
            $table->decimal('GodownStock', total: 8, places: 2)->default(0);
            $table->decimal('ledgerView', total: 8, places: 2)->default(0);
            $table->integer('point_id');
            $table->integer('company_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_payments_stocks');
    }
};
