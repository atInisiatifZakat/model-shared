<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table): void {
            $table->uuid('id');
            $table->uuid('partner_id')->nullable();
            $table->uuid('branch_id')->nullable();
            $table->integer('program_category_id')->nullable();
            $table->integer('funding_type_id')->nullable();
            $table->string('name', 145);
            $table->integer('sub_program_category_id')->nullable();
            $table->integer('edonation_id')->nullable();
            $table->boolean('is_ramadhan');
            $table->boolean('is_reguler');
            $table->timestamps();

            $table->primary('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
