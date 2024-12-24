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