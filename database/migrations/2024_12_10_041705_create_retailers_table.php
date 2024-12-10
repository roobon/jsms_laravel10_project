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
        Schema::create('retailers', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name', 50);
            $table->string('proprietor_name', 50);
            $table->string('shop_address');
            $table->string('trade_lisence', 50);
            $table->string('contact_number', 20);
            $table->string('contact_email', 50)->unique();
            $table->date('business_starts');
            $table->date('last_business')->nullable();
            $table->decimal('last_balance', total: 8, places: 2)->default(0);
            $table->enum('status', ['active', 'inactive']);
            $table->string('contact_person', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retailers');
    }
};
