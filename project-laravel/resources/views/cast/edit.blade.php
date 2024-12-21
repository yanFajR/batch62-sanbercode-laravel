@extends('layouts.master')

@section('title')
    Edit Data Pemain Film
@endsection

@section('content')
<div>
    <form action="/cast/{{ $cast->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $cast->name }}" id="name" placeholder="Masukkan Nama">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" value="{{ $cast->age }}" id="age" placeholder="Masukkan Umur">
            @error('age')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" name="bio" id="bio" placeholder="Masukkan Bio">{{ $cast->bio }}</textarea>
            @error('bio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection