@extends('layouts.admin')
@section('title', 'Rombongan Belajar')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Rombel</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped text-center display nowrap w-100" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Nama Rombel</th>
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
                <h4 class="modal-title">Tambah Rombel</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="formTambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addKelas">Kelas</label>
                        <select name="kelas_id" id="addKelas" class="form-control select-kelas"></select>
                    </div>
                    <div class="form-group">
                        <label for="addNama">Nama Rombel</label>
                        <input type="text" name="nama" class="form-control" id="addNama" placeholder="Masukkan Nama Rombel">
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
                <h4 class="modal-title">Edit Rombel</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="formTambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editKelas">Kelas</label>
                        <select name="kelas_id" id="editKelas" class="form-control select-kelas"></select>
                    </div>
                    <div class="form-group">
                        <label for="editNama">Nama Rombel</label>
                        <input type="text" name="nama" class="form-control" id="editNama" placeholder="Masukkan Nama Rombel">
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
            url: URL_ADMIN + '/rombel/datatable'
        },
        columns: [
            {data: 'index', name: 'id'},
            {data: 'kelas.nama', name: 'kelas.nama'},
            {data: 'nama', name: 'nama'},
            {data: 'opsi', name: 'id'}
        ]
    })

    const selectKelas = $('.select-kelas').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Kelas',
        ajax: {
            url: URL_ADMIN + '/kelas/select2',
            dataType: 'json',
            data: function (params) {
                return {
                    term: params.term
                }
            }
        }
    })

    // Tambah Rombel
    const modalTambah = $('#modalTambah')
    $('#formTambah').on('submit', function (e) {
        e.preventDefault();
        const form = new FormData(this)

        $.post({
            url: URL_ADMIN + '/rombel',
            processData: false,
            contentType: false,
            data: form,
            success: function (res) {
                $(this).trigger('reset')
                modalTambah.modal('hide')
                Swal.fire('Berhasil', 'Rombel berhasil ditambahkan', 'success')
                table.draw()
            }
        })
    })
</script>
@endpush
