<?php

namespace App\Http\Livewire\Reports;

use App\Exports\Laporan;
use App\Http\Livewire\AppComponent;
use App\Models\Transaksi;
use Maatwebsite\Excel\Facades\Excel;

class Reports extends AppComponent
{
    public $dateawal;
    public $dateakhir;
    public function getTransaksiProperty()
    {
        return Transaksi::latest()->with(['user'])->where('status', 'Selesai')->paginate($this->trow);
    }
    public function fexcel()
    {

        if ($this->dateawal >= $this->dateakhir) {
            return $this->dispatchBrowserEvent('alert-danger', ['message' => 'Tanggal salah mohon periksa Kembali']);
        }
        $date = date('Y-m-d', strtotime('+1 days', strtotime($this->dateakhir)));
        $data = Transaksi::latest()->whereBetween('created_at', [$this->dateawal, $date]);
        // dd($data->get());
        if ($data->count() == 0) {
            return $this->dispatchBrowserEvent('alert-danger', ['message' => 'Export Gagal Data Tidak Ditemukan']);
        }
        $nama = 'from-' . $this->dateawal . '-to-' . $this->dateakhir . '-LogTamu.xls';
        try {
            return (new Laporan($this->dateawal, $date))->download($nama);
        } catch (\Throwable $th) {
            // throw $th;
            $this->dispatchBrowserEvent('alert-danger', ['message' => 'Gagal']);
        }
    }

    public function render()
    {
        $data = $this->transaksi;
        return view(
            'livewire.reports.reports',
            [
                'transaksi' => $data,
            ]
        );
    }
}
