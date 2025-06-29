@extends('layout.main')
@section('main-contents')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Aspek</p>
                                    <h4 class="card-title">{{ $aspek }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-file-signature"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Indikator</p>
                                    <h4 class="card-title">{{ $indikator }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Penilaian SPBE</p>
                                    <h4 class="card-title">{{ $apkSPBE }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Karyawan</p>
                                    <h4 class="card-title">{{ $karyawan }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Level Kematangan Saat Ini -->
            <div class="col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body text-center">
                        <p class="card-category">Level Kematangan Saat Ini ({{ $latestYear }})</p>
                        <h4 class="card-title">{{ $levelKematanganSaatIni }}</h4>
                    </div>
                </div>
            </div>

            <!-- Nilai Diharapkan -->
            <div class="col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body text-center">
                        <p class="card-category">Tingkat Kematangan Diharapkan</p>
                        <h4 class="card-title">{{ number_format($kematanganDiharapkan, 2) }}</h4>
                    </div>
                </div>
            </div>

            <!-- Selisih Level -->
            <div class="col-md-4">
                <div class="card card-stats card-round">
                    <div class="card-body text-center">
                        <p class="card-category">Selisih Level dengan Target (5)</p>
                        <h4 class="card-title">
                            {{ $selisihLevel }}
                            {!! $selisihLevel > 0
                                ? '<span class="text-danger">(Belum tercapai)</span>'
                                : '<span class="text-success">(Tercapai)</span>' !!}
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Grafik Kematangan -->
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Grafik Tingkat Kematangan SPBE per Tahun</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="kematanganChart" height="90"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('kematanganChart').getContext('2d');

        const dataTahun = {!! json_encode($grafikData->pluck('tahun')) !!};
        const dataLevelAngka = {!! json_encode($grafikData->pluck('level_kematangan_angka')) !!};
        const dataLevelString = {!! json_encode($grafikData->pluck('level_kematangan')) !!};


        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dataTahun,
                datasets: [{
                    label: 'Level Kematangan',
                    data: dataLevelAngka, // tinggi batang dari level angka
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderRadius: 5
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            afterLabel: function(context) {
                                const index = context.dataIndex;
                                return 'Level: ' + dataLevelString[index];
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1,
                        max: 5,
                        title: {
                            display: true,
                            text: 'Level Kematangan'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun Penilaian'
                        }
                    }
                }
            }
        });
    </script>
@endsection
