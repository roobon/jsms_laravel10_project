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
        Schema::create('business_launching', function (Blueprint $table) {
            $table->id();
            $table->date('launching_date');
            $table->decimal('security_money', total: 12, places: 2)->default(0);
            $table->integer('point_id');
            $table->integer('company_id');
            $table->integer('employee_id');
            $table->string('launching_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_launching');
    }
};
