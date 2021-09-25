@extends('layouts.admin')
@section('title', 'Kelas')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Kelas</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped text-center display nowrap w-100" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
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
                <h4 class="modal-title">Tambah Kelas</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="formTambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addNama">Nama Kelas</label>
                        <input type="text" name="nama" class="form-control" id="addNama" placeholder="Masukkan Nama Kelas">
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
                <h4 class="modal-title">Edit Kelas</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="formTambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editNama">Nama Kelas</label>
                        <input type="text" name="nama" class="form-control" id="editNama" placeholder="Masukkan Nama Kelas">
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
            url: URL_ADMIN + '/kelas/datatable'
        },
        columns: [
            {data: 'index', name: 'id'},
            {data: 'nama'},
            {data: 'opsi', name: 'id'}
        ]
    })

    // Tambah Kelas
    const modalTambah = $('#modalTambah')
    $('#formTambah').on('submit', function (e) {
        e.preventDefault();
        const form = new FormData(this)

        $.post({
            url: URL_ADMIN + '/kelas',
            processData: false,
            contentType: false,
            data: form,
            success: function (res) {
                $(this).trigger('reset')
                modalTambah.modal('hide')
                table.draw()
                Swal.fire('Berhasil', 'Kelas berhasil ditambahkan', 'success')
            }
        })
    })
</script>
@endpush
