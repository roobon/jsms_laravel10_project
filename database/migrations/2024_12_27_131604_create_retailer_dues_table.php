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
            $table->string('sales_memo', 60);
            $table->date('sales_date');
            $table->decimal('due_amount', total: 10, places: 2)->default(0);
            $table->string('photo')->nullable();
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
