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
            $table->string('shop_name', 60);
            $table->string('proprietor_name', 50);
            $table->string('market_name')->nullable();
            $table->string('shop_address');
            $table->string('trade_lisence', 50)->nullable();
            $table->string('contact_person', 50);
            $table->string('contact_number', 20);
            $table->string('contact_email', 50)->nullable();
            $table->date('business_starts');
            $table->integer('point_id');
            $table->integer('manager_id'); //Manager
            $table->integer('delman_id'); //Delivery Man
            $table->enum('status', ['active', 'inactive']);
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
