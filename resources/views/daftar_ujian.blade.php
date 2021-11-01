@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Ujian</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped display nowrap text-center" id="table">
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
    <script src="{{ asset('js/daftar_ujian.js') }}"></script>
@endpush
