@extends('layout.main')

@section('main-contents')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Karyawan</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="/dashboard"><i class="icon-home"></i></a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="/dashboard">Dashboard</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4 class="card-title">Manajemen Data Karyawan</h4>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                            data-bs-target="#addKaryawanModal">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawans as $karyawan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($karyawan->foto)
                                                    <img src="{{ asset($karyawan->foto) }}" class="rounded-circle"
                                                        width="50" height="50">
                                                @else
                                                    {{-- <img src="{{ url('') }}/assets/img/profile.jpg" class="rounded-circle"
                                                        width="50" height="50"> --}}
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $karyawan->username }}</td>
                                            <td>{{ $karyawan->nama_lengkap }}</td>
                                            <td>{{ $karyawan->role }}</td>
                                            <td>{{ $karyawan->email }}</td>
                                            <td>{{ $karyawan->alamat }}</td>
                                            <td>{{ $karyawan->no_hp }}</td>
                                            <td>
                                                <button class="btn btn-link btn-primary" data-bs-toggle="modal"
                                                    title="Edit" data-bs-target="#editModal{{ $karyawan->id }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn btn-link btn-danger" data-bs-toggle="modal"
                                                    title="Hapus" data-bs-target="#deleteModal{{ $karyawan->id }}">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $karyawan->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Karyawan</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('user.update', $karyawan->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">Username</label>
                                                                <input type="text" class="form-control" id="username"
                                                                    name="username" value="{{ $karyawan->username }}"
                                                                    required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="nama_lengkap" class="form-label">Nama
                                                                    Lengkap</label>
                                                                <input type="text" class="form-control" id="nama_lengkap"
                                                                    name="nama_lengkap"
                                                                    value="{{ $karyawan->nama_lengkap }}" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email"
                                                                    name="email" value="{{ $karyawan->email }}" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="alamat" class="form-label">Alamat</label>
                                                                <textarea class="form-control" id="alamat" name="alamat">{{ $karyawan->alamat }}</textarea>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="no_hp" class="form-label">Nomor HP</label>
                                                                <input type="text" class="form-control" id="no_hp"
                                                                    name="no_hp" value="{{ $karyawan->no_hp }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="foto" class="form-label">Foto</label>
                                                                <input type="file" class="form-control" id="foto"
                                                                    name="foto" accept="image/*">
                                                                <small class="text-muted">Biarkan kosong jika tidak ingin
                                                                    mengubah foto.</small>
                                                                <br>
                                                                @if ($karyawan->foto)
                                                                    <img src="{{ asset($karyawan->foto) }}"
                                                                        class="mt-2 rounded-circle" width="50"
                                                                        height="50">
                                                                @endif
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="password" class="form-label">Password
                                                                    (Opsional)
                                                                </label>
                                                                <input type="password" class="form-control"
                                                                    id="password" name="password">
                                                                <small class="text-muted">Isi hanya jika ingin mengganti
                                                                    password.</small>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deleteModal{{ $karyawan->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin ingin menghapus
                                                        <b>{{ $karyawan->nama_lengkap }}</b>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('user.destroy', $karyawan->id) }}"
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
    <div class="modal fade" id="addKaryawanModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
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
