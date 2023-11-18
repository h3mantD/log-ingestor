<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Log as LogModel;
use Illuminate\Support\Facades\DB;

final class Log
{
    public function store(array $logs): void
    {
        $isArrayOfArrays = array_filter($logs, 'is_array') === $logs;

        if ($isArrayOfArrays) {
            LogModel::create($logs);
        }

        foreach (array_chunk(array: $logs, length: 1000) as $logsChunk) {
            DB::collection('logs')->insert($logsChunk);
        }
    }
}
