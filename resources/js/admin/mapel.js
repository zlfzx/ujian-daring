const table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: URL_ADMIN + '/mapel/datatable'
    },
    columns: [
        { data: 'index', name: 'id' },
        { data: 'kode' },
        { data: 'nama' },
        { data: 'opsi', name: 'id' }
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
