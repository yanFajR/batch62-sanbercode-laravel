@extends('layouts.master')

@section('title')
    Edit Data Film
@endsection

@section('content')
<div>
    <form action="/film/{{ $film->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Nama" value="{{ old('title', $film->title) }}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="summary">Summary</label>
            <textarea class="form-control" name="summary" id="summary" placeholder="Masukkan Summary">{{ old('summary', $film->summary) }}</textarea>
            @error('summary')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="release_year">Release Year</label>
            <input type="number" class="form-control" name="release_year" id="release_year" placeholder="Masukkan Tahun Rilis" value="{{ old('release_year', $film->release_year) }}" min="1900" max="{{ date('Y') }}">
            @error('release_year')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="poster">Poster</label>
            <input type="file" class="form-control" name="poster" id="poster">
            @error('poster')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="genre_id">Genre</label>
            <select class="form-control" name="genre_id" id="genre_id">
                <option value="">--Pilih Genre--</option>
                @forelse($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id', $film->genre_id) == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                @empty 
                    <option value="">Belum ada data genre</option>
                @endforelse
            </select>
            @error('genre_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection