@extends('layouts.admin')
@section('title', 'Rombongan Belajar')

@section('content')
<div class="row">
    <div class="col-md-8">
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
            <form id="formEdit">
                <input type="hidden" id="editId">
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
<script src="{{ asset('js/admin/rombel.js') }}"></script>
{{-- <script>
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
        const formTambah = $(this)
        const form = new FormData(this)

        $.post({
            url: URL_ADMIN + '/rombel',
            processData: false,
            contentType: false,
            data: form,
            success: function (res) {
                formTambah.trigger('reset')
                modalTambah.modal('hide')
                Swal.fire('Berhasil', 'Rombel berhasil ditambahkan', 'success')
                table.draw()
            }
        })
    })

    // Edit Rombel
    const modalEdit = $('#modalEdit')
    $(document).on('click', '.btn-edit', function () {
        const data = $(this).data()

        const option = new Option(data.kelasNama, data.kelasId, true, true)
        $('#editId').val(data.id)
        $('#editKelas').append(option).trigger('change')
        $('#editNama').val(data.nama)

        modalEdit.modal('show')
    })
    $('#formEdit').on('submit', function (e) {
        e.preventDefault()
        const form = new FormData(this)
        form.append('_method', 'PUT')

        $.post({
            url: URL_ADMIN + '/rombel/' + $('#editId').val(),
            processData: false,
            contentType: false,
            data: form,
            success: function (res) {
                Swal.fire('Berhasil', 'Rombongan Belajar berhasil diperbarui', 'success')
                table.draw()
                modalEdit.modal('hide')
            }
        })
    })

    // Hapus rombel
    $(document).on('click', '.btn-hapus', function () {
        const data = $(this).data()

        Swal.fire({
            title: "Hapus Rombongan Belajar?",
            icon: "question",
            html: '<div class="alert alert-danger">Menghapus Rombel akan menghapus data lainnya  yang terkait</div>',
            showCancelButton: true,
            cancelButtonText: "Tidak",
            confirmButtonText: "Ya, hapus!"
        }).then(hapus => {
            if (hapus.value) {
                $.ajax({
                    url: URL_ADMIN + '/rombel/' + data.id,
                    type: 'DELETE',
                    success: function (res) {
                        if (res.status) {
                            Swal.fire('Berhasil', 'Rombongan Belajar berhasil dihapus', 'success')
                            table.draw()
                        }
                    }
                })
            }
        })
    })
</script> --}}
@endpush
