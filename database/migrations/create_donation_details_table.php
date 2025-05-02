<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donation_details', function (Blueprint $table): void {
            $table->increments('id');
            $table->uuid('donation_id');
            $table->uuid('program_id')->nullable();
            $table->uuid('funding_type_id')->nullable();
            $table->decimal('amount', 18, 2);
            $table->string('qurban_names')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donation_details');
    }
};
