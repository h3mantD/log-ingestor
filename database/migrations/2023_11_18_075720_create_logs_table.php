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
            $table->string(column: 'level')->index();
            $table->string(column: 'message')->index();
            $table->string(column: 'resourceId')->index();
            $table->string(column: 'traceId')->index();
            $table->string(column: 'spanId')->index();
            $table->string(column: 'commit')->index();
            $table->json(column: 'metadata')->index();
            $table->timestamp(column: 'timestamp')->index();
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
