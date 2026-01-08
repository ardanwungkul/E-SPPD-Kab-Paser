<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        @font-face {
            font-family: 'Times New Roman';
            src: url('{{ storage_path('fonts/times new roman.ttf') }}') format('truetype');
        }

        html {
            margin: 25px 57px;
        }

        .container_spt {
            font-family: sans-serif;
            font-size: 14px;
            width: 100%;
            color: #333333;
        }

        .container_spt h3,
        .container_spt h2,
        .container_spt p {
            margin: 0;
        }

        .text-black {
            color: black;
        }

        .tracking-tight {
            letter-spacing: -0.025em;
        }

        .sppd-table {
            width: 100%;
            border-collapse: collapse;
        }

        .sppd-table td,
        .sppd-table th {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }

        .no {
            width: 4%;
            text-align: center;
        }

        .label {
            width: 36%;
        }

        .no-padding {
            padding: 0;
        }

        /* Inner table (Pengikut) */
        .inner-table {
            width: 100%;
            border-collapse: collapse;
        }

        .inner-table th,
        .inner-table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        .inner-table th {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container_spt">
        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td rowspan="2" width="25%">
                    <h3>KWITANSI DINAS</h3>
                </td>
                <td style="white-space: nowrap;">
                    <h1 style="margin : 0"><u class="text-black">Surat Bukti</u></h1>
                </td>
                <td style="white-space: nowrap;">Mata Anggaran</td>
                <td width="12px">:</td>
                <td>{{ $rincianBiaya->sppd->kd_rek }}</td>
            </tr>
            <tr>
                <td style="white-space: nowrap;">Nomor : {{ $rincianBiaya->format_kwitansi }}</td>
                <td style="white-space: nowrap;">Tahun Anggaran</td>
                <td>:</td>
                <td>{{ $rincianBiaya->tahun }}</td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td width="25%">Sudah terima dari</td>
                <td width="12px">:</td>
                <td>Bendahara Pengeluaran Badan Keuangan dan Aset Daerah Kab. PPU</td>
            </tr>
            <tr>
                <td>Banyaknya uang</td>
                <td>:</td>
                <td style="padding:12px; border:5px double black; text-align:center;">
                    <h3><i>{{$rincianBiaya->totalbahasa}}</i></h3>
                </td>
            </tr>
            <tr>
                <td>Buat Bayar</td>
                <td>:</td>
                <td>Perjalanan Dinas {{ $rincianBiaya->sppd->spt->jenis_sppd->uraian }}</td>
            </tr>
            <tr>
                <td>No SPT</td>
                <td>:</td>
                <td>{{ $rincianBiaya->sppd->spt->format_spt }}</td>
            </tr>
            <tr>
                <td>No SPPD</td>
                <td>:</td>
                <td>{{ $rincianBiaya->sppd->format_sppd }}</td>
            </tr>
            <tr>
                <td>Tugas yang diberikan</td>
                <td>:</td>
                <td style="border: 2px solid black; padding:8px;">
                    {{ $rincianBiaya->sppd->spt->untuk->first()->untuk_ket }}</td>
            </tr>
            <tr>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px; border-bottom: 3px solid black">
            <tr>
                <td width="45%" rowspan="2"
                    style="font-size: 1.17em; padding:8px; font-weight:700; border:3px solid black;">
                    <table width="100%" style="border-collapse:collapse;">
                        <tr>
                            <td>Terbilang</td>
                            <td style="text-align:right;">
                                Rp.&nbsp;{{ number_format($rincianBiaya->total, 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </td>
                <td></td>
                <td width="35%">
                    <table width="100%" style="border-collapse:collapse;">
                        <tr>
                            <td>Penajam</td>
                            <td style="text-align: right">{{ $rincianBiaya->tahun }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align:center;">
                    Tanda Tangan Penerima
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td style="text-align: center; text-decoration: underline; font-weight:700;">
                    {{ $rincianBiaya->pegawai->nama }}
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px; border-bottom: 3px dashed black;">
            <tr>
                <td width="35%" style="text-align: center">Mengetahui/Menyetujui</td>
                <td></td>
                <td width="35%">
                    <table width="100%" style="border-collapse:collapse;">
                        <tr>
                            <td>Sudah dibayar pada</td>
                            <td style="text-align: right">{{ $rincianBiaya->tahun }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">Pejabat Pelaksana Teknis Kegiatan</td>
                <td></td>
                <td style="text-align: center">Bendahara Pengeluaran</td>
            </tr>
            <tr>
                <td colspan="3">
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td style="text-align: center; text-decoration: underline; font-weight:700;">
                    {{ $rincianBiaya->pelaksana->nama }}
                </td>
                <td></td>
                <td style="text-align: center; text-decoration: underline; font-weight:700;">
                    {{ $rincianBiaya->bendahara->nama }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    {{ in_array($rincianBiaya->pelaksana->jnspeg_id, [3, 4, 8]) ? 'NIP' : 'NIK' }}.
                    {{ $rincianBiaya->pelaksana->nip }}
                </td>
                <td></td>
                <td style="text-align: center;">
                    {{ in_array($rincianBiaya->bendahara->jnspeg_id, [3, 4, 8]) ? 'NIP' : 'NIK' }}.
                    {{ $rincianBiaya->bendahara->nip }}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">Setuju dibayar</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">Pengguna Anggaran</td>
            </tr>
            <tr>
                <td colspan="3">
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center; text-decoration: underline; font-weight:700;">
                    {{ $rincianBiaya->sppd->spt->ub->nama }}
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    {{ in_array($rincianBiaya->sppd->spt->ub->jnspeg_id, [3, 4, 8]) ? 'NIP' : 'NIK' }}.
                    {{ $rincianBiaya->sppd->spt->ub->nip }}
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px; border-collapse: collapse;">
            <tr>
                <td colspan="11"
                    style="border: 2px solid black; border-bottom:0; text-align: center; font-weight:700;">RINCIAN
                    PERJALANAN DINAS</td>
            </tr>
            <tr>
                <td colspan="11" style="border: 2px solid black; border-top:0; text-align: center;">TAHUN
                    {{ $rincianBiaya->tahun }}</td>
            </tr>
            <tr>
                <td colspan="2" style="border-left: 2px solid black; border-top: 2px solid black;">NAMA</td>
                <td width="20px" style="border-top: 2px solid black; text-align: center">:</td>
                <td colspan="8" style="font-weight: 700; border-top: 2px solid black; border-right:2px solid black">
                    {{ $rincianBiaya->pegawai->nama }}</td>
            </tr>
            <tr>
                <td colspan="2" style="border-left: 2px solid black;">NO. SPT</td>
                <td style="text-align: center">:</td>
                <td colspan="8" style="border-right: 2px solid black;">{{ $rincianBiaya->sppd->spt->format_spt }}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border-left: 2px solid black;">NO. SPPD</td>
                <td style="text-align: center">:</td>
                <td colspan="8" style="border-right: 2px solid black;">{{ $rincianBiaya->sppd->format_sppd }}</td>
            </tr>
            <tr>
                <td colspan="2" style="border-left: 2px solid black; border-bottom: 2px solid black;">Tujuan</td>
                <td style="border-bottom: 2px solid black; text-align: center">:</td>
                <td colspan="8" style="border-right: 2px solid black; border-bottom: 2px solid black;">
                    {{ $rincianBiaya->pegawai->nama }}</td>
            </tr>
            <tr>
                <td colspan="2" style="font-weight: 700; border-left: 2px solid black; border-top: 2px solid black;">
                    No. Kegiatan</td>
                <td style="border-top: 2px solid black; text-align: center">:</td>
                <td colspan="8" style="font-weight: 700; border-top: 2px solid black; border-right:2px solid black">
                    {{ $rincianBiaya->sppd->spt->sub_kegiatan->kdsub }}</td>
            </tr>
            <tr>
                <td colspan="2" style="font-weight: 700; border-left: 2px solid black;">No. Rek</td>
                <td style="text-align: center">:</td>
                <td colspan="8" style="font-weight: 700; border-right: 2px solid black;">
                    {{ $rincianBiaya->sppd->kd_rek }}</td>
            </tr>
            <tr>
                <td colspan="2"
                    style="font-weight: 700; border-left: 2px solid black; border-bottom: 2px solid black;">Kegiatan
                </td>
                <td style="border-bottom: 2px solid black; text-align: center">:</td>
                <td colspan="8"
                    style="font-weight: 700; border-right: 2px solid black; border-bottom: 2px solid black;">Perjalanan
                    Dinas {{ $rincianBiaya->sppd->spt->jenis_sppd->uraian }}</td>
            </tr>
            <tr>
                <td width="32px" style="border: 2px solid black; text-align: center; font-weight: 700;">No</td>
                <td colspan="8" style="border: 2px solid black; text-align: center; font-weight: 700;">Uraian</td>
                <td colspan="2" style="border: 2px solid black; text-align: center; font-weight: 700;">Jumlah</td>
            </tr>
            @foreach ($rincianBiaya->daftar as $item)
                <tr>
                    <td
                        style="text-align: center; border:2px solid black; border-top: 2px dashed black; {{ $loop->last ? '' : 'border-bottom: 0;' }}">
                        {{ $loop->iteration }}</td>
                    <td
                        style="border:2px solid black; border-top: 2px dashed black; {{ $loop->last ? '' : 'border-bottom: 0;' }}">
                        {{ $item->uraian }}</td>
                    <td
                        style="text-align: center; border:2px solid black; border-top: 2px dashed black; {{ $loop->last ? '' : 'border-bottom: 0;' }}">
                        :</td>
                    <td width="32px"
                        style="text-align:center; border-top: 2px dashed black; {{ $loop->last ? 'border-bottom: 2px solid black' : 'border-bottom: 0;' }}">
                        {{ $item->jml_satuan }}</td>
                    <td
                        style="border-top: 2px dashed black; {{ $loop->last ? 'border-bottom: 2px solid black' : 'border-bottom: 0;' }}">
                        {{ $item->jns_satuan }}</td>
                    <td
                        style="border-top: 2px dashed black; {{ $loop->last ? 'border-bottom: 2px solid black' : 'border-bottom: 0;' }}">
                        X</td>
                    <td
                        style="border-top: 2px dashed black; {{ $loop->last ? 'border-bottom: 2px solid black' : 'border-bottom: 0;' }}">
                        Rp. </td>
                    <td
                        style="border-top: 2px dashed black; {{ $loop->last ? 'border-bottom: 2px solid black' : 'border-bottom: 0;' }}">
                        {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td width="32px"
                        style="border-top: 2px dashed black; {{ $loop->last ? 'border-bottom: 2px solid black' : 'border-bottom: 0;' }}">
                        =</td>
                    <td
                        style="border-top: 2px dashed black; border-left: 2px solid black; {{ $loop->last ? 'border-bottom: 2px solid black' : 'border-bottom: 0;' }}">
                        Rp.</td>
                    <td
                        style="text-align: right; border-top: 2px dashed black; border-right: 2px solid black; {{ $loop->last ? 'border-bottom: 2px solid black' : 'border-bottom: 0;' }}">
                        {{ number_format($item->jml_harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5"></td>
                <td colspan="4"
                    style="text-align: center; border: 2px solid black; letter-spacing: 3px; font-weight: 700;">Jumlah
                </td>
                <td style="font-weight: 700; border: 2px solid black; border-right: 0;">Rp.</td>
                <td style="font-weight: 700; text-align:right; border: 2px solid black; border-left: 0;">{{ number_format($rincianBiaya->total, 0, ',', '.') }}</td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td></td>
                <td width="35%" style="text-align: center; font-weight:700;">Pembuat Rincian</td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center; text-decoration: underline; font-weight:700;">
                    {{ $rincianBiaya->pembuat->nama }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;">
                    {{ in_array($rincianBiaya->pembuat->jnspeg_id, [3, 4, 8]) ? 'NIP' : 'NIK' }}.
                    {{ $rincianBiaya->pembuat->nip }}
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
