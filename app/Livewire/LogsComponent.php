<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Log;
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

    public string $searchColumn = 'level';

    public string $searchType = 'simple';

    public string $searchValue = '';

    public ?array $logQuery = null;

    public function mount(): void
    {
        $this->logQuery = null;
    }

    public function search(): void
    {
        $this->logQuery = [
            'column' => $this->searchColumn,
            'operator' => 'simple' === $this->searchType ? 'like' : 'regexp',
            'value' => 'simple' === $this->searchType ? "%{$this->searchValue}%" : $this->searchValue,
        ];
        $this->resetPage();
    }

    public function clear(): void
    {
        $this->reset('searchColumn', 'searchType', 'searchValue', 'logQuery');
        $this->resetPage();
    }

    public function render()
    {
        if ($this->logQuery) {
            $logs = Log::where(
                $this->logQuery['column'],
                $this->logQuery['operator'],
                $this->logQuery['value']
            )->paginate(10);
        } else {
            $logs = Log::paginate(10);
        }

        return view('livewire.logs-component', ['logs' => $logs]);
    }
}
