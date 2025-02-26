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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('check_voucher_num');
            $table->decimal('deposit_amount', total: 12, places: 2)->default(0);
            $table->date('deposit_date');
            $table->string('deposit_photo')->nullable();
            $table->integer('business_id'); // From business
            $table->integer('employee_id'); // by employee
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
