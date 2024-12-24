@extends('layouts.master')

@section('title')
    Daftar Film
@endsection

@section('content')
<a href="/film/create" class="btn btn-primary">Tambah</a>
<div class="row mt-4">
    @forelse ($films as $film)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ asset('uploads/' . $film->poster) }}" class="card-img-top mx-auto" alt="{{ $film->title }}" style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h3 class="card-title mb-1">{{ $film->title }}</h3>
                    <p class="card-text">{{ Str::limit($film->summary, 100) }}</p>
                    <p class="card-text"><small class="text-muted">Tahun Rilis: {{ $film->release_year }}</small></p>
                    <a href="/film/{{ $film->id }}" class="btn btn-primary">Detail</a>
                    <a href="/film/{{ $film->id }}/edit" class="btn btn-warning">Edit</a>
                    <form action="/film/{{ $film->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning" role="alert">
                Tidak ada data film.
            </div>
        </div>
    @endforelse
</div>
@endsection
