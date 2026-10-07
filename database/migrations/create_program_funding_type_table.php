<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_funding_type', function (Blueprint $table): void {
            $table->uuid('program_id');
            $table->unsignedBigInteger('funding_type_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_funding_type');
    }
};
