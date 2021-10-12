import '../partials/select_kelas'
import '../partials/select_mapel'
import '../partials/select_paket_soal'

const table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: URL_ADMIN + '/soal/datatable',
        data: function (d) {
            d.kelas_id = $('#selectKelas').val()
            d.mapel_id = $('#selectMapel').val()
            d.paket_soal_id = $('#selectPaket').val()
        }
    },
    columns: [
        { data: 'index', name: 'id' },
        { data: 'paket_soal.nama', name: 'paketSoal.nama' },
        { data: 'pertanyaan', name: 'soal' },
        { data: 'jenis', name: 'jenis' },
        { data: 'index', name: 'id' },
        { data: 'index', name: 'id' },
    ]
})

$('.select-filter').on('change', function () {
    table.draw()
})
