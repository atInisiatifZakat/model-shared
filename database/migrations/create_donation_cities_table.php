<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation_cities', function (Blueprint $table): void {
            $table->increments('id');
            $table->unsignedInteger('province_id');
            $table->string('name', 150);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_cities');
    }
};
