<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\IngestLogsController;
use Illuminate\Support\Facades\Route;

Route::post('/ingest-logs', IngestLogsController::class)->name('ingest-logs');
