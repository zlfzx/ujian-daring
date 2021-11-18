const table = $('#table').DataTable()

// hasil ujian
const modalHasil = $('#modalHasil')
$('.btn-hasil').on('click', function () {
    const data = $(this).data()

    const tableHasil = $('#tableHasil').DataTable({
        destroy: true,
        serverSide: true,
        processing: true,
        ajax: {
            url: URL_ADMIN + "/riwayat-ujian/hasil",
            data: {
                id: data.id
            }
        },
        columns: [
            {data: 'index', name: 'id', className: 'text-center'},
            {data: 'soal.pertanyaan', name: 'soal.pertanyaan'},
            {data: 'jawaban', name: 'jawaban'},
            {data: 'status', name: 'status', className: 'text-center'},
        ]
    })

    modalHasil.modal('show')
})
