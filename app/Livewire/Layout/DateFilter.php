<?php

declare(strict_types=1);

namespace App\Livewire\Layout;

use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Attributes\Rule;
use Livewire\Component;

final class DateFilter extends Component
{
    #[Rule('nullable|date|date_format:Y-m-d\TH:i:s\Z')]
    public string $startDate = '';

    #[Rule('nullable|date|date_format:Y-m-d\TH:i:s\Z')]
    public string $endDate = '';

    public function filterByDate(): void
    {
        $this->validate(rules: [
            'startDate' => ['nullable', 'date', 'date_format:Y-m-d\TH:i:s\Z'],
            'endDate' => ['nullable', 'date', 'date_format:Y-m-d\TH:i:s\Z', ValidationRule::requiredIf(
                $this->startDate ? true : false
            )],
        ]);

        $this->dispatch('filterByDate', [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
        ]);
    }

    public function clear(): void
    {
        $this->reset('startDate', 'endDate');
        $this->dispatch(event: 'clearDateFilter');
    }

    public function render()
    {
        return view(view: 'livewire.layout.date-filter');
    }
}
