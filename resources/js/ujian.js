const btnPrev = $('#btnPrev')
const btnNext = $('#btnNext')
const btnRagu = $('#btnRagu')

const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    // didOpen: (toast) => {
    //   toast.addEventListener('mouseenter', Swal.stopTimer)
    //   toast.addEventListener('mouseleave', Swal.resumeTimer)
    // }
})

let x = setInterval(() => {
    const timer = document.getElementById('timer');
    let now = new Date().getTime();
    let distance = end - now;

    // calc
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // warning
    if (hours == 0 && minutes < 5) {
        timer.style.color = 'red';
    }

    //
    if (hours < 10) {
        hours = "0" + hours
    }
    if (minutes < 10) {
        minutes = "0" + minutes
    }
    if (seconds < 10) {
        seconds = "0" + seconds
    }

    // show timer
    timer.innerHTML = hours + ":" + minutes + ":" + seconds;

    if (distance < 0) {
        clearInterval(x);
        timer.innerHTML = 'WAKTU HABIS!';
        timer.style.color = 'red';
        ujianSelesai()
    }
}, 1000);

function loadSoal(page = 1) {
    $.get({
        url: '/ujian/soal',
        data: {
            ujian_siswa_id: ujianSiswaid,
            page: page
        },
        success: function (res) {
            const data = res.data[0]
            const soal = data.soal
            // console.log(res)
            $('#ujianHasilId').val(data.id)

            // no soal
            $('#noSoal').html(res.current_page)

            // ragu ragu
            btnRagu.data('id', data.id)
            if (data.ragu != 1) {
                btnRagu.prop('checked', false)
            } else {
                btnRagu.prop('checked', true)
            }

            // soal
            $('#div-soal').html(soal.pertanyaan)

            // jawaban
            const jawaban = data.jawaban
            divJawaban = $('#div-jawaban')
            divJawaban.html('')
            if (soal.jenis == 'pilihan_ganda') {
                const pilihan = soal.pilihan
                // console.log(pilihan)
                let html = ''
                pilihan.forEach(function (item, index) {
                    html += `
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="pilihan${index}" name="jawaban" value="${item.id}" ${jawaban == item.id ? 'checked' : ''}>
                        <label for="pilihan${index}" class="custom-control-label">${item.jawaban}</label>
                    </div>`
                })
                divJawaban.html(html)
            } else {
                divJawaban.html(`
                        <div class="form-grop">
                            <label for="form-jawaban">Jawaban</label>
                            <input class="form-control" name="jawaban" id="form-jawaban" value="${jawaban ?? ''}" placeholder="Masukkan jawaban...">
                        </div>`)
            }

            // nav prev
            btnPrev.removeAttr('disabled')
            btnPrev.data('id', res.current_page - 1)
            if (res.prev_page_url == null) {
                btnPrev.attr('disabled', 'disabled')
            }

            // nav next
            btnNext.removeAttr('disabled')
            btnNext.data('id', res.current_page + 1)
            if (res.next_page_url == null) {
                btnNext.attr('disabled', 'disabled')
            }

        },
        error: function (err) {
            console.log(err)
        }
    })
}
loadSoal()

// btn prev
btnPrev.on('click', function () {
    const data = $(this).data()
    // console.log(data)
    loadSoal(data.id)
})

// btn next
btnNext.on('click', function () {
    const data = $(this).data()
    // console.log(data)
    loadSoal(data.id)
})

// ragu ragu
btnRagu.on('change', function () {
    const data = $(this).data()
    const checked = $('#btnRagu:checked').length > 0

    $.post({
        url: '/ujian/ragu-ragu',
        data: {
            id: data.id,
            ragu: checked ? 1 : 0
        },
        success: function (res) {
            console.log(res)
            const btnPilihan = $('#btnPilihan' + data.id)

            if (checked) {
                btnPilihan.removeClass('btn-outline-primary').addClass('btn-warning')
            } else {
                btnPilihan.removeClass('btn-warning')
                if (res.jawaban != null) {
                    btnPilihan.addClass('btn-primary')
                } else {
                    btnPilihan.addClass('btn-outline-primary')
                }
            }
        }
    })
})

function daftarSoal() {
    $.get({
        url: '/ujian/daftar-soal',
        data: {
            ujian_siswa_id: ujianSiswaid
        },
        success: function (res) {
            let html = ''
            res.forEach(function(item, index) {
                // console.log(item)
                let color = item.ragu == 1 ? 'btn-warning' : item.jawaban != null ? 'btn-primary' : 'btn-outline-primary'
                html += `
                <div class="col-md-3 col-sm-2 mb-3">
                    <button class="btn btn-sm btn-block ${color} btn-pilihan" id="btnPilihan${index + 1}" data-id="${index + 1}">${index + 1}</button>
                </div>`
            })
            $('#pilihan').html(html)
        }
    })
}
daftarSoal()

// pilih soal
$(document).on('click', '.btn-pilihan', function () {
    const data = $(this).data()
    // daftarSoal()
    loadSoal(data.id)
})

// simpan jawaban
$('#formJawab').on('submit', function (e) {
    e.preventDefault();

    const form = new FormData(this)

    $.post({
        url: '/ujian/simpan-jawaban',
        data: form,
        contentType: false,
        processData: false,
        success: function(res) {
            Toast.fire({
                icon: 'success',
                title: 'Jawaban berhasil disimpan'
            })

            if (!$('#btnPilihan' + form.get('id')).hasClass('btn-warning')) {
                $('#btnPilihan' + form.get('id')).removeClass('btn-outline-primary').addClass('btn-primary')
            }
        }
    })
})

// Akhiri Ujian
$('#btnAkhiri').on('click', function () {
    Swal.fire({
        title: 'Akhiri Ujian',
        text: "Anda yakin ingin mengakhiri ujian? Pastikan semua jawaban sudah terisi dengan benar",
        icon: 'question',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Yakin'
    }).then((done) => {
        console.log(done)
        if (done.value) {
            ujianSelesai()
        }
    })
})

function ujianSelesai() {
    $.post({
        url: '/ujian/selesai',
        data: {
            ujian_siswa_id: ujianSiswaid
        },
        success: function (res) {
            console.log(res)

            Swal.fire('Ujian Telah Berakhir', 'Anda akan dialihkan ke halaman Beranda', 'success').then(() => {
                window.location.href = '/'
            })
        }
    })
}
