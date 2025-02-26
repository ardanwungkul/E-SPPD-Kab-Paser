<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        body {
            font-family: "Poppins", Georgia, Serif;
        }

        .container {
            width: 100%;
        }

        .container .isi p {
            line-height: 28px;
            text-align: justify;
            font-size: 10pt;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 style="text-align:center;">NOTA DINAS</h2>
        <table style="border-bottom: 1pt solid #000000; width: 100%;">
            <tr>
                <td style="width: 100px; vertical-align: top; font-size: 10pt;line-height: 30px;">KEPADA</td>
                <td style="width: 20px; vertical-align: top; font-size: 10pt;line-height: 30px;">:</td>
                <td style="vertical-align: top; font-size: 10pt;line-height: 30px;">
                    {{ strtoupper($nota_dinas->kepada->jabatan) }}
                </td>
            </tr>
            <tr>
                <td style="width: 100px; vertical-align: top; font-size: 10pt;line-height: 30px;">MELALUI</td>
                <td style="width: 20px; vertical-align: top; font-size: 10pt;line-height: 30px;">:</td>
                <td style="vertical-align: top; font-size: 10pt;line-height: 30px;"></td>
            </tr>
            <tr>
                <td style="width: 100px; vertical-align: top; font-size: 10pt;line-height: 30px;">DARI</td>
                <td style="width: 20px; vertical-align: top; font-size: 10pt;line-height: 30px;">:</td>
                <td style="vertical-align: top; font-size: 10pt;line-height: 30px;">
                    {{ strtoupper($nota_dinas->dari->jabatan) }}
                </td>
            </tr>
            <tr>
                <td style="width: 100px; vertical-align: top; font-size: 10pt;line-height: 30px;">TANGGAL</td>
                <td style="width: 20px; vertical-align: top; font-size: 10pt;line-height: 30px;">:</td>
                <td style="vertical-align: top; font-size: 10pt;line-height: 30px;">
                    {{ strtoupper(\Carbon\Carbon::parse($nota_dinas->tanggal)->format('d M Y')) }}
                </td>
            </tr>
            <tr>
                <td style="width: 100px; vertical-align: top; font-size: 10pt;line-height: 30px;">NOMOR</td>
                <td style="width: 20px; vertical-align: top; font-size: 10pt;line-height: 30px;">:</td>
                <td style="vertical-align: top; font-size: 10pt; line-height: 30px;">{{ $nota_dinas->nomor }}</td>
            </tr>
            <tr>
                <td style="width: 100px; vertical-align: top; font-size: 10pt;line-height: 30px;">PERIHAL</td>
                <td style="width: 20px; vertical-align: top; font-size: 10pt;line-height: 30px;">:</td>
                <td style="vertical-align: top; font-size: 10pt;line-height: 30px;">{{ $nota_dinas->perihal }}
                </td>
            </tr>
        </table>
        <div class="isi" style="padding: 20px 0">
            {!! $nota_dinas->isi !!}
        </div>
        <table style="width:100%; margin-top: 50px;">
            <tr>
                <td style="width: 70%;"></td>
                <td style="width: 30%; font-weight: bold; font-size: 10pt;">
                    {{ strtoupper($nota_dinas->dari->jabatan) }}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="height: 100px;"></td>
            </tr>
            <tr>
                <td style="width: 70%;"></td>
                <td style="width: 30%; font-weight: bold; border-bottom: solid 1pt #000000; font-size: 10pt;">
                    {{ strtoupper($nota_dinas->dari->nama) }}
                </td>
            </tr>
            <tr>
                <td style="width: 70%;"></td>
                <td style="width: 30%; font-size: 10pt;">NIP. {{ $nota_dinas->dari->nip }}</td>
            </tr>
        </table>
    </div>
</body>
