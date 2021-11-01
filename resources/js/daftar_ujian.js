$('#table').DataTable({
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
        // {
        //     data: 'id', name: 'id', render: function (data, type, row) {
        //         const now = row.waktu_sekarang;
        //         const waktu = row.waktu_mulai_timestamp;
        //         console.log(now, waktu)
        //         console.log(now > waktu)

        //         return row.mulai;
        //     }
        // },
    ]
})
