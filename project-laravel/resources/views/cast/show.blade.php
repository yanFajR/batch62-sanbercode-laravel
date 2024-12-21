@extends('layouts.master')

@section('title')
    Detail Pemain Film
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 20%;">Nama</th>
                <td style="width: 80%;">{{ $cast->name }}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Umur</th>
                <td style="width: 80%;">{{ $cast->age }} Tahun</td>
            </tr>
            <tr>
                <th style="width: 20%;">Bio</th>
                <td style="width: 80%;">{{ $cast->bio }}</td>
            </tr>
        </table>
    </div>
    <div class="card-footer">
        <a href="/cast" class="btn btn-primary">Kembali ke Daftar</a>
        <a href="/cast/{{ $cast->id }}/edit" class="btn btn-warning">Edit</a>
        <form action="/cast/{{ $cast->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau hapus?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</div>
@endsection