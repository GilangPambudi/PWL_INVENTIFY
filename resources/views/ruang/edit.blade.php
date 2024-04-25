@extends('layouts.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools"></div>
    </div>
    <div class="card-body">
    @empty($ruang)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        <a href="{{ url('ruang') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
        <form method="POST" action="{{ url('ruang/'.$ruang->id_ruang) }}" class="form-horizontal">
            @csrf
            {!! method_field('PUT')!!}
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Kode Ruang</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="kode_ruang" name="kode_ruang" value="{{ old('kode_ruang', $ruang->kode_ruang) }}" required>
                @error('kode_ruang')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Ruang</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" value="{{ old('nama_ruang', $ruang->nama_ruang) }}" required>
                @error('nama_ruang')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">NIP</label>
                <div class="col-10">
                    <input type="number" class="form-control" id="nip" name="nip" value="{{ old('nip', $ruang->nip) }}" required>
                @error('nama_ruang')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Penanggung Jawab</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab', $ruang->penanggung_jawab) }}" required>
                @error('penanggung_jawab')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('kode') }}">Kembali</a>
                </div>
            </div>
        </form>
        @endempty
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush