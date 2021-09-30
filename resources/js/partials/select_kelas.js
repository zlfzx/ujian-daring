const selectKelas = $('.select-kelas').select2({
    theme: 'bootstrap4',
    placeholder: 'Pilih Kelas',
    ajax: {
        url: URL_ADMIN + '/kelas/select2',
        dataType: 'json',
        data: function (params) {
            return {
                term: params.term
            }
        }
    }
})
