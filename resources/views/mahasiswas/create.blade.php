@extends('mahasiswas.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Mahasiswa
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswas.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="NIM">NIM</label><br>
                        <input type="text" name="NIM" class="formcontrol" id="NIM" aria-describedby="NIM">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label><br>
                        <input type="Nama" name="Nama" class="formcontrol" id="Nama" aria-describedby="Nama">
                    </div>
                    <div class="form-group">
                        <label for="Kelas">Kelas</label><br>
                        <input type="Kelas" name="Kelas" class="formcontrol" id="Kelas" aria-describedby="password">
                    </div>
                    <div class="form-group">
                        <label for="Jurusan">Jurusan</label><br>
                        <input type="Jurusan" name="Jurusan" class="formcontrol" id="Jurusan" aria-describedby="Jurusan">
                    </div>
                    <div class="form-group">
                        <label for="No_Handphone">No_Handphone</label><br>
                        <input type="No_Handphone" name="No_Handphone" class="formcontrol" id="No_Handphone" aria-describedby="No_Handphone">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection