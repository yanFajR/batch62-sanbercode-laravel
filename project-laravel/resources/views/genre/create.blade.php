@extends('layouts.master')

@section('title')
    Tambah Data Genre
@endsection

@section('content')
<div>
    <form action="/genre" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Genre name</label>
            <input type="name" class="form-control" name="name" id="name" placeholder="Masukkan Nama Genre" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection