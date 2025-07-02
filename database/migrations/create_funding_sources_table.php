<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funding_sources', static function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->boolean('is_active');
            $table->bigInteger('funding_source_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funding_sources');
    }
};
