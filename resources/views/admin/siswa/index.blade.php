@extends('layouts.admin')
@section('title', 'Siswa')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Siswa</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped text-center display nowrap w-100" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rombel</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Jenis Kelamin</th>
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
                <h4 class="modal-title">Tambah Siswa</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="formTambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addRombel">Rombongan Belajar</label>
                        <select name="rombel_id" id="addRombel" class="form-control select-rombel"></select>
                    </div>
                    <div class="form-group">
                        <label for="addNama">Nama Siswa</label>
                        <input type="text" name="nama" class="form-control" id="addNama" placeholder="Masukkan Nama Siswa">
                    </div>
                    <div class="form-group">
                        <label for="addNis">NIS</label>
                        <input type="text" name="nis" class="form-control" id="addNis" placeholder="Masukan NIS Siswa">
                    </div>
                    <div class="form-group">
                        <label for="addJenisKelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" name="jenis_kelamin" id="addJenisKelamin" class="form-control">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Siswa</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="formTambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editNama">Nama Siswa</label>
                        <input type="text" class="form-control" id="editNama" placeholder="Masukkan Nama Siswa">
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
    const table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: URL_ADMIN + '/siswa/datatable'
        },
        columns: [
            {data: 'index', name: 'id'},
            {data: 'rombel.nama', name: 'rombel.nama'},
            {data: 'nama'},
            {data: 'nis'},
            {data: 'jenis_kelamin'},
            {data: 'opsi'}
        ]
    })

    const selectRombel = $('.select-rombel').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Rombongan Belajar',
        ajax: {
            url: URL_ADMIN + '/rombel/select2',
            dataType: 'json',
            data: function (params) {
                return {
                    term: params.term
                }
            }
        }
    })

    // Tambah Siswa
    const modalTambah = $('#modalTambah')
    $('#formTambah').on('submit', function (e) {
        e.preventDefault();
        const form = new FormData(this)

        $.post({
            url: URL_ADMIN + '/siswa',
            processData: false,
            contentType: false,
            data: form,
            success: function (res) {
                modalTambah.modal('hide')
                $(this).trigger('reset')
                Swal.fire('Berhasil', 'Siswa berhasil ditambahkan', 'success')
                table.draw()
            }
        })
    })
</script>
@endpush
