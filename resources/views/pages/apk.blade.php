@extends('layout.main')
@section('main-contents')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Proses COBIT</h3>
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
                    <a href="/dashboard">Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Manajemen Aplikasi SPBE</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addAplikasiModal">
                                <i class="fa fa-plus"></i> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped table-hover text-center">
                                <thead style="text-transform: none;" class="text-lowercase">
                                    <tr>
                                        <th style="width: 3%">No</th>
                                        <th style="width: 12%">SPBE</th>
                                        <th style="width: 18%">Tingkat Kematangan</th>
                                        <th style="width: 15%">Level Kematangan</th>
                                        <th style="width: 18%">Deskripsi</th>
                                        <th style="width: 18%">Tahun Penilaian</th>
                                        <th style="width: 0%">Laporan</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($aplikasis as $apk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $apk->nama_aplikasi }}</td>
                                            <td>
                                                @if ($apk->hasil_kematangan !== null)
                                                    {{ $apk->hasil_kematangan }}%
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $apk->level_kematangan }}</td>
                                            <td>{{ $apk->deskripsi }}</td>
                                            <td>{{ \Carbon\Carbon::parse($apk->updated_at)->format('Y') }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    {{-- <button type="button" data-bs-toggle="tooltip" title="Laporan"
                                                        class="btn btn-link btn-info btn-lg">
                                                        <i class="fa fa-file"></i>
                                                    </button> --}}
                                                    <a href="{{ url("/Prosescobit/laporanKematangan/pdf/$apk->id") }}"
                                                        class="btn btn-link btn-info btn-lg" target="_blank"
                                                        title="Laporan">
                                                        <i class="fa fa-file"></i>
                                                    </a>
                                                </div>


                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    {{-- <button type="button" data-bs-toggle="modal" title="Penilaian"
                                                        class="btn btn-link btn-warning">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button> --}}
                                                    <a href="{{ route('penilaian.index', $apk->id) }}"
                                                        class="btn btn-link btn-warning" title="Penilaian">
                                                        <i class="fa fa-info-circle"></i>
                                                    </a>
                                                    <button data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $apk->id }}" title="Edit"
                                                        class="btn btn-link btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $apk->id }}" title="Hapus"
                                                        class="btn btn-link btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $apk->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold" id="editModalLabel">
                                                            <i class="fas fa-pencil-alt"></i> Edit Aplikasi
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('aplikasi.update', $apk->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label">Nama Aplikasi</label>
                                                                <input type="text" name="nama_aplikasi"
                                                                    class="form-control" value="{{ $apk->nama_aplikasi }}"
                                                                    required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea name="deskripsi" class="form-control" required>{{ $apk->deskripsi }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan
                                                                Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deleteModal{{ $apk->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus <b>{{ $apk->nama_aplikasi }}</b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('aplikasi.destroy', $apk->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="addAplikasiModal" tabindex="-1" role="dialog" aria-labelledby="addAplikasiLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="addAplikasiLabel fw-bold">
                        <i class="fa fa-plus"></i> Tambah Aplikasi SPBE
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('aplikasi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_aplikasi">Nama Aplikasi</label>
                            <input type="text" class="form-control" id="nama_aplikasi" name="nama_aplikasi" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
