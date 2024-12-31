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
            $table->decimal('ims_target', total: 12, places: 2)->default(0);
            $table->integer('collection_target');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('working_days');
            $table->decimal('sales_amount', total: 12, places: 2)->default(0);
            $table->decimal('collection_amount', total: 12, places: 2)->default(0);
            $table->decimal('deposit_amount', total: 12, places: 2)->default(0);
            $table->decimal('collTargetVSdeposit', total: 12, places: 2)->default(0);
            $table->decimal('startMonthdue', total: 12, places: 2)->default(0);
            $table->decimal('endMonthdue', total: 12, places: 2)->default(0);
            $table->decimal('godownstock', total: 12, places: 2)->default(0);
            $table->decimal('ledgerDue', total: 12, places: 2)->default(0);
            $table->integer('point_id');
            $table->integer('company_id');
            $table->integer('target_id');
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
