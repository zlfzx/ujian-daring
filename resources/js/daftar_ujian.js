const table = $('#table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '/daftar-ujian/data',
        type: 'POST'
    },
    columns: [
        {data: 'index', name: 'id'},
        {data: 'nama', name: 'nama'},
        {data: 'paket_soal.mapel.nama', name: 'paketSoal.mapel.nama'},
        {data: 'paket_soal.nama', name: 'paketSoal.nama'},
        {data: 'waktu_mulai', name: 'waktu_mulai'},
        {data: 'durasi'},
        {data: 'btnMulai'}
    ]
})

const modalMulai = $('#modalMulai')
table.on('click', '.btn-mulai', function () {
    const data = $(this).data()
    console.log(data)

    $.post({
        url: '/daftar-ujian/' + data.id,
        success: function (res) {
            $('#ujianId').val(res.id)
            $('#ujianNama').html(res.nama)
            $('#ujianKeterangan').html(res.keterangan)
            $('#ujianDurasi').html(res.durasi + ' Menit')
            $('#ujianPaket').html(res.paket_soal.nama)

            if (res.token != null) {
                $('#divToken').removeClass('d-none').html(`
                <th>Token</th>
                <td>
                    <input type="text" name="token" class="form-control" placeholder="Masukkan Token" required>
                </td>`)
            } else {
                $('#divToken').addClass('d-none').html('')
            }
        }
    })

    modalMulai.modal('show')
})
