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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('designation', 100);
            $table->string('address')->nullable();
            $table->date('dob')->nullable();
            $table->date('joining_date');
            $table->string('contact_number', 20);
            $table->string('contact_email', 50);
            $table->string('password');
            $table->string('photo');
            $table->string('nid');
            $table->string('resume');
            $table->integer('point_id');
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
