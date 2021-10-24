const selectRombel = $('.select-rombel').select2({
    theme: 'bootstrap4',
    placeholder: 'Pilih Rombongan Belajar',
    allowClear: true,
    ajax: {
        url: URL_ADMIN + '/rombel/select2',
        dataType: 'json',
        data: function (params) {
            return {
                term: params.term,
                kelas_id: $('.select-kelas').val()
            }
        },
        processResults: function (data) {
            console.log(data)

            let results = [];
            data.results.forEach(function (item, index) {
                results.push({
                    id: item.id,
                    text: item.kelas.nama + ' ' + item.text
                })
            })

            return {
                results: results
            }
        }
    }
})
