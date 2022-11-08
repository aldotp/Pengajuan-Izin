
@extends('layout.aplikasi')

@section('title', 'Tambah Wilayah ')

@section('konten')
<h1>Edit </h1>
    <form method="post" action="{{'/opd/'.$data->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value=" {{ $data->nama }}">
        </div>
        <div class="mb-3">
            <label for="nip_kepala">Nip Kepala</label>
            <input type="text" class="form-control" id="nip_kepala" placeholder="Nip Kepala" name="nip_kepala" value=" {{ $data->nip_kepala }}">
        </div>
        <div class="mb-3">
            <label for="nama_kepala">Nama Kepala</label>
            <input type="text" class="form-control" id="nama_kepala" placeholder="Nama Kepala" name="nama_kepala" value="{{ $data->nama_kepala }}">
        </div>
        <div class="mb-3">
            <label for="nama_pimpinan">Nama Pimpinan</label>
            <input type="text" class="form-control" id="nama_pimpinan" placeholder="Nama Pimpinan" name="nama_pimpinan" value="{{ $data->nama_pimpinan }}">
        </div>
        <div class="mb-3">
            <label for="id_wilayah">Id Wilayah</label>
            <select class="form-control" name="id_wilayah" id="id_wilayah">
                @foreach($wilayah as $value)
                <option value="{{$value->id}}">{{$value->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/opd" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
@endsection

