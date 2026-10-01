<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('price_components', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. "Service Fee", "Admin Fee"
            $table->string('type', 20)->default('fixed'); // 'fixed' or 'percentage'
            $table->decimal('value', 12, 2)->default(0); // fixed: amount in IDR, percentage: 0-100
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_components');
    }
};
