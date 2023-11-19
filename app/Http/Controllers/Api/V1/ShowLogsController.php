<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class ShowLogsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $pageSize = $request->get('page_size', 10);
        $logs = Log::query()
            ->when(
                $request->has(key: 'level'),
                fn ($query) => $query->where('level', 'like', "%{$request->get('level')}%")
            )
            ->when(
                $request->has(key: 'message'),
                fn ($query) => $query->where('message', 'like', "%{$request->get('message')}%")
            )
            ->when(
                $request->has(key: 'resourceId'),
                fn ($query) => $query->where('resourceId', 'like', "%{$request->get('resourceId')}%")
            )
            ->when(
                $request->has(key: 'traceId'),
                fn ($query) => $query->where('traceId', 'like', "%{$request->get('traceId')}%")
            )
            ->when(
                $request->has(key: 'spanId'),
                fn ($query) => $query->where('spanId', 'like', "%{$request->get('spanId')}%")
            )
            ->when(
                $request->has(key: 'commit'),
                fn ($query) => $query->where('commit', 'like', "%{$request->get('commit')}%")
            )
            ->when(
                $request->has(key: 'metadata.parentResourceId'),
                fn ($query) => $query->where(
                    'metadata.parentResourceId',
                    'like',
                    "%{$request->get('metadata.parentResourceId')}%"
                )
            );

        return response()->json([
            'logs' => $logs->paginate(perPage: $pageSize),
        ]);
    }
}
