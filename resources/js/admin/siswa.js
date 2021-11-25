import '../partials/select_rombel'

const table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: URL_ADMIN + '/siswa/datatable'
    },
    columns: [
        { data: 'index', name: 'id' },
        {
            data: 'rombel.nama', name: 'rombel.nama', render: function(data, type, row) {
                return row.rombel.kelas.nama + ' ' + data
            }
        },
        { data: 'nama' },
        { data: 'nis' },
        { data: 'jenis_kelamin' },
        { data: 'opsi' }
    ]
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

// Edit Siswa
const modalEdit = $('#modalEdit')
$(document).on('click', '.btn-edit', function () {
    const data = $(this).data()
    console.log(data)

    const option = new Option(data.rombelNama, data.rombelId, true, true)
    $('#editId').val(data.id)
    $('#editRombel').append(option).trigger('change')
    $('#editNama').val(data.nama)
    $('#editNis').val(data.nis)
    $('#editJenisKelamin').val(data.jenisKelamin).trigger('change')

    modalEdit.modal('show')
})
$('#formEdit').on('submit', function (e) {
    e.preventDefault()
    const formEdit = $(this)
    const form = new FormData(this)
    form.append('_method', 'PUT')

    $.post({
        url: URL_ADMIN + '/siswa/' + $('#editId').val(),
        processData: false,
        contentType: false,
        data: form,
        success: function (res) {
            Swal.fire('Berhasil', 'Siswa berhasil diperbarui', 'success')
            table.draw()
            modalEdit.modal('hide')
        }
    })
})

// Hapus Siswa
$(document).on('click', '.btn-hapus', function () {
    const data = $(this).data()

    Swal.fire({
        title: "Hapus Siswa",
        icon: 'question',
        html: '<div class="alert alert-danger">Menghapus siswa akan menghapus data launnya yang terkait</div>',
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya, hapus!"
    }).then(hapus => {
        if (hapus.value) {
            $.ajax({
                url: URL_ADMIN + '/siswa/' + data.id,
                type: 'DELETE',
                success: function (res) {
                    Swal.fire('Berhail', 'Siswa berhasil dihapus', 'success')
                    table.draw()
                }
            })
        }
    })
})


// import siswa
const modalImport = $('#modalImport')
$('#formImport').on('submit', function (e) {
    e.preventDefault()
    let data = new FormData(this)

    $.post({
        url: URL_ADMIN + '/siswa/import',
        data: data,
        contentType: false,
        processData: false,
        success: function (res) {
            if (res.status) {
                table.draw()
                modalImport.modal('hide')
            }
        }
    })
})
