<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->char('code', 2)->unique();
            $table->string('name', 255);
            $table->text('lat')->nullable();
            $table->text('long')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
