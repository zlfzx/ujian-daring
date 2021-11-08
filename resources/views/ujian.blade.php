@extends('layouts.app_ujian')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <a class="text-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Detail Ujian
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Ujian</th>
                                                <td>{{ $ujianSiswa->ujian->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Keterangan</th>
                                                <td>{{ $ujianSiswa->ujian->keterangan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Paket Soal</th>
                                                <td>{{ $ujianSiswa->ujian->paketSoal->nama }}</td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Waktu Mulai</th>
                                                <td>{{ $ujianSiswa->mulai }}</td>
                                            </tr>
                                            <tr>
                                                <th>Waktu Selesai</th>
                                                <td>{{ $ujianSiswa->selesai }}</td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Soal 1</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi voluptates autem perferendis
                        dolorem sapiente sed error dicta inventore, voluptatibus officiis sequi libero et illo aliquam quas
                        debitis. Voluptates, similique vitae.</p>
                    </p>

                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                            <label for="customRadio1" class="custom-control-label">Custom Radio</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio"
                                checked="">
                            <label for="customRadio2" class="custom-control-label">Custom Radio checked</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Sebelumnya</button>
                        <div>
                            <button class="btn btn-sm btn-warning"><input type="checkbox" name="" id=""> Ragu-ragu</button>
                            <button class="btn btn-sm btn-success">Simpan</button>
                        </div>
                        <button class="btn btn-sm btn-primary">Selanjutnya <i class="fas fa-arrow-right"></i></button>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Daftar Soal</h5>
                </div>
                <div class="card-body">
                    <h3 id="timer" class="text-center">00:00:00</h3>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button class="btn btn-sm btn-block btn-outline-primary">1</button>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-block btn-outline-danger">Akhiri Ujian</button>
                </div>
            </div>
        </div>

        {!! json_encode($ujianSiswa) !!}
    </div>
@endsection

@push('script')
    <script>
        const end = new Date('{{ $ujianSiswa->selesai }}').getTime()

        let x = setInterval(() => {
            const timer = document.getElementById('timer')
            let now = new Date().getTime()
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
            }
        }, 1000);
    </script>
@endpush
