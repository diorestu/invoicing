<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Contract;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\InvoicePrint;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ExportController extends Controller
{
    public function printSurat($id)
    {
        set_time_limit(1000);
        $data       = Invoice::findOrFail($id);
        $pt = $data->contract->project->idvendor->nama_pt;
        // dd($data->contract->project->idvendor->nama_pt);
        $data = [
            'data'       => $data,
            'total'      => $data->nominal + $data->fee_manage + $data->ppn + $data->pph,
        ];
        $pdf = Pdf::loadView('print.print_surat', $data);
        $pdf->setPaper('A4');
        return $pdf->download('Surat Pemberitahuan Pembayaran Invoice '.$pt.'.pdf');
    }
    
    public function printReceipt($id)
    {
        set_time_limit(1000);
        $data       = Invoice::findOrFail($id);
        $pt = $data->contract->project->idvendor->nama_pt;        
        $string     = $pt .
            "\nNama Pekerjaan: " . strtoupper($data->contract->nama_pekerjaan) .
            "\nNama Klien: " . strtoupper($data->contract->project->nama) .
            "\nNo. Kontrak: " . $data->contract->no_kontrak_asta .
            "\nStatus: " . strtoupper($data->status) .
            "\nTotal Bayar: " . rupiah($data->nominal);
        $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('M')->generate($string));        $data = [
            'data'       => $data,
            'qrcode'     => $qrcode,
            'total'      => $data->nominal + $data->fee_manage + $data->ppn + $data->pph,
        ];
        $pdf = Pdf::loadView('print.print_or', $data);
        $pdf->setPaper('A4');
        return $pdf->download('Official Receipt '.$pt.'.pdf');
    }
    
    public function printContract($id)
    {
        $string     = "PT ASTA NADI KARYA UTAMA" .
            "\nNama Pekerjaan: " . strtoupper($data->contract->nama_pekerjaan) .
            "\nNama Klien: " . strtoupper($data->contract->project->nama) .
            "\nNo. Kontrak: " . $data->contract->no_kontrak_asta .
            "\nStatus: " . strtoupper($data->status) .
            "\nTotal Bayar: " . rupiah($data->nominal);
        $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('M')->generate($string));
        $data = [
            'contract' => Contract::findOrFail($id),
                        'qrcode'     => $qrcode,

        ];
        $pdf = Pdf::loadView('print.print_contract', $data);
        $pdf->setPaper('A4');
        return $pdf->download('Contract Onboarding.pdf');
    }

    public function printInvoice($id)
    {
        set_time_limit(1000);
        $data       = Invoice::findOrFail($id);
        $file       = 'Invoice '. $data->no_inv .'.pdf';
        // dd($data->no_inv);
        // $dataRender = InvoicePrint::where('id_invoice', $id)->latest()->first();
        $string     = "PT ASTA NADI KARYA UTAMA" .
            "\nNama Pekerjaan: " . strtoupper($data->contract->nama_pekerjaan) .
            "\nNama Klien: " . strtoupper($data->contract->project->nama) .
            "\nNo. Kontrak: " . $data->contract->no_kontrak_asta .
            "\nStatus: " . strtoupper($data->status) .
            "\nTotal Bayar: " . rupiah($data->nominal);
        $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('M')->generate($string));
        $data = [
            'data'       => $data,
            // 'dataRender' => $dataRender,
            'qrcode'     => $qrcode,
            'total'      => $data->biaya_satuan + $data->fee_manage + $data->ppn + $data->pph,
        ];
        $pdf = Pdf::loadView('print.print_invoice', $data);
        $pdf->setPaper('A4');
        return $pdf->download($file);
    }
}
