@extends('layout.main')
@section('main-contents')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3"> Evaluasi ({{ $indikator['nama_indikator'] }})</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                {{-- @if (session('success'))
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
                </script> --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Evaluasi ({{ $indikator['nama_indikator'] }})</h4>
                            <a href="{{ route('penilaian.index', ['id' => $evaluasi_id]) }}"
                                class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable1" class="display table table-striped table-hover">
                                <thead style="text-transform: none;" class="text-lowercase">
                                    <tr>
                                        <th style="width: 1%">No</th>
                                        <th style="width: 3%">Level</th>
                                        <th style="width: 15%">Atribut Proses</th>
                                        <th style="width: 15%">Pertanyaan</th>
                                        <th style="width: 2%">Jawaban</th>
                                        <th style="width: 2%">Keterangan</th>
                                        <th style="width: 10%">Bukti Pendukung</th>
                                        <th style="width: 3%">Score</th>
                                        <th style="width: 3%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pertanyaans as $item)
                                        @php
                                            $jawab = $jawaban[$item->id] ?? null;
                                            $levelDisabled = $item->level > $lastCompletedLevel + 1;
                                            $autoFillN =
                                                $disableFromLevel !== null && $item->level >= $disableFromLevel;
                                            $isDisabled = $levelDisabled || $autoFillN;
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>Level-{{ $item->level }}</td>
                                            <td>{{ $item->atribut_proses }}</td>
                                            <td>{{ $item->pertanyaan }}</td>
                                            <td>{{ $jawab->ada ?? '-' }}</td>
                                            <td>{{ $jawab->catatan ?? '-' }}</td>
                                            <td>
                                                @if (!empty($jawab->bukti_pendukung))
                                                    <a href="{{ asset('storage/' . $jawab->bukti_pendukung) }}"
                                                        target="_blank">Lihat Bukti</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $jawab->nilai ?? '-' }}</td>
                                            <td>
                                                @if (!$isDisabled)
                                                    <button class="btn btn-link btn-primary" data-bs-toggle="modal"
                                                        title="Edit" data-bs-target="#editModal{{ $item->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                @else
                                                    <span class="text-muted text-danger fw-bold">Terkunci</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('jawaban.update', $jawab->id ?? 0) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold">
                                                                <i class="fas fa-pencil-alt"></i> Edit Data
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <input type="hidden" name="evaluasi_id"
                                                                value="{{ $evaluasi_id }}">
                                                            <input type="hidden" name="indikator_id"
                                                                value="{{ $indikator['id'] }}">
                                                            <input type="hidden" name="pertanyaan_id"
                                                                value="{{ $item->id }}">

                                                            <div class="mb-3">
                                                                <label for="pertanyaan"
                                                                    class="form-label">Pertanyaan</label>
                                                                <input type="text" class="form-control" id="pertanyaan"
                                                                    value="{{ $item->pertanyaan ?? '' }}" disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="pertanyaan"
                                                                    class="form-label">Level</label>
                                                                <input type="text" class="form-control" id="level" name="level"
                                                                    value="{{ $item->level ?? '' }}" readonly>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="ada-{{ $item->id }}"
                                                                    class="form-label">Jawaban</label>
                                                                <select class="form-select ketersediaan-select"
                                                                    id="ada-{{ $item->id }}" name="ada"
                                                                    data-target="nilai-{{ $item->id }}"
                                                                    {{ $isDisabled ? 'disabled' : 'required' }}>
                                                                    <option value="">Pilih Jawaban</option>
                                                                    <option value="IYA"
                                                                        {{ ($jawab->ada ?? '') == 'IYA' ? 'selected' : '' }}>
                                                                        Iya</option>
                                                                    <option value="TIDAK"
                                                                        {{ ($jawab->ada ?? '') == 'TIDAK' || $autoFillN ? 'selected' : '' }}>
                                                                        Tidak</option>
                                                                </select>
                                                                @if ($isDisabled)
                                                                    <input type="hidden" name="ada" value="TIDAK">
                                                                @endif
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="catatan" class="form-label">Catatan</label>
                                                                <input type="text" class="form-control" id="catatan"
                                                                    name="catatan" value="{{ $jawab->catatan ?? '' }}"
                                                                    {{ $isDisabled ? 'readonly' : 'required' }}>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="lampiran" class="form-label">Lampiran</label>
                                                                <input type="file" class="form-control" id="lampiran"
                                                                    name="lampiran" accept="image/*,application/pdf"
                                                                    {{ $isDisabled ? 'disabled' : '' }}>
                                                                <small class="text-muted">Biarkan kosong jika tidak ingin
                                                                    mengubah lampiran.</small>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="nilai-{{ $item->id }}"
                                                                    class="form-label">Score</label>
                                                                <select class="form-select score-select"
                                                                    id="nilai-{{ $item->id }}" name="nilai"
                                                                    {{ $isDisabled ? 'disabled' : 'required' }}>
                                                                    <option value="">Pilih Score</option>
                                                                    @php
                                                                        $scoreOptions = [
                                                                            'F' => 'Fully Achieved',
                                                                            'L' => 'Largely Achieved',
                                                                            'P' => 'Partially Achieved',
                                                                            'N' => 'Not Achieved',
                                                                        ];
                                                                        $selectedScore = $autoFillN
                                                                            ? 'N'
                                                                            : $jawab->nilai ?? '';
                                                                    @endphp
                                                                    @foreach ($scoreOptions as $key => $label)
                                                                        <option value="{{ $key }}"
                                                                            {{ $selectedScore == $key ? 'selected' : '' }}>
                                                                            {{ $key }} - {{ $label }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($isDisabled)
                                                                    <input type="hidden" name="nilai" value="N">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            @if (!$isDisabled)
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            @endif
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </tbody>
                            </table>
                            {{-- <div class="d-flex justify-content-end mt-3">
                                <form action="{{ route('hitung.kematangan', ['idAplikasi' => $aplikasi_id]) }}" method="POST">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $('.ketersediaan-select').on('change', function() {
            const selectedValue = $(this).val();
            const targetId = $(this).data('target');
            const $scoreSelect = $('#' + targetId);

            // reset score select
            $scoreSelect.empty();

            if (selectedValue === 'TIDAK') {
                $scoreSelect.append('<option value="">Pilih Score</option>');
                $scoreSelect.append('<option value="P">P - Partially Achieved</option>');
                $scoreSelect.append('<option value="N">N - Not Achieved</option>');
            } else if (selectedValue === 'IYA') {
                $scoreSelect.append('<option value="">Pilih Score</option>');
                $scoreSelect.append('<option value="F">F - Fully Achieved</option>');
                $scoreSelect.append('<option value="L">L - Largely Achieved</option>');
                $scoreSelect.append('<option value="P">P - Partially Achieved</option>');
                $scoreSelect.append('<option value="N">N - Not Achieved</option>');
            } else {
                $scoreSelect.append('<option value="">Pilih Score</option>');
            }
        });

        // Trigger on load, in case of edit data
        $('.ketersediaan-select').trigger('change');

    });
</script>

@endsection
