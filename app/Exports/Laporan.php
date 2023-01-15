<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class Laporan implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
{
    use Exportable;

    protected $from;
    protected $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function map($row): array
    {
        return [
            $row->user->name,
            $row->user->email,
            $row->invoice,
            $row->total,
            $row->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Invoice',
            'Total Pembelian',
            'Tanggal Pembelian',
        ];
    }

    public function query()
    {

        return Transaksi::latest()->with(['user'])->where('status', 'Selesai')->whereBetween('created_at', [$this->from, $this->to])->orderBy('created_at', 'desc');
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $cellRange = 'A1:F1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12);
            },
        ];
    }
}
