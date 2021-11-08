@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">

        @foreach ($errors->all() as $error)
            <div class="alert alert-warning">{{ $error }}</div>
        @endforeach

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Ujian</h4>
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

{{-- Modal mulai --}}
<div class="modal fade" id="modalMulai">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Mulai Ujian</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('ujian.mulai') }}" method="POST">
                @csrf
                <input type="hidden" name="ujian_id" id="ujianId">
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Ujian</th>
                                <td id="ujianNama"></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <td id="ujianKeterangan"></td>
                            </tr>
                            <tr>
                                <th>Durasi</th>
                                <td id="ujianDurasi"></td>
                            </tr>
                            <tr>
                                <th>Paket Soal</th>
                                <td id="ujianPaket"></td>
                            </tr>
                            <tr id="divToken" class="d-none">
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-sm btn-primary">Mulai</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script src="{{ asset('js/daftar_ujian.js') }}"></script>
@endpush
