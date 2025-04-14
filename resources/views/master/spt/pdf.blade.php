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
            font-family: "Times New Roman", Georgia, Serif;
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
                            src="{{ $kop_surat->dprd_logo && file_exists(public_path('storage/' . $kop_surat->dprd_logo))
                                ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('storage/' . $kop_surat->dprd_logo)))
                                : 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('assets/images/logo-ppu.png'))) }}"
                            class="w-full h-28 object-cover" />
                    @else
                        <img style="width: 70px;"
                            src="{{ $kop_surat->setwan_logo && file_exists(public_path('storage/' . $kop_surat->setwan_logo))
                                ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('storage/' . $kop_surat->setwan_logo)))
                                : 'data:image/jpeg;base64,' . base64_encode(file_get_contents(public_path('assets/images/logo-ppu.png'))) }}"
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


        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td style="text-align: center;margin:0">
                    <h3><u class="text-black">SURAT TUGAS</u></h3>
                    @php
                        $patch = explode('/', $spt->nomor);
                        $nomor_urut = $spt->nomor_urut;
                        $index = array_search($nomor_urut, $patch);
                    @endphp
                    <h4 style="font-weight: normal;margin:0">NO :
                        @foreach ($patch as $item)
                            <span style="margin: 0 1px !important">{{ $item }}</span>
                            @if (!$loop->last)
                                <span style="margin: 0 1px !important"> / </span>
                            @endif
                        @endforeach
                    </h4>

                </td>
            </tr>
        </table>

        <table style="width: 100%;margin:20px 0">
            @foreach ($spt->dasar as $dasar)
                <tr>
                    <td width="70px" style="vertical-align: top; font-weight: bold;">
                        {{ $loop->first ? 'DASAR' : '' }}</td>
                    <td width="20px" style="vertical-align: top; text-align: center; font-weight: bold;">
                        {{ $loop->first ? ':' : '' }}
                    </td>
                    <td width="20px" style="vertical-align: top; font-weight: bold;">{{ $loop->index + 1 }}.</td>
                    <td style="vertical-align: top;">{{ $dasar->uraian }}</td>
                </tr>
            @endforeach
        </table>

        <table style="width: 100%; margin: 0">
            <tr>
                <td style="text-align: center;">
                    <h4 style="font-weight: bold;">MEMERINTAHKAN :</h4>
                </td>
            </tr>
        </table>

        <table style="width: 100%;">
            @foreach ($spt->pegawai as $pegawai)
                <tr>
                    <td width="70px" style="vertical-align: top; font-weight: bold;">
                        {{ $loop->first ? 'KEPADA' : '' }}</td>
                    <td width="20px" style="vertical-align: top; text-align: center; font-weight: bold;">
                        {{ $loop->first ? ':' : '' }}
                    </td>
                    <td style="vertical-align: top;">
                        <table style="width: 100%;">
                            <tr>
                                <td width="10px" style="font-weight: bold;">{{ $loop->index + 1 }}.</td>
                                <td width="100px">Nama</td>
                                <td width="10px">:</td>
                                <td>{{ $pegawai->pegawai->nama }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Pangkat / Gol</td>
                                <td>:</td>
                                <td>{{ $pegawai->pegawai->pangkat ? $pegawai->pegawai->pangkat->uraian : '' }},
                                    {{ $pegawai->pegawai->pangkat ? $pegawai->pegawai->pangkat->kode_golongan : '' }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>NIP</td>
                                <td>:</td>
                                <td>{{ $pegawai->pegawai->nip }}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Jabatan</td>
                                <td>:</td>
                                <td>{{ $pegawai->pegawai->jabatan }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            @endforeach
        </table>

        <table style="width: 100%; margin-top: 20px;">
            @foreach ($spt->untuk as $untuk)
                <tr>
                    <td width="70px" style="vertical-align: top; font-weight: bold;">
                        {{ $loop->first ? 'UNTUK' : '' }}</td>
                    <td width="20px" style="vertical-align: top; text-align: center; font-weight: bold;">
                        {{ $loop->first ? ':' : '' }}
                    </td>
                    <td width="20px" style="vertical-align: top; font-weight: bold;">{{ $loop->index + 1 }}.</td>
                    <td style="vertical-align: top;">{{ $untuk->uraian }}</td>
                </tr>
            @endforeach
        </table>
        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td width="70px" style="vertical-align: top; font-weight: bold;">WAKTU</td>
                <td width="20px" style="vertical-align: top; text-align: center; font-weight: bold;">:</td>
                <td width="190px" style="vertical-align: top; font-weight: bold;">BERANGKAT TANGGAL</td>
                <td width="20px" style="vertical-align: top; text-align:center; font-weight: bold;">:</td>
                <td style="vertical-align: top;">
                    {{ \Carbon\Carbon::parse($spt->tanggal_berangkat)->locale('id')->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td width="70px" style="vertical-align: top; font-weight: bold;"></td>
                <td width="20px" style="vertical-align: top; text-align: center; font-weight: bold;"></td>
                <td width="190px" style="vertical-align: top; font-weight: bold;">KEMBALI TANGGAL</td>
                <td width="20px" style="vertical-align: top; text-align:center; font-weight: bold;">:</td>
                <td style="vertical-align: top;">
                    {{ \Carbon\Carbon::parse($spt->tanggal_kembali)->locale('id')->translatedFormat('d F Y') }}</td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td width="50%"></td>
                <td width="90px" style="text-align: left; vertical-align:top;">Ditetapkan di</td>
                <td width="20px" style="vertical-align: top; text-align:center; font-weight: bold;">:</td>
                <td style="text-align: left; vertical-align:top">{{ $spt->penandatangan_lokasi }} </td>
            </tr>
            <tr>
                <td></td>
                <td width="90px" style="text-align: left; vertical-align:top;">Pada tanggal</td>
                <td width="20px" style="vertical-align: top; text-align:center; font-weight: bold;">:</td>
                <td style="text-align: left; vertical-align:top">
                    {{ \Carbon\Carbon::parse($spt->penandatangan_tanggal)->locale('id')->translatedFormat('d F Y') }}
                </td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" style="text-align: center; font-weight : bold">{{ $spt->ub->jabatan }},</td>
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
                <td colspan="3" style="text-align: center;font-weight: bold;">
                    <p style="font-weight: bold">{{ $spt->ub->nama }}</p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3" style="text-align: center; font-weight :bold">NIP. {{ $spt->ub->nip }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
