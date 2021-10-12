@extends('layouts.admin')
@section('title', 'Manajemen Soal')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{ route('soal.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>
                            Tambah Soal</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="selectKelas">Kelas</label>
                                <select id="selectKelas" class="form-control select-kelas select-filter"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="selectMapel">Mata Pelajaran</label>
                                <select id="selectMapel" class="form-control select-mapel select-filter"></select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="selectPaket">Paket Soal</label>
                                <select name="paket_soal_id" id="selectPaket"
                                    class="form-control select-paket-soal select-filter"></select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-striped display nowrap w-100" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Paket Soal</th>
                                <th>Soal</th>
                                <th>Jenis</th>
                                <th>Media</th>
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
    <script src="{{ asset('js/admin/soal.js') }}"></script>
@endpush
