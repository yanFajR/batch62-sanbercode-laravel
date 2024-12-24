@extends('layouts.master')

@section('title')
    Edit Data Genre
@endsection

@section('content')
<div>
    <form action="/genre/{{ $genre->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Genre</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Genre" value="{{ old('name', $genre->name) }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection