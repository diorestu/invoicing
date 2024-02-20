<?php

namespace App\Exports;

use App\Models\Contract;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ContractExport implements FromView, WithStyles, WithColumnWidths
{
    public function view(): View
    {
        return view('print.export_contract', [
            'contract' => Contract::all()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $count = Contract::count() + 1;
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);
        $sheet->getStyle('A1:F1')->getFont()->setSize(14);
        $sheet->getStyle('A1:F1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $sheet->getStyle('A1:F1')->getFill()->setFillType(Fill::FILL_SOLID);
        $sheet->getStyle('A1:F1')->getFill()->getStartColor()->setARGB(Color::COLOR_DARKBLUE);
        $sheet->getStyle('E1:E' . $count)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle('A1:F' . $count)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 40,
            'B' => 30,
            'C' => 18,
            'D' => 15,
            'E' => 15,
            'F' => 15,
        ];
    }
}
