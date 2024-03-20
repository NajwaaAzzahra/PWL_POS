@extends('layout.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit')

{{-- Content body: main page content --}}
@section('content')
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-title">Edit kategori</div>
            </div>

            <form method="post" action="{{ route('/kategori/edit_simpan', $data->kategori_id)}}">
                @csrf
                @method('PUT')

                <div class='card'></div>
                <div class="card-body">
                    </div class="form-group">
                    <label for="kodeKategori">Kode Kategori</label>
                    <input type="text" class="form-control" id="kodeKategori" name="kodeKategori" value="{{$data->kategori_kode}}">
                </div>
                
                </div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="namaKategori" name="namaKategori" value="{{$data->kategori_nama}}">
                </div>

                <div class="card-footer">
                    <a href="{{route('kategori.index')}}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection