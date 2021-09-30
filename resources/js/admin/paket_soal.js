import '../partials/select_kelas'
import '../partials/select_mapel'

const table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: URL_ADMIN + '/paket-soal/datatable'
    },
    columns: [
        {data: 'index', name: 'id'},
        {data: 'kelas.nama', name :'kelas.nama'},
        {data: 'mapel.nama', name: 'mapel.nama'},
        {data: 'kode_paket', name: 'kode_paket'},
        {data: 'nama', name: 'nama'},
        {data: 'keterangan', name: 'keterangan'},
        {data: 'opsi', name: 'id'}
    ]
})

// Tambah Paket
const modalTambah = $('#modalTambah')
const formTambah = document.getElementById('formTambah')
formTambah.addEventListener('submit', function (e) {
    e.preventDefault()
    const form = new FormData(this)

    $.post({
        url: URL_ADMIN + '/paket-soal',
        processData: false,
        contentType: false,
        data: form,
        success: function (res) {
            formTambah.reset()
            Swal.fire('Berhasil', 'Paket Soal berhasil ditambahkan', 'success')
            table.draw()
            modalTambah.modal('hide')
        }
    })
})

// Edit Paket
const modalEdit = $('#modalEdit')
$(document).on('click', '.btn-edit', function () {
    const data = $(this).data()
    console.info(data)

    $('#editId').val(data.id)
    $('#editKelas').append(new Option(data.kelasNama, data.kelasId, true, true))
    $('#editMapel').append(new Option(data.mapelNama, data.mapelId, true, true))
    $('#editKodePaket').val(data.kode)
    $('#editNama').val(data.nama)
    $('#editKeterangan').val(data.keterangan)

    modalEdit.modal('show')
})
$('#formEdit').on('submit', function (e) {
    e.preventDefault()
    const form = new FormData(this)
    form.append('_method', 'PUT')

    $.post({
        url: URL_ADMIN + '/paket-soal/' + $('#editId').val(),
        processData: false,
        contentType: false,
        data: form,
        success: function (res) {
            Swal.fire('Berhasil', 'Paket Soal berhasil diperbarui', 'success')
            modalEdit.modal('hide')
            table.draw()
        }
    })
})

// Hapus Paket
$(document).on('click', '.btn-hapus', function () {
    const data = $(this).data()

    Swal.fire({
        title: "Hapus Paket Soal",
        icon: 'question',
        html: '<div class="alert alert-danger">Menghapus Paket Soal akan menghapus data launnya yang terkait</div>',
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya, hapus!"
    }).then(hapus => {
        if (hapus.value) {
            $.ajax({
                url: URL_ADMIN + '/paket-soal/' + data.id,
                type: 'DELETE',
                success: function (res) {
                    Swal.fire('Berhail', 'Paket Soal berhasil dihapus', 'success')
                    table.draw()
                }
            })
        }
    })
})
