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
            $table->integer('delman_id');
            $table->string('invoice_number', 30);
            $table->decimal('total_amount', total: 10, places: 2);
            $table->decimal('collection_amount', total: 10, places: 2)->default(0);
            $table->decimal('due_amount', total: 10, places: 2);
            $table->date('sales_date');
            $table->integer('business_id');
            $table->integer('manager_id');
            $table->string('voucher_photo')->nullable();
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
