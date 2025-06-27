@extends('layout.main')
@section('main-contents')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Aspek & Indikator</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="/dashboard">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="/dashboard">Dashbaord</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Domain 4 - Layanan SPBE</div>
                    </div>
                    <div class="card-body">
                        <div class="card-sub">
                            <h3 class="text-center">
                                Aspek & Indikator Penilaian
                            </h3>
                        </div>
                        <table class="table table-bordered table-head-bg-info table-bordered-bd-info text-dark">
                            <thead class="text-center">
                                <tr>
                                    <th style="min-width: 250px">Aspek</th>
                                    <th style="min-width: 100px">Nama Indikator</th>
                                    <th style="min-width: 150px">Domain Cobit</th>
                                    <th style="min-width: 100px">Nama Cobit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aspekIndikators as $namaAspek => $indikators)
                                    @php
                                        $rowspan = $indikators->count();
                                    @endphp
                                    @foreach ($indikators as $index => $indikator)
                                        <tr>
                                            @if ($index === 0)
                                                <td class="text-nowrap" rowspan="{{ $rowspan }}">
                                                    {{ $indikator->aspek->nama_aspek }}</td>
                                            @endif
                                            <td class="text-nowrap">{{ $indikator->nama_indikator }}</td>
                                            <td class="text-nowrap">{{ $indikator->domain_cobit }}</td>
                                            <td>{{ $indikator->nama_cobit }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
