@extends('layout.main')
@section('main-contents')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Penialain Aplikasi ({{ $evaluasi->nama_aplikasi }}) </h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-item">
                    <a href="/Prosescobit">Proses COBIT</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-home">
                    <a href="/dashboard">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="/dashboard">
                        Dashboard
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div id="success-alert" class="alert alert-success alert-dismissible fade show text-success"
                        role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div id="error-alert" class="alert alert-danger alert-dismissible fade show text-danger" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <script>
                    setTimeout(() => {
                        document.querySelectorAll(".alert-dismissible").forEach(alert => {
                            alert.style.transition = "opacity 0.5s ease-out";
                            alert.style.opacity = "0";
                            setTimeout(() => {
                                alert.remove();
                            }, 500);
                        });
                    }, 3000);
                </script>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Penilaian Aplikasi ({{ $evaluasi->nama_aplikasi }})</h4>
                            <a href="/Prosescobit" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped table-hover">
                                <thead style="text-transform: none;" class="text-lowercase">
                                    <tr>
                                        <th style="width: 3%">No</th>
                                        <th style="width: 25%">Nama Indikator</th>
                                        <th style="width: 20%">Domain Cobit</th>
                                        <th style="width: 12%">Nama Cobit</th>
                                        <th style="width: 15%">Score PA</th>
                                        {{-- <th style="width: 18%">Tanggal Penilaian</th> --}}
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aplikasi as $apk)
                                        <tr>
                                            <td class="text-nowrap"> {{ $loop->iteration }}</td>
                                            <td class="text-nowrap"> {{ $apk->nama_indikator }}</td>
                                            <td class="text-nowrap"> {{ $apk->domain_cobit }}</td>
                                            <td class="text-nowrap"> {{ $apk->nama_cobit }}</td>
                                            <td>
                                                @if ($apk->hasil !== null)
                                                    {{ $apk->hasil }}%
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            {{-- <td>{{ \Carbon\Carbon::parse($apk->updated_at)->format('d-m-Y') }}</td> --}}
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('pertanyaan.index', [$evaluasi->id, $apk->id]) }}"
                                                        class="btn btn-link btn-primary" title="Penilaian">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="d-flex justify-content-end mt-3">
                                <form action="{{ route('hitung.kematangan', ['idAplikasi' => $aplikasi_id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-calculator"></i> Hitung Kematangan
                                    </button>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
