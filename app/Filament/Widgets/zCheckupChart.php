<?php

namespace App\Filament\Widgets;

use App\Models\Checkup;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class zCheckupChart extends ChartWidget
{
    protected ?string $heading = 'Pemeriksaan Berdasarkan Jenis Perawatan';

    protected function getData(): array
    {
        $data = Checkup::query()
            ->select('treatments.name', DB::raw('count(*) as total'))
            ->join('treatments', 'checkups.treatment_id', '=', 'treatments.id')
            ->groupBy('treatments.name')
            ->pluck('total', 'name');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pemeriksaan',
                    'data' => $data->values(),
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
