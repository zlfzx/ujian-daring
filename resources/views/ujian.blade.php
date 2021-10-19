@extends('layouts.app_ujian')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title m-0">Soal 1</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi voluptates autem perferendis dolorem sapiente sed error dicta inventore, voluptatibus officiis sequi libero et illo aliquam quas debitis. Voluptates, similique vitae.</p>
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

    </div>
@endsection
