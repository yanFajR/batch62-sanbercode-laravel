@extends('layouts.master')

@section('title')
    Detail Genre
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 20%;">Name</th>
                <td style="width: 80%;">{{ $genre->name }}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Films</th>
                <td style="width: 80%;">
                    <div class="row">
                    @forelse ($genre->films as $film)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ asset('uploads/' . $film->poster) }}" class="card-img-top mx-auto" alt="{{ $film->title }}" style="height: 250px; object-fit: cover;">
                            <div class="card-body">
                                <h3 class="card-title mb-1 font-weight-bold">{{ $film->title }}</h3>
                                <p class="card-text">{{ Str::limit($film->summary, 50) }}</p>
                                <p class="card-text"><small class="text-muted">Tahun Rilis: {{ $film->release_year }}</small></p>
                                <a href="/film/{{ $film->id }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>  
                    @empty
                        <p>Tidak ada film di genre ini</p>
                    @endforelse
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="card-footer">
        <a href="/genre" class="btn btn-primary">Kembali ke Daftar</a>
        <a href="/genre/{{ $genre->id }}/edit" class="btn btn-warning">Edit</a>
        <form action="/genre/{{ $genre->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau hapus?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>
@endsection