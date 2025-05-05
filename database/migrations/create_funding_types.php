<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('funding_types', function (Blueprint $table): void {
            $table->increments('id');
            $table->string('name', 146);
            $table->integer('edonation_id')->nullable();
            $table->integer('funding_category_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funding_types');
    }
};
