@extends('layouts.admin')
@section('title', 'Riwayat Ujian')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Riwayat Ujian</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Ujian</th>
                            <th>Rombel</th>
                            <th>Paket Soal</th>
                            <th>Waktu Pelaksanaan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script src="{{ asset('js/admin/riwayat_ujian.js') }}"></script>
@endpush
