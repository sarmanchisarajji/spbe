<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .kop {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .kop .logo {
            width: 80px;
            height: 80px;
        }

        .kop .text {
            flex: 1;
            text-align: center;
            font-size: 14px;
        }

        .kop .text h2,
        .kop .text h3,
        .kop .text p {
            margin: 0;
            line-height: 1.4;
        }

        hr {
            border: 2px solid black;
            margin: 5px 0 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h4 {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    {{-- Kop Surat --}}
    <div class="kop">
        <img src="{{ public_path('assets/img/logo-removebg-preview.png') }}" class="logo" alt="Logo">
        <div class="text">
            <h2>PEMERINTAH KOTA KENDARI</h2>
            <h3>Dinas Komunikasi dan Informatika</h3>
            <p>Jl. Banteng No. 15, Kendari - Sulawesi Tenggara | Telp. (0401) 123456</p>
        </div>
    </div>
    <hr>

    <h4 style="text-align:center;">LAPORAN PENILAIAN APLIKASI SPBE</h4><br>

    <p><strong>Nama Aplikasi:</strong> {{ $evaluasi->nama_aplikasi }}</p>
    <p><strong>Tingkat Kematangan:</strong> {{ $evaluasi->tingkat_kematangan }}%</p>
    <p><strong>Level Kematangan:</strong> {{ $evaluasi->level_kematangan }}</p>
    <p><strong>Deskripsi:</strong> {{ $evaluasi->deskripsi }}</p>
    <br>

    @foreach ($groupedCobits as $indikator => $cobits)
        <h4>Indikator: {{ $indikator }}</h4>
        <table>
            <thead>
                <tr>
                    <th>Pertanyaan</th>
                    <th>Level</th>
                    <th>Ada</th>
                    <th>Nilai</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cobits as $cobit)
                    <tr>
                        <td>{{ $cobit->pertanyaan->pertanyaan ?? '-' }}</td>
                        <td>{{ $cobit->pertanyaan->level ?? '-' }}</td>
                        <td>{{ $cobit->ada }}</td>
                        <td>{{ $cobit->nilai }}</td>
                        <td>{{ $cobit->catatan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

</body>

</html>
