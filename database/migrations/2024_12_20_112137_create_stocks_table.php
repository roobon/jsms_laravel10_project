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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 50);
            $table->decimal('product_amount', total: 10, places: 2);
            $table->date('received_date');
            $table->enum('product_type', ['regular', 'slab', 'vatadjust', 'mktpromo']);
            $table->string('invoice_photo')->nullable();
            $table->integer('business_id'); // for which business
            $table->integer('company_id'); // Received From
            $table->integer('employee_id'); // Received by
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
