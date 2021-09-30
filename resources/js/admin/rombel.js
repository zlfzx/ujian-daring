import '../partials/select_kelas'

const table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: URL_ADMIN + '/rombel/datatable'
    },
    columns: [
        { data: 'index', name: 'id' },
        { data: 'kelas.nama', name: 'kelas.nama' },
        { data: 'nama', name: 'nama' },
        { data: 'opsi', name: 'id' }
    ]
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
