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
        Schema::create('donations', function (Blueprint $table): void {
            $table->uuid('id');
            $table->uuid('employee_id');
            $table->uuid('branch_id');
            $table->uuid('partner_id')->nullable();
            $table->uuid('donor_id');
            $table->string('identification_number', '36')->unique();
            $table->timestamp('transaction_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('transaction_type', 45);
            $table->string('transaction_status', 15);
            $table->integer('quantity');
            $table->decimal('amount', 18, 2);
            $table->string('currency', 45);
            $table->decimal('currency_rate', 18, 2);
            $table->decimal('currency_rate', 18, 2);
            $table->decimal('total_amount', 18, 2);
            $table->integer('edonation_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->primary('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
