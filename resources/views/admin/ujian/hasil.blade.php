@extends('layouts.admin')
@section('title', 'Hasil Ujian ' . $ujian->nama)

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            {{-- <div class="card-header">
                <h4 class="card-title">{{ $ujian->nama }}</h4>
            </div> --}}
            <div class="card-body">

                <table class="table table-striped table-bordered">
                    <tr>
                        <th style="width: 25%">Nama Ujian</th>
                        <td>{{ $ujian->nama }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $ujian->keterangan }}</td>
                    </tr>
                    <tr>
                        <th>Rombel</th>
                        <td>{{ $ujian->rombel->nama }}</td>
                    </tr>
                    <tr>
                        <th>Paket Soal</th>
                        <td>{{ $ujian->paketSoal->nama }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Mulai</th>
                        <td>{{ $ujian->waktu_mulai }}</td>
                    </tr>
                    <tr>
                        <th>Durasi</th>
                        <td>{{ $ujian->durasi }} Menit</td>
                    </tr>
                </table>

                <hr>

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Siswa</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Nilai</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ujian->ujianSiswa as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $siswa->siswa->nama }}</td>
                                <td>{{ $siswa->mulai }}</td>
                                <td>{{ $siswa->selesai }}   </td>
                                <td>{{ $siswa->nilai ?? 0 }}</td>
                                <td>
                                    <button class="btn btn-xs btn-primary btn-hasil" data-id="{{ $siswa->id }}">Hasil</button>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal hasil --}}
<div class="modal fade" id="modalHasil">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hasil Ujian</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped" id="tableHasil">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Soal</th>
                            <th>Jawaban</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script src="{{ asset('js/admin/riwayat_ujian_hasil.js') }}"></script>
@endpush
