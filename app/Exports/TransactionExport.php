<?php

namespace App\Exports;

use App\Models\Transaction;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

// class TransactionExport implements FromCollection
class TransactionExport implements FromView, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Transaction::all();
    // }

    public function view(): View
    {
        $transactions = Transaction::all();
        return view('exports.transaction_export')
            ->with('transactions', $transactions);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 20
                ]
            ],
            4 => [
                'font' => [
                    'bold' => true
                ]
            ],
        ];
    }
}
