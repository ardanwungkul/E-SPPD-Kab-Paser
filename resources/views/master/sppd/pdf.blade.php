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
        <table style="width: 100%; border-bottom: solid 2.2pt #000;">
            <tr>
                <td>

                    @if ($sppd->spt->is_dprd)
                        <img style="width: 70px;"
                            src="{{ 
                                $kop_surat->dprd_logo && file_exists(public_path($kop_surat->dprd_logo))
                                ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path($kop_surat->dprd_logo)))
                                : 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('assets/images/logo-ppu.png')))
                            }}"
                            class="w-full h-28 object-cover" />
                    @else
                        <img style="width: 70px;"
                            src="{{ 
                                $kop_surat->setwan_logo && file_exists(public_path($kop_surat->setwan_logo))
                                ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path($kop_surat->setwan_logo)))
                                : 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('assets/images/logo-ppu.png')))
                            }}"
                            class="w-full h-28 object-cover" />
                    @endif

                </td>
                <td style="text-align: center;">
                    <h3 class="text-black tracking-tight">
                        {{ $sppd->spt->is_dprd ? $kop_surat->dprd_header_1 : $kop_surat->setwan_header_1 }}
                    </h3>
                    <h3 class="text-black">
                        {{ $sppd->spt->is_dprd ? $kop_surat->dprd_header_2 : $kop_surat->setwan_header_2 }}
                    </h3>
                    <p style="font-size: 11pt;">
                        {{ $sppd->spt->is_dprd ? $kop_surat->dprd_header_3 : $kop_surat->setwan_header_3 }}</p>
                    <h3 class="text-black tracking-tight">
                        {{ $sppd->spt->is_dprd ? $kop_surat->dprd_header_4 : $kop_surat->setwan_header_4 }}
                    </h3>
                </td>
            </tr>
        </table>


        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td width="50%"></td>
                <td style="white-space: nowrap;">Lembar ke</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td style="white-space: nowrap;">Kode No.</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Nomor</td>
                <td>:</td>
                <td style="white-space: nowrap;">{{ $sppd->format_sppd }}</td>
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
                    {{ in_array($sppd->spt->pegawai->first()->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }} Pegawai
                    yang melaksanakan perjalanan dinas</td>
                <td colspan="2">
                    {{ $sppd->spt->pegawai->first()->nama }}<br>
                    {{ $sppd->spt->pegawai->first()->nip }}
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
                    <span width="16px">a.</span> {{ $sppd->spt->pegawai->first()->pangkat->uraian }}
                    -{{ $sppd->spt->pegawai->first()->pangkat->kdgol }}<br>
                    <span width="16px">b.</span> {{ $sppd->spt->pegawai->first()->jabatan }}<br>
                    <span width="16px">c.</span> {{ $sppd->spt->pegawai->first()->tingkat->uraian }}
                </td>
            </tr>

            <tr>
                <td class="no">4</td>
                <td class="label">Maksud Perjalanan Dinas</td>
                <td colspan="2">
                    @foreach ($sppd->spt->untuk as $item)
                        {{ $loop->iteration > 1 ? '<br>' : '' }}
                        <p>{{ $sppd->spt->untuk->count() > 1 ? $loop->iteration . '.' : '' }} {{ $item->untuk_ket }}
                        </p>
                    @endforeach
                </td>
            </tr>

            <tr>
                <td class="no">5</td>
                <td class="label">Alat Angkut yang dipergunakan</td>
                <td colspan="2">{{ $sppd->angkutan }}</td>
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
                    @foreach ($sppd->spt->tujuan as $tujuan)
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
                    <span width="16px">a.</span> {{ $sppd->spt->jmlhari }} ({{ $sppd->spt->jmlbahasa }})
                    hari<br>
                    <span width="16px">b.</span> {{ $sppd->spt->tglbrkt }}<br>
                    <span width="16px">c.</span> {{ $sppd->spt->tglbalik }}
                </td>
            </tr>

            <tr>
                <td class="no" rowspan="{{ $sppd->spt->pegawai->count() }}">8</td>
                <td>Pengikut : Nama</td>
                <td>NIP/NIK</td>
                <td>Keterangan</td>
            </tr>

            @foreach ($sppd->spt->pegawai->skip(1) as $item)
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
                    <span width="16px">c.</span> {{ $sppd->kd_rek == '' ? '-' : $sppd->kd_rek }}
                </td>
            </tr>

            <tr>
                <td class="no">10</td>
                <td class="label">Keterangan lain-lain</td>
                <td colspan="2">{{ $sppd->keterangan == '' ? '-' : $sppd->keterangan }}</td>
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
                    {{ $sppd->spt->tglspt }}
                </td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" style="text-align: left; font-weight : bold">{{ $sppd->spt->ub->jabatan }},</td>
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
                    <p style="font-weight: bold">{{ $sppd->spt->ub->nama }}</p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" style="text-align: left;">
                    {{ in_array($sppd->spt->ub->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }}.
                    {{ $sppd->spt->ub->nip }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
