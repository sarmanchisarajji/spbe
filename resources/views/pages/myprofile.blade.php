@extends('layout.main')

@section('main-contents')
    <div class="container mt-4">
        <div class="row">
            <!-- Foto Profil -->
            <div class="col-md-4 text-center">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ Auth::user()->foto ? asset(Auth::user()->foto) : asset('assets/img/profile.jpg') }}"
                            class="img-fluid rounded-circle mb-3" alt="Foto Profil" width="150" height="150"
                            style="object-fit: cover;">
                        <h6 class="text-dark fw-bold">{{ Auth::user()->nama_lengkap }}</h6>
                        <h6 class="text-muted fw-bold">{{ ucfirst(Auth::user()->role) }}</h6>
                        <form action="{{ route('fotoProfile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="foto" class="form-control mb-2" accept="image/*">
                            <button type="submit" class="btn btn-primary btn-sm">Update Foto</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Form Update Profil -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fw-bold text-primary">
                        <i class="fas fa-pencil-alt"></i> Update Profil
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dataProfile.update') }}" method="POST">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control"
                                    value="{{ Auth::user()->username }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control"
                                    value="{{ Auth::user()->nama_lengkap }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ Auth::user()->no_hp }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control">{{ Auth::user()->alamat }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">Update Profil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
