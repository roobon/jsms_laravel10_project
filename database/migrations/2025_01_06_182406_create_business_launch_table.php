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
        Schema::create('business_launch', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->date('launch_date');
            $table->decimal('security_money', total: 12, places: 2)->default(0);
            $table->integer('point_id');
            $table->integer('company_id');
            $table->string('launch_photo')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_launch');
    }
};
