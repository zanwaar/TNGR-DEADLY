<?php

namespace App\Http\Livewire\Reports;

use App\Exports\Laporan;
use App\Http\Livewire\AppComponent;
use App\Models\Transaksi;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class Reports extends AppComponent
{
    public $dateawal;
    public $dateakhir;
    public function getTransaksiProperty()
    {
        return Transaksi::latest()->with(['user'])->where('status', 'Selesai')->paginate($this->trow);
    }
    public function generatePDF()

    {
        // Transaksi::latest()->with(['user'])->where('status', 'Selesai')->whereBetween('created_at', [$this->from, $this->to])->orderBy('created_at', 'desc');
        $data = ['title' => 'Welcome to belajarphp.net'];

        // $pdf = PDF::loadView(, $data);
        // //return $pdf->download('laporan-pdf.pdf');
        // //menjadi


        return $pdfContent->stream('filename.pdf');
    }
    public function fexcel()
    {

        if ($this->dateawal >= $this->dateakhir) {
            return $this->dispatchBrowserEvent('alert-danger', ['message' => 'Tanggal salah mohon periksa Kembali']);
        }
        $date = date('Y-m-d', strtotime('+1 days', strtotime($this->dateakhir)));
        $data = Transaksi::latest()->with(['user'])->where('status', 'Selesai')->whereBetween('created_at', [$this->dateawal, $date])->orderBy('created_at', 'desc');
        // dd($data->get()->toArray());
        if ($data->count() == 0) {
            return $this->dispatchBrowserEvent('alert-danger', ['message' => 'Export Gagal Data Tidak Ditemukan']);
        }
        $nama = 'from-' . $this->dateawal . '-to-' . $this->dateakhir . '.xls';
        try {
            // $data1 = $data->get()->toArray();
            $data1 = ['data' => $data->get()];
            $pdfContent = PDF::loadView('pdf.laporan', $data1)->output();
            return response()->streamDownload(
                fn () => print($pdfContent),
                'lapao.pdf'
            );
            // return redirect()->route('laporan', $this->dateawal, $date);
            // return (new Laporan($this->dateawal, $date))->download($nama);
        } catch (\Throwable $th) {
            throw $th;
            // $this->dispatchBrowserEvent('alert-danger', ['message' => 'Gagal']);
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
