@extends('layouts.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    <div class="card-tools"></div>
    </div>
    <div class="card-body">
    @empty($status)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        <a href="{{ url('status') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
        <form method="POST" action="{{ url('status/'.$status->id_detail_status) }}" class="form-horizontal">
            @csrf
            {!! method_field('PUT')!!}
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Kode Status</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="kode_status" name="kode_status" value="{{ old('kode_status', $status->kode_status) }}">
                @error('kode_status')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Status</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nama_status" name="nama_status" value="{{ old('nama_status', $status->nama_status) }}">
                @error('nama_status')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('status') }}">Kembali</a>
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