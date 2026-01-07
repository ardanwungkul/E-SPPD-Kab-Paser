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
            margin: 55px 57px;
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
            <colgroup>
                <col width="25%">
                <col width="12px">
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <tr>
                <td rowspan="2"><h3>KWITANSI DINAS</h3></td>
                <td colspan="2" style="white-space: nowrap;"><h1 style="margin : 0"><u class="text-black">Surat Bukti</u></h1></td>
                <td>Mata Anggaran</td>
                <td>:</td>
                <td>5.01.02.04.01.0001</td>
            </tr>
            <tr>
                <td colspan="2">Nomor : 0022/BKAD-GU/PPU/1/202</td>
                <td>Mata Anggaran</td>
                <td>:</td>
                <td>5.01.02.04.01.0001</td>
            </tr>
            <tr>
                <td>Sudah terima dari</td>
                <td>:</td>
                <td colspan="4">Bendahara Pengeluaran Badan Keuangan dan Aset Daerah Kab. PPU</td>
            </tr>
            <tr>
                <td>Banyaknya uang</td>
                <td>:</td>
                <td colspan="4" style="padding:12px; border:5px double black; text-align:center;"><h3>Satu Juta Tiga Ratus Dua Belas Ribu Seratus Rupiah</h3></td>
            </tr>
            <tr>
                <td>Buat Bayar</td>
                <td>:</td>
                <td colspan="4">Belanja Perjalanan Dinas Biasa (Luar Daerah Dalam Propinsi)</td>
            </tr>
            <tr>
                <td>No SPT</td>
                <td>:</td>
                <td colspan="4">{{$rincianBiaya->sppd->spt->format_spt}}</td>
            </tr>
            <tr>
                <td>No SPPD</td>
                <td>:</td>
                <td colspan="4">{{$rincianBiaya->sppd->format_sppd}}</td>
            </tr>
            <tr>
                <td>Tugas yang diberikan</td>
                <td>:</td>
                <td colspan="4">{{$rincianBiaya->sppd->spt->sub_kegiatan->uraian}}</td>
            </tr>
            <tr>
                <td>Terbilang</td>
            </tr>
            <tr>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td style="text-align: center;margin:0">
                    <h3><u class="text-black">SURAT PERJALANAN DINAS</u></h3>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px;" class="sppd-table">
            <tr>
                <td class="no">1</td>
                <td class="label">Pengguna Anggaran</td>
                <td colspan="2">Kepala Badan Keuangan dan Aset Daerah</td>
            </tr>

            <tr>
                <td class="no">2</td>
                <td class="label">Nama /
                    {{ in_array($rincianBiaya->sppd->spt->pegawai->first()->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }} Pegawai
                    yang melaksanakan perjalanan dinas</td>
                <td colspan="2">
                    {{ $rincianBiaya->sppd->spt->pegawai->first()->nama }}<br>
                    {{ $rincianBiaya->sppd->spt->pegawai->first()->nip }}
                </td>
            </tr>

            <tr>
                <td class="no">3</td>
                <td class="label">
                    <span width="16px">a.</span> Pangkat dan Golongan<br>
                    <span width="16px">b.</span> Jabatan<br>
                    <span width="16px">c.</span> Tingkat Biaya Perjalanan Dinas
                </td>
                <td colspan="2">
                    <span width="16px">a.</span> {{ $rincianBiaya->sppd->spt->pegawai->first()->pangkat->uraian }}
                    -{{ $rincianBiaya->sppd->spt->pegawai->first()->pangkat->kdgol }}<br>
                    <span width="16px">b.</span> {{ $rincianBiaya->sppd->spt->pegawai->first()->jabatan }}<br>
                    <span width="16px">c.</span> {{ $rincianBiaya->sppd->spt->pegawai->first()->tingkat->uraian }}
                </td>
            </tr>

            <tr>
                <td class="no">4</td>
                <td class="label">Maksud Perjalanan Dinas</td>
                <td colspan="2">
                    @foreach ($rincianBiaya->sppd->spt->untuk as $item)
                        {{ $loop->iteration > 1 ? '<br>' : '' }}
                        <p>{{ $rincianBiaya->sppd->spt->untuk->count() > 1 ? $loop->iteration . '.' : '' }} {{ $item->untuk_ket }}
                        </p>
                    @endforeach
                </td>
            </tr>

            <tr>
                <td class="no">5</td>
                <td class="label">Alat Angkut yang dipergunakan</td>
                <td colspan="2">{{ $rincianBiaya->sppd->angkutan }}</td>
            </tr>

            <tr>
                <td class="no">6</td>
                <td class="label">
                    <span width="16px">a.</span> Tempat berangkat<br>
                    <span width="16px">b.</span> Tempat tujuan
                </td>
                <td colspan="2">
                    <span width="16px">a.</span> Penajam<br>
                    <span width="16px">b.</span>
                    @foreach ($rincianBiaya->sppd->tujuan as $tujuan)
                        {{ $tujuan['provinsi_name'] ? Str::title(Str::lower($tujuan['provinsi_name'])) : '' }}{{ $tujuan['kabkota_name'] ? ', ' . Str::title(Str::lower($tujuan['kabkota_name'])) : '' }}{{ $tujuan['kecamatan_name'] ? ', ' . Str::title(Str::lower($tujuan['kecamatan_name'])) : '' }}
                    @endforeach
                </td>
            </tr>

            <tr>
                <td class="no">7</td>
                <td class="label">
                    <span width="16px">a.</span> Lamanya Perjalanan Dinas<br>
                    <span width="16px">b.</span> Tanggal berangkat<br>
                    <span width="16px">c.</span> Tanggal harus kembali
                </td>
                <td colspan="2">
                    <span width="16px">a.</span> {{ $rincianBiaya->sppd->spt->jmlhari }} ({{ $rincianBiaya->sppd->spt->jmlbahasa }})
                    hari<br>
                    <span width="16px">b.</span> {{ $rincianBiaya->sppd->spt->tglbrkt }}<br>
                    <span width="16px">c.</span> {{ $rincianBiaya->sppd->spt->tglbalik }}
                </td>
            </tr>

            <tr>
                <td class="no" rowspan="{{ $rincianBiaya->sppd->spt->pegawai->count() }}">8</td>
                <td>Pengikut : Nama</td>
                <td>NIP/NIK</td>
                <td>Keterangan</td>
            </tr>

            @foreach ($rincianBiaya->sppd->spt->pegawai->skip(1) as $item)
                <tr>
                    <td style="white-space: nowrap;">{{ $loop->iteration }}. {{ $item->nama }}</td>
                    <td style="white-space: nowrap;">
                        {{ in_array($item->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }} :
                        {{ $item->nip }}</td>
                    <td>
                        {{ $item->keterangan == '' ? '-' : $item->keterangan }}</td>
                </tr>
            @endforeach

            <tr>
                <td class="no">9</td>
                <td class="label">
                    <span width="16px">a.</span> Pembebanan Anggaran<br>
                    <span width="16px">b.</span> SKPD<br>
                    <span width="16px">c.</span> Kode Rekening
                </td>
                <td colspan="2">
                    <span width="16px">a.</span> DPA<br>
                    <span width="16px">b.</span> Badan Keuangan dan Aset Daerah<br>
                    <span width="16px">c.</span> {{ $rincianBiaya->sppd->kd_rek == '' ? '-' : $rincianBiaya->sppd->kd_rek }}
                </td>
            </tr>

            <tr>
                <td class="no">10</td>
                <td class="label">Keterangan lain-lain</td>
                <td colspan="2">{{ $rincianBiaya->sppd->keterangan == '' ? '-' : $rincianBiaya->sppd->keterangan }}</td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td width="65%"></td>
                <td width="90px" style="text-align: left; vertical-align: top; white-space: nowrap;" colspan="3">
                    Ditetapkan di Penajam Paser Utara</td>
            </tr>
            <tr>
                <td></td>
                <td width="90px" style="text-align: left; vertical-align:top; white-space: nowrap;" colspan="3">
                    Pada tanggal
                    {{ $rincianBiaya->sppd->spt->tglspt }}
                </td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" style="text-align: left; font-weight : bold">{{ $rincianBiaya->sppd->spt->ub->jabatan }},</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" style="text-align: left;font-weight: bold;">
                    <p style="font-weight: bold">{{ $rincianBiaya->sppd->spt->ub->nama }}</p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" style="text-align: left;">
                    {{ in_array($rincianBiaya->sppd->spt->ub->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }}.
                    {{ $rincianBiaya->sppd->spt->ub->nip }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
