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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->integer('retailer_id');
            $table->string('invoice_no', 60);
            $table->date('invoice_date');
            $table->decimal('collection_amount', total: 10, places: 2)->default(0);
            $table->decimal('rest_amount', total: 10, places: 2)->default(0);
            $table->integer('business_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
