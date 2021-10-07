const selectPaketSoal = $('.select-paket-soal').select2({
    theme: 'bootstrap4',
    placeholder: 'Pilih Paket Soal',
    ajax: {
        url: URL_ADMIN + '/paket-soal/select2',
        dataType: 'json',
        data: function (params) {
            return {
                term: params.term,
                kelas_id: $('.select-kelas').val(),
                mapel_id: $('.select-mapel').val()
            }
        }
    }
})
