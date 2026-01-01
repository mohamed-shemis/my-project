<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('national_id')->nullable()->unique();
            $table->string('project')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('inquiry_type')->nullable();
            $table->text('message')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
