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
    </style>
</head>

<body>
    <div class="container_spt">
        <table style="width: 100%; border-bottom: solid 2.2pt #000;">
            <tr>
                <td>

                    @if ($spt->is_dprd)
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
                        {{ $spt->is_dprd ? $kop_surat->dprd_header_1 : $kop_surat->setwan_header_1 }}
                    </h3>
                    <h3 class="text-black">{{ $spt->is_dprd ? $kop_surat->dprd_header_2 : $kop_surat->setwan_header_2 }}
                    </h3>
                    <p style="font-size: 11pt;">
                        {{ $spt->is_dprd ? $kop_surat->dprd_header_3 : $kop_surat->setwan_header_3 }}</p>
                    <h3 class="text-black tracking-tight">
                        {{ $spt->is_dprd ? $kop_surat->dprd_header_4 : $kop_surat->setwan_header_4 }}
                    </h3>
                </td>
            </tr>
        </table>


        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td style="text-align: center;margin:0">
                    <h3><u class="text-black">SURAT TUGAS</u></h3>
                    <h4 style="font-weight: normal;margin:0">NO :
                        <span style="margin: 0 1px !important">{{ $spt->format_spt }}</span>
                    </h4>

                </td>
            </tr>
        </table>

        <table style="width: 100%;margin-top: 15px">
            @foreach ($spt->dasar as $dasar)
                <tr>
                    <td width="70px" style="vertical-align: top;">
                        {{ $loop->first ? 'Dasar' : '' }}</td>
                    <td width="20px" style="vertical-align: top; text-align: center;">
                        {{ $loop->first ? ':' : '' }}
                    </td>

                    @if ($spt->dasar->count() > 1)
                        <td width="20px" style="vertical-align: top;">
                            {{ $loop->index + 1 }}.
                        </td>
                    @endif

                    <td style="vertical-align: top;">
                        {{ $dasar->dasar_ket }}
                    </td>
                </tr>
            @endforeach
        </table>

        <table style="width: 100%; margin-top: 15px">
            <tr>
                <td style="text-align: center;">
                    <h4 style="font-weight: bold; margin: 0;">MEMERINTAHKAN :</h4>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px">
            @foreach ($spt->pegawai as $pegawai)
                <tr>
                    <td width="70px" style="vertical-align: top;">
                        {{ $loop->first ? 'Kepada' : '' }}</td>
                    <td width="20px" style="vertical-align: top; text-align: center;">
                        {{ $loop->first ? ':' : '' }}
                    </td>
                    <td style="width: 20px">{{ $loop->index + 1 }}.</td>
                    <td style="width: 130px">Nama</td>
                    <td style="width: 20px; vertical-align: top; text-align: center;">:</td>
                    <td>{{ $pegawai->nama }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="width: 20px"></td>
                    <td style="width: 130px">{{ in_array($pegawai->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }}
                    </td>
                    <td style="width: 20px; vertical-align: top; text-align: center;">:</td>
                    <td>{{ $pegawai->nip }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="width: 20px"></td>
                    <td style="width: 130px">Pangkat/gol.</td>
                    <td style="width: 20px; vertical-align: top; text-align: center;">:</td>
                    <td>{{ $pegawai->pangkat ? $pegawai->pangkat->uraian : '' }}/
                        {{ $pegawai->pangkat ? $pegawai->pangkat->kdgol : '' }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td style="width: 20px"></td>
                    <td style="width: 130px">Jabatan</td>
                    <td style="width: 20px; vertical-align: top; text-align: center;">:</td>
                    <td>{{ $pegawai->jabatan }}</td>
                </tr>
            @endforeach
        </table>

        <table style="width: 100%; margin-top: 15px;">
            @foreach ($spt->untuk as $untuk)
                <tr>
                    <td width="70px" style="vertical-align: top;">
                        {{ $loop->first ? 'Untuk' : '' }}</td>
                    <td width="20px" style="vertical-align: top; text-align: center;">
                        {{ $loop->first ? ':' : '' }}
                    </td>
                    @if ($spt->untuk->count() > 1)
                        <td width="20px" style="vertical-align: top;">{{ $loop->index + 1 }}.</td>
                    @endif
                    <td style="vertical-align: top;">{{ $untuk->untuk_ket }}</td>
                </tr>
            @endforeach
        </table>

        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td width="251px" style="vertical-align: top;">Tempat Berangkat</td>
                <td width="20px" style="vertical-align: top; text-align: center;">:</td>
                <td style="vertical-align: top;" colspan="2">Kalimantan Timur, Kabupaten Penajam Paser Utara</td>
            </tr>
            @foreach ($spt->tujuan as $tujuan)
                <tr>
                    <td width="251px" style="vertical-align: top;">{{ $loop->first ? 'Tempat Tujuan' : '' }}</td>
                    <td width="20px" style="vertical-align: top; text-align: center;">{{ $loop->first ? ':' : '' }}
                    </td>
                    @if (count($spt->tujuan) > 1)
                        <td width="20px" style="vertical-align: top; text-align: center;">{{ $loop->index + 1 }}.
                        </td>
                    @endif
                    <td style="vertical-align: top;">
                        {{ $tujuan['provinsi_name'] ? Str::title(Str::lower($tujuan['provinsi_name'])) : '' }}{{ $tujuan['kabkota_name'] ? ', ' . Str::title(Str::lower($tujuan['kabkota_name'])) : '' }}{{ $tujuan['kecamatan_name'] ? ', ' . Str::title(Str::lower($tujuan['kecamatan_name'])) : '' }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td width="251px" style="vertical-align: top;">Lamanya</td>
                <td width="20px" style="vertical-align: top; text-align: center;">:</td>
                <td style="vertical-align: top;" colspan="2">{{ $spt->jmlhari }} ({{ $spt->jmlbahasa }}) hari</td>
            </tr>
            <tr>
                <td width="251px" style="vertical-align: top;">Tanggal Berangkat</td>
                <td width="20px" style="vertical-align: top; text-align: center;">:</td>
                <td style="vertical-align: top;" colspan="2">
                    {{ \Carbon\Carbon::parse($spt->tglbrkt)->locale('id')->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td width="251px" style="vertical-align: top;">Tanggal Kembali</td>
                <td width="20px" style="vertical-align: top; text-align: center;">:</td>
                <td style="vertical-align: top;" colspan="2">
                    {{ \Carbon\Carbon::parse($spt->tglbalik)->locale('id')->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td width="251px" style="vertical-align: top;">Beban</td>
                <td width="20px" style="vertical-align: top; text-align: center;">:</td>
                <td style="vertical-align: top;" colspan="2">Badan Keuangan dan Aset Daerah</td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td>Setelah melaksanakan tugas agar membuat laporan.</td>
            </tr>
            <tr>
                <td>Demikian surat perintah tugas ini diberikan agar dipergunakan sebagaimana mestinya.
                <td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 15px;">
            <tr>
                <td width="65%"></td>
                <td width="90px" style="text-align: left; vertical-align: top; text-wrap: nowrap;" colspan="3">
                    Ditetapkan di Penajam Paser Utara</td>
            </tr>
            <tr>
                <td></td>
                <td width="90px" style="text-align: left; vertical-align:top; text-wrap: nowrap;" colspan="3">
                    Pada tanggal
                    {{ \Carbon\Carbon::parse($spt->penandatangan_tanggal)->locale('id')->translatedFormat('d F Y') }}
                </td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" style="text-align: left; font-weight : bold">{{ $spt->ub->jabatan }},</td>
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
                    <p style="font-weight: bold">{{ $spt->ub->nama }}</p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" style="text-align: left;">{{ in_array($pegawai->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }}. {{ $spt->ub->nip }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
