<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Reader\Xls\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProjectExport implements FromView, WithStyles, WithColumnWidths
{
    public function view(): View
    {
        return view('print.export_project', [
            'project' => Project::all()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $count = Project::count() + 1;
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E1')->getFont()->setSize(14);
        $sheet->getStyle('A1:E1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $sheet->getStyle('A1:E1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('A1:E1')->getFill()->getStartColor()->setARGB(Color::COLOR_DARKBLUE);
        $sheet->getStyle('C:E')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:E' . $count)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 30,
            'C' => 18,
            'D' => 25,
            'E' => 30,
        ];
    }
}
