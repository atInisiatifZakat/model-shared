<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table): void {
            $table->uuid('id');
            $table->uuid('branch_id');
            $table->string('name', 100);
            $table->string('address')->nullable();
            $table->string('regency_id')->nullable();
            $table->string('city_id', 100)->nullable();
            $table->string('province_id', 100)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('phone_number', 25)->nullable();
            $table->string('agreement_number');
            $table->dateTime('agreement_date');
            $table->dateTime('agreement_expiry_date');
            $table->boolean('status');
            $table->softDeletes();
            $table->timestamps();

            $table->primary('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
