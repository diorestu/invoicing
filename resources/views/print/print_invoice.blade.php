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
            padding: 2px 5px 4px 5px !important;
            margin: 1px 2px 1px 5px !important;
            font-size: 11.5px;
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
    {{-- INVOICE --}}
    <div class="" id="invoice">
        <div class="header-invoice">
            <div>
                <div style="float: left; width: 25%;">
                    <img src="{{ asset('assets/img/logo_asta.jpg') }}" alt="Logo" class="mb-0"
                        width="80%">
                </div>
                <div style="margin-left: 35%; width: 65%;">
                    <div class="mb-xl-0 mb-2 text-end">
                        <table class="table table-bordered table-sm mb-3">
                            <tbody>
                                <tr>
                                    <td class="text-start">Doc. No.</td>
                                    <td class="text-start">ASTA-SPT-KEU-P01-F03</td>
                                </tr>
                                <tr>
                                    <td class="text-start">Revisi</td>
                                    <td class="text-start">00</td>
                                </tr>
                                <tr>
                                    <td class="text-start">Tgl. Terbit</td>
                                    <td class="text-start">{{ tglIndo2($data->tgl_terbit) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br />
            <br />
            <h2 style="margin-top: 0 !important"><b>INVOICE</b></h2>

        </div>
        <div id="footer">
            <img src="data:image/png;base64,{{ $qrcode }}" style="margin-left: 30px">
            <img src="{{ asset('assets/bawah.jpg') }}" width="95%">
        </div>
        <div class="content">
            <div class="mb-4">
                <div style="float: left; width: 45%;">
                    <h5>Kepada Yth.</h5>
                    <p><b>{{ $data->contract->project->nama }}</b></p>
                    <p>{{ $data->contract->project->alamat }}</p>
                    <p>{{ $data->contract->project->alamat2 }}</p>
                    <br />
                </div>
                <div style="margin-left: 55%; width: 45%;">
                    <table class="table table-borderless table-sm mb-3">
                        <tbody>
                            <tr>
                                <th class="text-start">Tanggal Invoice</th>
                                <td class="text-start">{{ tglIndo2($data->tgl_terbit_inv) }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">No. Kontrak</th>
                                <td class="text-start">{{ $data->contract->no_kontrak_asta }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">No. Invoice</th>
                                <td class="text-start">{{ $data->no_inv }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="margin-top: 10px; ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;background-color: #e0e1dd; color: #333; font-weight: 700"
                                width="5%">NO</td>
                            <td
                                style="vertical-align: middle; text-align: center;background-color: #e0e1dd; color: #333; font-weight: 700">
                                URAIAN</td>
                            <td style="vertical-align: middle; text-align: center;background-color: #e0e1dd; color: #333; font-weight: 700"
                                width="25%">TOTAL
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    @if($data->tampil_total_only)
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ $no = 1 }}</td>
                            <td>{{ $data->uraian }}</td>
                            <td class="text-nowrap text-end">{{ rupiah($data->nominal) }}</td>
                        </tr>
                    @else
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ $no = 1 }}</td>
                            <td>{{ buatNamaUraian($data->contract->id) }}</td>
                            <td class="text-nowrap text-end">{{ rupiah($data->nominal) }}</td>
                        </tr>
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ ++$no }}</td>
                            <td>Fee Management</td>
                            <td class="text-nowrap text-end">{{ rupiah($data->fee_manage) }}</td>
                        </tr>
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ ++$no }}</td>
                            <td>PPN 11%</td>
                            <td class="text-nowrap text-end">{{ rupiah($data->ppn) }}</td>
                        </tr>
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ ++$no }}</td>
                            <td>PPH 2%</td>
                            <td class="text-nowrap text-end">{{ rupiah($data->pph) }}</td>
                        </tr>
                    @endif
                        <tr>
                            <td colspan="2">
                                <p>Terbilang</p>
                                <small><em>{{ terbilang($data->nominal) }}</em></small>
                                <p>
                                    <img src="{{ asset('assets/img/'.$data->contract->project->idvendor->url_img) }}"
                                        width="45%" class="mb-2" />
                                </p>
                            </td>
                            <td><b>{{ rupiah($data->nominal) }}</b></td>
                        </tr>
                    </tbody>

                </table>
                <p><small>NB. Mohon untuk menambahkan keterangan periode pembayaran/no. invoice yang dibayar
                        saat proses transfer</small></p>
            </div>
            <br />
            <div>
                <div class="px-4 pt-3 mb-5">
                    <h5><b>{{ $data->contract->project->idvendor->nama_pt }}</b>
                    </h5>
                    <h5><b>Keuangan</b></h5>
                    <br />
                    <br />
                    <br />
                    <h5 class=""><b>Gusti Ayu Apriliani Swantari, S.M.</b></h5>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
