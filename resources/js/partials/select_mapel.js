const selectMapel = $('.select-mapel').select2({
    theme: "bootstrap4",
    placeholder: "Pilih Mata Pelajaran",
    ajax: {
        url: URL_ADMIN + '/mapel/select2',
        data: function (params) {
            return {
                term: params.term
            }
        }
    }
})
