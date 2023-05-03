@extends('mahasiswas.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <form class="row mb-3 mt-5" action="{{ route('find') }}" method="POST">
            @csrf
            <div class="col-md-5">
                <div class="d-flex flex-row">
                    <input type="text" value="{{ (request()->findMhs) ? request()-> findMhs : '' }}" name="findMhs" class="form-control" placeholder="Cari Mahasiswa">
                    <button type="submit" class="btn btn-primary ml-3">Cari</button>
                </div>
            </div>
        </form>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>No_Handphone</th>
        <th>E-mail</th>
        <th>Tanggal Lahir</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($mahasiswas as $Mahasiswa)
    <tr>

        <td>{{ $Mahasiswa->NIM }}</td>
        <td>{{ $Mahasiswa->Nama }}</td>
        <td>{{ $Mahasiswa->Kelas->nama_kelas }}</td>
        <td>{{ $Mahasiswa->Jurusan }}</td>
        <td>{{ $Mahasiswa->No_Handphone }}</td>
        <td>{{ $Mahasiswa->Email }}</td>
        <td>{{ $Mahasiswa->Tanggal_lahir }}</td>
        <td>
            <form action="{{ route('mahasiswas.destroy',$Mahasiswa->NIM) }}" method="POST">

                <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->NIM) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->NIM) }}">Edit</a>
                <a class="btn btn-warning" href="{{ route('detailnilai',$Mahasiswa->NIM) }}">Nilai</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="col-md-12">
    {{$mahasiswas->links()}}
</div>

@endsection