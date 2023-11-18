<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Log;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

final class LogsComponent extends Component
{
    use WithPagination;

    public array $searchableColumns = [
        'level' => 'Level',
        'message' => 'Message',
        'resourceId' => 'Resource ID',
        'traceId' => 'Trace ID',
        'spanId' => 'Span ID',
        'commit' => 'Commit',
        'metadata->parentResourceId' => 'Metadata.parentResourceId',
    ];

    public array $searchTypes = [
        'simple' => 'Simple',
        'regex' => 'Regex',
    ];

    private Builder $logQuery;

    public function mount(): void
    {
        $this->logQuery = Log::query();
    }

    public function render()
    {
        $logs = $this->logQuery->paginate(10);

        return view('livewire.logs-component', ['logs' => $logs]);
    }
}
