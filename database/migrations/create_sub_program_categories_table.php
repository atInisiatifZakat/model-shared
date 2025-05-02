<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sub_program_categories', function (Blueprint $table): void {
            $table->uuid('id');
            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->primary('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sub_program_categories');
    }
};
