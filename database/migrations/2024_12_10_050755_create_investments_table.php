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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->string('item_name', 60);
            $table->string('item_details');
            $table->decimal('item_price', total: 8, places: 2)->default(0);
            $table->date('investment_date');
            $table->integer('point_id');
            $table->integer('employee_id');
            $table->string('investment_photo', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
