const selectRombel = $('.select-rombel').select2({
    theme: 'bootstrap4',
    placeholder: 'Pilih Rombongan Belajar',
    ajax: {
        url: URL_ADMIN + '/rombel/select2',
        dataType: 'json',
        data: function (params) {
            return {
                term: params.term
            }
        }
    }
})
