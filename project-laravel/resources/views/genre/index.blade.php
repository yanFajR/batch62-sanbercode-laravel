@extends('layouts.master')

@section('title')
    Data Genre Film
@endsection

@section('content')
<a href="/genre/create" class="btn btn-primary">Tambah</a>
<br><br>
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Genre Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($genres as $key => $genre)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $genre->name }}</td>
                <td>
                    <a href="/genre/{{ $genre->id }}" class="btn btn-info">Show</a>
                    <a href="/genre/{{ $genre->id }}/edit" class="btn btn-primary">Edit</a>
                    <form action="/genre/{{ $genre->id }}" method="POST" onsubmit="return confirm('Yakin mau delete genre ini?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Tidak ada data genre</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example1').DataTable();
  });
</script>
@endpush