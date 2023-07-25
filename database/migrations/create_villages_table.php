<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration
{
    public function up(): void
    {
        Schema::create('villages', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->char('code', 10)->unique();
            $table->char('district_code', 7);
            $table->string('name', 255);
            $table->text('lat')->nullable();
            $table->text('long')->nullable();
            $table->text('pos')->nullable();
            $table->timestamps();

            $table->foreign('district_code')
                ->references('code')
                ->on('districts')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('villages');
    }
};
