<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Log;
use Livewire\Attributes\On;
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

    public ?array $dateFilter = null;

    public function mount(): void
    {
        $this->logQuery = null;
    }

    public function search(): void
    {
        if ('regex' === $this->searchType) {
            $this->validate(rules: [
                'searchValue' => ['required', 'regex:/^\/.*\/$/'],
            ]);
        }
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

    #[On('filterByDate')]
    public function applyDateTimeFilter(array $dateTimeFilterData): void
    {
        $this->dateFilter = $dateTimeFilterData;
        $this->resetPage();
    }

    public function clearDateTimeFilter(): void
    {
        $this->dateFilter = null;
        $this->resetPage();
    }

    public function render()
    {
        $log = Log::query();
        if ($this->logQuery) {
            $logs = $log->where(
                column: $this->logQuery['column'],
                operator: $this->logQuery['operator'],
                value: $this->logQuery['value']
            );
        }
        if ($this->dateFilter) {
            $logs = $log->whereBetween(
                column: 'timestamp',
                values: [
                    $this->dateFilter['startDate'],
                    $this->dateFilter['endDate'],
                ]
            );
        }

        $logs = $log->paginate(10);

        return view('livewire.logs-component', ['logs' => $logs]);
    }
}
