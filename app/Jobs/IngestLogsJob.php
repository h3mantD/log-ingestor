<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Tasks\StoreLogs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class IngestLogsJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $failOnTimeout = true;

    protected $timeout = 0;

    /**
     * Create a new job instance.
     */
    public function __construct(private array $logs)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(StoreLogs $storeLogs): void
    {
        $storeLogs($this->logs);
    }

    public function fail($exception = null): void
    {
        logger()->error(message: "Failed to ingest logs: {$exception->getMessage()}" . $exception);
    }
}
