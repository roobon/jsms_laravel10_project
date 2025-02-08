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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->enum('transfer_method', ['banktransfer', 'rtgs']);
            $table->string('cheque_voucher', 60);
            $table->date('payment_date');
            $table->decimal('payment_amount', total: 12, places: 2);
            $table->integer('company_id'); // payment to
            $table->integer('business_id'); // payment from
            $table->integer('employee_id'); // payment by
            $table->string('payment_note', 100)->nullable();
            $table->string('cheque_voucher_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
