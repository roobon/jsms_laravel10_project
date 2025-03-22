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
        Schema::create('insentives', function (Blueprint $table) {
            $table->id();
            $table->decimal('insentive_amount', total: 10, places: 2);
            $table->date('incentive_month');
            $table->date('received_date');
            $table->integer('business_id'); // for which business
            $table->integer('company_id'); // Received From
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insentives');
    }
};
