<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table): void {
            $table->ulid();
            $table->string(column: 'level');
            $table->string(column: 'message');
            $table->string(column: 'resourceId');
            $table->string(column: 'traceId');
            $table->string(column: 'spanId');
            $table->string(column: 'commit');
            $table->json(column: 'metadata');
            $table->timestamp(column: 'timestamp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
