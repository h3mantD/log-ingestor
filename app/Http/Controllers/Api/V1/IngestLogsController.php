<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\IngestLogsRequest;
use App\Jobs\IngestLogsJob;
use App\Tasks\StoreLogs;
use Illuminate\Http\JsonResponse;
use Throwable;
use UnexpectedValueException;

final class IngestLogsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(IngestLogsRequest $request, StoreLogs $storeLogs): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $logs = $validatedData['logs'];

            if (! $logs) {
                throw new UnexpectedValueException(message: 'Logs are empty', code: 422);
            }

            dispatch(new IngestLogsJob(logs: $logs));

            return response()->json(data: ['status' => true, 'message' => 'Logs are getting ingested']);
        } catch (Throwable $th) {
            return response()->json(data: ['status' => false, 'message' => $th->getMessage()]);
        }
    }
}
