@extends('layouts.app')
@section('title', 'Riwayat Ujian')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Riwayat Ujian</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped display text-center w-100" id="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Ujian</th>
                                <th>Mata Pelajaran</th>
                                <th>Paket Soal</th>
                                <th>Waktu Pelaksanaan</th>
                                <th>Durasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/riwayat-ujian/data'
            },
            columns: [
                {data: 'index', name: 'id'},
                {data: 'ujian.nama', name: 'ujian.nama'},
                {data: 'ujian.paket_soal.mapel.nama', name: 'ujian.paketSoal.mapel.nama'},
                {data: 'ujian.paket_soal.nama', name: 'ujian.paketSoal.nama'},
                {data: 'ujian.waktu_mulai', name: 'ujian.waktu_mulai'},
                {data: 'ujian.durasi', name: 'ujian.durasi'},
                {data: 'id'}
            ]
        })
    </script>
@endpush
