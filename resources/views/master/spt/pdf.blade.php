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
                    <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('assets/images/logo-ppu.png'))) }}"
                        style="width: 70px;">
                </td>
                <td style="text-align: center;">
                    <h3 class="text-black tracking-tight">
                        PROVINSI KALIMANTAN TIMUR
                    </h3>
                    <h2 class="text-black">SEKRETARIAT DAERAH</h2>
                    <p style="font-size: 11pt;">Jl. Gersamata No. 5 Lakudo, Kode Pos 93763</p>
                    <p style="font-size: 11pt;">
                        Telepon : 022 213455
                        Fax : 022 1234567
                        Email : instansi@gmail.com
                    </p>
                </td>
            </tr>
        </table>

        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td style="text-align: center;margin:0">
                    <h3><u class="text-black">SURAT PERINTAH TUGAS</u></h3>
                    <h4 style="font-weight: normal;margin:0">NOMOR : {{ $spt->nomor }}</h4>
                </td>
            </tr>
        </table>

        <table style="width: 100%;margin:20px 0">
            @foreach ($spt->dasar as $dasar)
                <tr>
                    <td width="70px" style="vertical-align: top;">{{ $loop->first ? 'Dasar' : '' }}</td>
                    <td width="20px" style="vertical-align: top; text-align: center;">{{ $loop->first ? ':' : '' }}
                    </td>
                    <td width="20px" style="vertical-align: top;">{{ $loop->index + 1 }}.</td>
                    <td style="vertical-align: top;">{{ $dasar->uraian }}</td>
                </tr>
            @endforeach
        </table>

        <table style="width: 100%; margin: 0">
            <tr>
                <td style="text-align: center;">
                    <h4 style="font-weight: normal;">MEMERINTAHKAN</h4>
                </td>
            </tr>
        </table>

        <table style="width: 100%;">
            @foreach ($spt->pegawai as $pegawai)
                <tr>
                    <td width="70px" style="vertical-align: top;">{{ $loop->first ? 'Kepada' : '' }}</td>
                    <td width="20px" style="vertical-align: top; text-align: center;">{{ $loop->first ? ':' : '' }}
                    </td>
                    <td style="vertical-align: top;">
                        <table style="width: 100%;">
                            <tr>
                                <td width="10px">{{ $loop->index + 1 }}.</td>
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
                                <td>{{ $pegawai->pegawai->jabatan ? $pegawai->pegawai->jabatan->uraian : '' }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            @endforeach
        </table>

        <table style="width: 100%; margin-top: 20px;">
            @foreach ($spt->untuk as $untuk)
                <tr>
                    <td width="70px" style="vertical-align: top;">{{ $loop->first ? 'Untuk' : '' }}</td>
                    <td width="20px" style="vertical-align: top; text-align: center;">{{ $loop->first ? ':' : '' }}
                    </td>
                    <td width="20px" style="vertical-align: top;">{{ $loop->index + 1 }}.</td>
                    <td style="vertical-align: top;">{{ $untuk->uraian }}</td>
                </tr>
            @endforeach

        </table>

        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td width="65%"></td>
                <td style="text-align: left;">Ditetapkan di {{ $spt->penandatangan_lokasi }} </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: left;">pada tanggal
                    {{ \Carbon\Carbon::parse($spt->penandatangan_tanggal)->format('d M Y') }}
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;">{{ $spt->ub->jabatan ? $spt->ub->jabatan->uraian : '' }}</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;font-weight: bold;">
                    <u>{{ $spt->ub->nama }}</u>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;">{{ $spt->ub->pangkat ? $spt->ub->pangkat->uraian : '' }},
                    {{ $spt->ub->pangkat ? $spt->ub->pangkat->kode_golongan : '' }}</td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;">NIP : {{ $spt->ub->nip }}</td>
            </tr>
        </table>
    </div>
</body>
