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
            $table->integer('admin_id');
            $table->string('name', 50);
            $table->string('designation', 100);
            $table->string('address');
            $table->date('dob');
            $table->date('joining_date');
            $table->string('contact_number', 20);
            $table->string('photo');
            $table->string('nid', 20)->unique();
            $table->string('resume');
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
