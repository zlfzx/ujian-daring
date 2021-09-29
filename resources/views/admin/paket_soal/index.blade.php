@extends('layouts.admin')
@section('title', 'Paket Soal')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Paket Soal</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center display nowrap w-100" id="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kelas</th>
                                <th>Mata Pelajaran</th>
                                <th>Nama Paket Soal</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="modalTambah">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Paket Soal</h5>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="formTambah">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="addKelas">Kelas</label>
                            <select name="kelas_id" id="addKelas" class="form-control select-kelas"></select>
                        </div>
                        <div class="form-group">
                            <label for="addMapel">Mata Pelajaran</label>
                            <select name="mapel_id" id="addMapel" class="form-control select-mapel"></select>
                        </div>
                        <div class="form-group">
                            <label for="addKode">Kode Paket</label>
                            <input type="text" name="kode_paket" class="form-control" id="addKode" placeholder="Masukkan Kode Paket">
                        </div>
                        <div class="form-group">
                            <label for="addNama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="addNama" placeholder="Masukkan Nama Paket">
                        </div>
                        <div class="form-group">
                            <label for="addKeterangan">Keterangan</label>
                            <textarea name="keterangan" id="addKeterangan" cols="30" rows="5" class="form-control" placeholder="Masukkan keterangan Paket Soal"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const table = $('#table').DataTable()
    </script>
@endpush
