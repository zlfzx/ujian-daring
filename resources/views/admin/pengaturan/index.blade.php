@extends('layouts.admin')
@section('title', 'Pengaturan Aplikasi')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengaturan Aplikasi</h4>
                </div>
                <form id="form" method="POST" action="{{ route('pengaturan.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="nama">Nama Institusi</label>
                            <input type="text" name="nama_institusi" class="form-control" id="nama" value="{{ $pengaturan->nama_institusi }}" placeholder="Atur nama institusi">
                        </div>
                        <div class="form-group">
                            <label for="tagline">Tagline</label>
                            <input type="text" name="tagline" class="form-control" id="tagline" value="{{ $pengaturan->tagline }}" placeholder="Masukkan Tagline">
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label><br>
                            <img src="{{ $pengaturan->logo != null ? asset('storage/' . $pengaturan->logo) : '/assets/img/logo.svg' }}" class="my-3" style="width: 150px; height: auto">
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengaturan Slug Admin</h4>
                </div>
                <form id="form" method="POST" action="{{ route('pengaturan.update-slug') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="form-group">
                            <label for="slug">Slug Admin</label>
                            <input type="text" name="slug_admin" class="form-control" id="slug" value="{{ $pengaturan->slug_admin }}" placeholder="Atur slug admin">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
