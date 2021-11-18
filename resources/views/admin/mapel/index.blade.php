@extends('layouts.admin')
@section('title', 'Mata Pelajaran')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Mapel</button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped text-center display nowrap w-100" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Mata Pelajaran</th>
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
                <h4 class="modal-title">Tambah Mata Pelajaran</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="formTambah">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addKode">Kode Mapel</label>
                        <input type="text" name="kode" class="form-control" id="addKode" placeholder="Masukkan Kode Mapel">
                    </div>
                    <div class="form-group">
                        <label for="addNama">Nama Mapel</label>
                        <input type="text" name="nama" class="form-control" id="addNama" placeholder="Masukkan Nama Mapel">
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
                <h4 class="modal-title">Edit Mata Pelajaran</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="formEdit">
                <input type="hidden" id="editId">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editKode">Kode Mapel</label>
                        <input type="text" name="kode" class="form-control" id="editKode" placeholder="Masukkan Kode Mapel">
                    </div>
                    <div class="form-group">
                        <label for="editNama">Nama Mapel</label>
                        <input type="text" name="nama" class="form-control" id="editNama" placeholder="Masukkan Nama Mapel">
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
<script src="{{ asset('js/admin/mapel.js') }}"></script>
{{-- <script>
    const table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: URL_ADMIN + '/mapel/datatable'
        },
        columns: [
            {data: 'index', name: 'id'},
            {data: 'kode'},
            {data: 'nama'},
            {data: 'opsi', name: 'id'}
        ]
    })

    // Tambah Mapel
    const modalTambah = $('#modalTambah')
    $('#formTambah').on('submit', function (e) {
        e.preventDefault();
        const form = new FormData(this)

        $.post({
            url: URL_ADMIN + '/mapel',
            processData: false,
            contentType: false,
            data: form,
            success: function (res) {
                $(this).trigger('reset')
                modalTambah.modal('hide')
                Swal.fire('Berhasil', 'Mata Pelajaran berhasil ditambahkan', 'success')
                table.draw()
            }
        })
    })

    // Edit Mapel
    const modalEdit = $('#modalEdit')
    $(document).on('click', '.btn-edit', function () {
        const data = $(this).data()

        $('#editId').val(data.id)
        $('#editKode').val(data.kode)
        $('#editNama').val(data.nama)

        modalEdit.modal('show')
    })
    $('#formEdit').on('submit', function (e) {
        e.preventDefault()
        const form = new FormData(this)
        form.append('_method', 'PUT')

        $.post({
            url: URL_ADMIN + '/mapel/' + $('#editId').val(),
            processData: false,
            contentType: false,
            data: form,
            success: function (res) {
                Swal.fire('Berhasil', 'Mata Pelajaran berhasil diperbarui', 'success')
                table.draw()
                modalEdit.modal('hide')
            }
        })
    })

    // Hapus Mapel
    $(document).on('click', '.btn-hapus', function () {
        const data = $(this).data()

        Swal.fire({
            title: "Hapus Mata Pelajaran?",
            icon: "question",
            html: '<div class="alert alert-danger">Menghapus Mapel akan menghapus data launnya yang terkait</div>',
            showCancelButton: true,
            cancelButtonText: "Tidak",
            confirmButtonText: "Ya, hapus!"
        }).then(hapus => {
            if (hapus.value) {
                $.ajax({
                    url: URL_ADMIN + '/mapel/' + data.id,
                    type: 'DELETE',
                    success: function (res) {
                        Swal.fire('Berhasil', 'Mata Pelajaran berhasil dihapus', 'success')
                        table.draw()
                    }
                })
            }
        })
    })
</script> --}}
@endpush
