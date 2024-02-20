<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <title>INVOICE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/print.css') }}" />
    <style>
        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-Bold.ttf') }}) format("truetype");
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-BoldItalic.ttf') }}) format("truetype");
            font-weight: 700;
            font-style: italic;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-ExtraBold.ttf') }}) format("truetype");
            font-weight: 800;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-ExtraBoldItalic.ttf') }}) format("truetype");
            font-weight: 800;
            font-style: italic;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-Light.ttf') }}) format("truetype");
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-LightItalic.ttf') }}) format("truetype");
            font-weight: 300;
            font-style: italic;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-Medium.ttf') }}) format("truetype");
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-MediumItalic.ttf') }}) format("truetype");
            font-weight: 500;
            font-style: italic;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-Regular.ttf') }}) format("truetype");
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-SemiBold.ttf') }}) format("truetype");
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-SemiBoldItalic.ttf') }}) format("truetype");
            font-weight: 600;
            font-style: italic;
        }

        @font-face {
            font-family: 'Open Sans';
            src: url({{ storage_path('fonts/OpenSans-Italic.ttf') }}) format("truetype");
            font-weight: 400;
            font-style: italic;
        }

        body {
            font-family: 'Open Sans', sans-serif;
        }

        /* p {
            color: #343a40;
            font-size: 10px;
            font-weight: 400;
            margin: 0 !important;
            line-height: 10px !important;
            font-family: 'Open Sans', serif;
        } */

        h4 {
            color: #2b2d42;
            font-size: 18px;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 0;
            font-family: 'Open Sans', sans-serif;
        }

        h5 {
            color: #2b2d42;
            font-size: 11px;
            margin-top: 0;
            margin-bottom: 0;
            font-family: 'Open Sans', sans-serif;
        }

        th,
        td {
            /* vertical-align: center; */
            padding: 1px 2px 0 5px !important;
            margin: 1px 2px 0 5px !important;
            font-size: 12px;
        }

        #title {
            margin-bottom: 22px;
            margin-top: 0px;
        }
    </style>
    <style>
        .text-end {
            float: right;
        }

        @page {
            margin: 170px 40px;
        }

        .header-surat {
            position: fixed;
            left: 20px;
            top: -170px;
            right: -40px;
            text-align: center;
            /* background-color: #aa3a40; */
        }

        .side-surat {
            position: fixed;
            left: -40px;
            top: -170px;
            text-align: center;
        }

        .content {
            margin-left: 30px !important;
        }

        .header-invoice {
            position: fixed;
            left: 0px;
            top: -150px;
            right: 0px;
            text-align: center;
            /* background-color: #aa3a40; */
        }

        .header-or {
            position: fixed;
            left: 0px;
            top: -140px;
            right: 0px;
            text-align: center;
            /* background-color: #aa3a40; */
        }

        #footer {
            position: fixed;
            left: 0px;
            bottom: -170px;
            right: 0px;
        }

        #footer .page:after {
            content: counter(page);
        }

        .page_break {
            page-break-before: always;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .mb-1 {
            margin-bottom: 1rem !important;
        }

        .mb-2 {
            margin-bottom: 1.5rem !important;
        }

        p {
            margin: 3px 0 3px 0 !important;
            padding: 0px !important;
            font-size: 11px;
            line-height: 10px;
        }

        .surat {
            font-size: 14px;
            line-height: 20px !important;
            font-family: serif !important;
        }

        .alinea {
            text-align: justify;
            text-justify: inter-word;
            text-indent: 1.5cm;
        }

        ol>li {
            margin: 3px 0 3px 0 !important;
            padding: 0px !important;
            font-size: 14px;
            line-height: 20px !important;
            font-family: serif !important;
        }
    </style>
</head>

<body>
    {{-- SURAT PENGANTAR --}}
    <div class="" id="surat">
        <div class="header-surat">
            <img src="{{ asset('assets/atas.jpg') }}" alt="Logo" class="mb-0" width="100%">
        </div>
        <div class="side-surat">
            <img src="{{ asset('assets/img/side-border.jpg') }}" alt="Logo" class="mb-0" width="35"
                height="1200">
        </div>
        <div id="footer">
            <img src="{{ asset('assets/bawah.jpg') }}" width="95%">
        </div>
        <div class="content">
            <table class="table table-borderless table-sm surat" style="margin-left: -5px !important;">
                <tbody>
                    <tr>
                        <th style="font-size: 14px;">Nomor</th>
                        <th style="font-size: 14px;">:</th>
                        <td style="font-size: 14px;">{{ $data->no_surat }}</td>
                    </tr>
                    <tr>
                        <th style="font-size: 14px;">Lampiran</th>
                        <th style="font-size: 14px;">:</th>
                        <td style="font-size: 14px;">1 (Satu) berkas</td>
                    </tr>
                    <tr>
                        <th style="font-size: 14px;">Perihal</th>
                        <th style="font-size: 14px;">:</th>
                        <td style="font-size: 14px;">Permohonan Pembayaran Jasa Paket Pekerjaan Outsourcing Periode
                            {{ BulanTahun($data->tgl_terbit_inv) }}</td>
                    </tr>
                </tbody>
            </table>
            <p class="surat">Kepada Yth,</p>
            <p class="surat"><b>{{ $data->contract->project->nama }}</b></p>
            <p class="surat">{{ $data->contract->project->alamat }}</p>
            <p class="surat">{{ $data->contract->project->alamat2 }}</p>
            <p class="surat">di</p>
            <p class="surat" style="text-indent: 1cm;">Tempat</p>
            <br>
            <p class="surat">Dengan hormat,</p>
            <p class="surat" style="text-align: justify; text-justify: inter-word; text-indent: 1.5cm;">Menunjuk
                Perjanjian Jasa
                Oursourcing antara <b>{{ $data->contract->project->nama }}</b> dan
                <b>{{ $data->contract->project->idvendor->nama_pt }}</b>. Berdasarkan
                dengan Penyediaan Jasa Paket Pekerjaan
                Outsourcing, maka kami mengajukan penagihan pembayaran sebesar <b>{{ rupiah($data->nominal) }}
                    {{ '(' . terbilang($data->nominal) . ')' }}</b> sudah
                termasuk
                PPn
                11%.
                Kami mohon agar pembayaran tersebut dapat ditransfer ke Rekening kami di
                <b>{{ $data->contract->project->idvendor->nama_bank }} dengan No Rek.
                    {{ $data->contract->project->idvendor->no_rek }}</b> atas nama
                <b>{{ $data->contract->project->idvendor->nama_pt }}</b>.
            </p>
            <p class="surat" style="text-align: justify; text-justify: inter-word; text-indent: 1.5cm;">Sebagai
                kelengkapan administrasi berikut kami lampirkan:
            </p>
            <ol style="list-style-type: lower-alpha; margin-left: 1cm">
                <li>Berita Acara.</li>
                <li>Invoice Tagihan.</li>
                <li>Kwitansi Tagihan.</li>
                <li>Faktur Pajak.</li>
            </ol>
            <p class="surat alinea">
                Demikian surat permohonan ini kami sampaikan. Atas kerjasamanya yang baik, kami ucapkan terima kasih.
            </p>
            <br />
            <p class="surat">Denpasar, {{ tglIndo4($data->terbit) }}</p>
            <h5 class="surat">
                <b>{{ $data->contract->project->idvendor->nama_pt }}</b>
            </h5>
            <br />
            <br />
            <br />
            <h5 class="surat">
                <b style="text-decoration: underline;">
                    @if($data->contract->project->idvendor->kode_pt == 'air')
                        Putu Gede Indra P, S.H.
                    @else
                        Putu Swesty Prahayani, SE. Ak.
                    @endif
                </b>
            </h5>
            <p class="surat">
                Direktur Utama
            </p>
        </div>
    </div>
</body>

</html>
