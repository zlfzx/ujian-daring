require('../app');

const table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: URL_ADMIN + '/kelas/datatable'
    },
    columns: [
        { data: 'index', name: 'id' },
        { data: 'nama' },
        { data: 'opsi', name: 'id' }
    ]
})

// Tambah Kelas
const modalTambah = $('#modalTambah')
const formTambah = document.getElementById('formTambah')
formTambah.addEventListener('submit', function (e) {
    e.preventDefault();
    const form = new FormData(this)

    axios.post(URL_ADMIN + '/kelas', form)
        .then(function (response) {
            const res = response.data
            console.log(res)
            formTambah.reset()
            modalTambah.modal('hide')
            table.draw()
            Swal.fire('Berhasil', 'Kelas berhasil ditambahkan', 'success')
        })
})

// Edit Kelas
const modalEdit = $('#modalEdit')
const formEdit = document.getElementById('formEdit')
$(document).on('click', '.btn-edit', function () {
    const data = $(this).data()

    $('#editId').val(data.id)
    $('#editNama').val(data.nama)

    modalEdit.modal('show')
})

formEdit.addEventListener('submit', function (e) {
    e.preventDefault();
    const id = document.getElementById('editId').value
    const form = new FormData(this)

    axios.post(URL_ADMIN + '/kelas/' + id, form)
        .then(function (response) {
            Swal.fire('Berhasil', 'Kelas berhasil diperbarui', 'success')
            table.draw()
            modalEdit.modal('hide')
        })
})

// Hapus Kelas
$(document).on('click', '.btn-hapus', function () {
    const data = $(this).data()

    Swal.fire({
        title: "Hapus Kelas?",
        html: '<div class="alert alert-danger">Menghapus kelas akan menghapus data lainnya yang terkait</div>',
        icon: "question",
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonText: "Ya, hapus!"
    }).then(hapus => {
        if (hapus.value) {
            $.ajax({
                url: URL_ADMIN + '/kelas/' + data.id,
                type: "DELETE",
                success: function (res) {
                    if (res.status) {
                        Swal.fire("Berhasil", 'Kelas berhasil dihapus', 'success')
                        table.draw()
                    }
                }
            })
        }
    })
})
