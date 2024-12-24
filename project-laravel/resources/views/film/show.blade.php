@extends('layouts.master')

@section('title')
    Detail Film
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 20%;">Judul</th>
                <td style="width: 80%;">{{ $film->title }}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Ringkasan</th>
                <td style="width: 80%;">{{ $film->summary }}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Tahun Rilis</th>
                <td style="width: 80%;">{{ $film->release_year }}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Poster</th>
                <td style="width: 80%;">
                    <img src="{{ asset('uploads/' . $film->poster) }}" alt="{{ $film->title }}" style="height: 300px; object-fit: cover;">
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Genre</th>
                <td style="width: 80%;">{{ $genre->name }}</td>
            </tr>
        </table>
    </div>
    <div class="card-footer">
        <a href="/film" class="btn btn-primary">Kembali ke Daftar</a>
        <a href="/film/{{ $film->id }}/edit" class="btn btn-warning">Edit</a>
        <form action="/film/{{ $film->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau hapus?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>
@endsection