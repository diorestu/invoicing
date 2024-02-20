<!DOCTYPE html>
<html>

<head>
    <title>Contract Onboarding Letter</title>
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
            /* line-height: 1%; */
        }

        p {
            color: #343a40;
            font-size: 10px;
            font-weight: 400;
            margin: 0 !important;
            padding: 5px 1px 5px 1px !important;
            line-height: 10px !important;
        }

        h4 {
            color: #2b2d42;
            font-size: 18px;
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 0;
        }

        h5 {
            color: #2b2d42;
            font-size: 11px;
            margin-top: 0;
            margin-bottom: 0;
        }

        th,
        td {
            /* vertical-align: center; */
            padding: 0 2px 7px 7px !important;
            font-size: 12px;
        }

        #title {
            margin-bottom: 22px;
            margin-top: 0px;
        }
    </style>
    <style>
        @page {
            margin: 170px 40px;
        }

        #header {
            position: fixed;
            left: 0px;
            top: -145px;
            right: 0px;
            text-align: center;
            /* background-color: #aa3a40; */
        }

        #footer {
            position: fixed;
            left: 0px;
            bottom: -150px;
            right: 0px;
        }

        #footer .page:after {
            content: counter(page);
        }
    </style>
</head>

<body>
    <div id="header">
        <img src="{{ asset('assets/atastr.png') }}" width="100%">
    </div>
    <div id="footer">
        <img src="{{ asset('assets/bawatr.png') }}" width="90%">
    </div>
    <div id="content">
        <h4 class="text-center text-bold" style="margin-bottom: 30px;" id="title">ONBOARDING KONTRAK OUTSOURCING</h4>
        <table class="table" style="margin-bottom: 5px;">
            <thead class="" style="border-top: none; border-bottom: none;">
                <tr>
                    <td class="text-left" width="20%">
                        <h5>No. Kontrak</h5>
                    </td>
                    <td class="text-left">
                        <h5>: <strong>{{ $contract->no_kontrak_klien }}</strong></h5>
                    </td>
                    <td class="text-right">
                        <h5>Tanggal Kontrak : {{ tanggalIndo($contract->tgl_kontrak) }}</h5>
                    </td>
                </tr>
                <tr>
                    <td class="text-left">
                        <h5>No. Kontrak Internal</h5>
                    </td>
                    <td class="text-left" colspan="2">
                        <h5>: <strong>{{ $contract->no_kontrak_asta }}</strong></h5>
                    </td>
                </tr>
            </thead>
        </table>
        <table class="table table-striped table-sm table-bordered">
            <tbody>
                <tr>
                    <th colspan="2">Nama Klien</th>
                    <th colspan="2">{{ $contract->project->nama }}</th>
                </tr>
                <tr>
                    <th colspan="2">Jumlah SDM</th>
                    <td colspan="2">{{ $contract->jumlah_sdm }} orang</td>
                </tr>
                <tr>
                    <th colspan="2">Tipe Kontrak</th>
                    <td colspan="2">{{ strtoupper($contract->tipe) }}</td>
                </tr>
                <tr>
                    <th colspan="2">Jangka Waktu Kontrak</th>
                    <th colspan="2">{{ number_format($contract->lama_kontrak) }} Bulan</th>
                </tr>
                <tr>
                    <th colspan="2">Termin Pembayaran Tagihan</th>
                    <th colspan="2">{{ number_format($contract->term_of_payment) }} hari</th>
                </tr>
                <tr>
                    <th colspan="2">Nominal Kontrak</th>
                    <th colspan="2">
                        <b>Rp {{ number_format($contract->nominal_kontrak) }}</b>
                        <p><em>{{ ucwords(terbilang($contract->nominal_kontrak)) }} Rupiah</em>
                        </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="2">Nominal Tagihan Per Bulan</th>
                    <th colspan="2">
                        <b>Rp {{ number_format($contract->nominal_kontrak / $contract->lama_kontrak) }}</b>
                        <p><em>{{ ucwords(terbilang($contract->nominal_kontrak / $contract->lama_kontrak)) }}
                                Rupiah</em>
                        </p>
                    </th>
                </tr>
                <tr>
                    <th width="20%" class="text-wrap">Biaya Gaji</th>
                    <td class="text-wrap">{{ rupiah($contract->salary) }}
                    </td>
                    <th width="20%" class="text-wrap">Fee Management</th>
                    <td class="text-wrap">
                        {{ rupiah($contract->fee_management) }}</td>
                </tr>
                <tr>
                    <th class="text-wrap">BPJS Kesehatan</th>
                    <td class="text-wrap">{{ rupiah($contract->bpjs_kes) }}
                    </td>
                    <th class="text-wrap">BPJS Tenaga Kerja</th>
                    <td class="text-wrap">{{ rupiah($contract->bpjs_tk) }}
                    </td>
                </tr>
                <tr>
                    <th class="text-wrap">PPN</th>
                    <td class="text-wrap">{{ rupiah($contract->ppn) }}</td>
                    <th class="text-wrap">PPH</th>
                    <td class="text-wrap">{{ rupiah($contract->pph) }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <thead class="" style="border-top: none">
                <tr>
                    <td class="text-left">
                        <h5>Disetujui Oleh</h5>
                        <br />
                        <br />
                        <br />
                        <br />
                        <h5><b>Putu Swesty Prahayani, S.E., Ak.</b></h5>
                        <h5>Direktur Utama</h5>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</body>

</html>
