@extends('layouts.master')

@section('title')
    Tambah Data Pemain Film
@endsection

@section('content')
<div>
    <form action="/cast" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" id="age" placeholder="Masukkan Umur">
            @error('age')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" name="bio" id="bio" placeholder="Masukkan Bio"></textarea>
            @error('bio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection