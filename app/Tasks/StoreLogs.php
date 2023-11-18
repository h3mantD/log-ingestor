<?php

declare(strict_types=1);

namespace App\Tasks;

use App\Queries\Log;

final class StoreLogs
{
    public function __construct(private Log $log)
    {
    }

    public function __invoke(array $logs): void
    {
        $this->log->store($logs);
    }
}
