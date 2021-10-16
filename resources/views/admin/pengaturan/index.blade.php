@extends('layouts.admin')
@section('title', 'Pengaturan Aplikasi')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengaturan Aplikasi</h4>
                </div>
                <form id="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Institusi</label>
                            <input type="text" class="form-control" id="nama" placeholder="Atur nama institusi">
                        </div>
                        <div class="form-group">
                            <label for="slogan">Tagline</label>
                            <input type="text" class="form-control" id="slogan" placeholder="Masukkan Tagline">
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
