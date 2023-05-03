<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $mahasiswas = Mahasiswa::paginate(5); // Mengambil semua isi tabel
        $posts = Mahasiswa::orderBy('NIM', 'desc')->paginate(6);
        return view('mahasiswas.index', compact('mahasiswas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.create', ['kelas' => $kelas]);
    }
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'NIM' => 'required',
            'Nama' => 'required',
            'Tanggal_lahir' => 'required',
            'kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'No_Handphone' => 'required',
        ]);

        // Mahasiswa::create($request->all());

        $mahasiswas = new Mahasiswa;
        $mahasiswas->NIM = $request->get('NIM');
        $mahasiswas->Nama = $request->get('Nama');
        $mahasiswas->Tanggal_lahir = $request->get('Tanggal_lahir');
        $mahasiswas->Jurusan = $request->get('Jurusan');
        $mahasiswas->Email = $request->get('Email');
        $mahasiswas->No_handphone = $request->get('No_Handphone');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();

        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    public function show($NIM)
    {
        //menampilkan detail data dengan menemukan/berdasarkan NIM Mahasiswa
        $Mahasiswa = Mahasiswa::find($NIM);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }
    public function edit($NIM)
    {
        //menampilkan detail data dengan menemukan berdasarkan NIM Mahasiswa untuk
        $Mahasiswa = Mahasiswa::find($NIM);
        $user = Auth::user();
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa', 'user','kelas'));
    }
    public function update(Request $request, $NIM)
    {
        //melakukan validasi data
        $request->validate([
            'NIM' => 'required',
            'Nama' => 'required',
            'Tanggal_lahir' => 'required',
            'kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'No_Handphone' => 'required',
        ]);

        $mahasiswas = Mahasiswa::find($NIM);
        $mahasiswas->NIM = $request->get('NIM');
        $mahasiswas->Nama = $request->get('Nama');
        $mahasiswas->Tanggal_lahir = $request->get('Tanggal_lahir');
        $mahasiswas->Jurusan = $request->get('Jurusan');
        $mahasiswas->Email = $request->get('Email');
        $mahasiswas->No_Handphone = $request->get('No_Handphone');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();
        //fungsi eloquent untuk mengupdate data inputan kita
        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function destroy($NIM)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($NIM)->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function find(Request $request)
    {
        $findMhs = $request->findMhs;
        $mahasiswas = Mahasiswa::where('nama', 'like', '%' . $findMhs . '%')->paginate(5);
        return view('mahasiswas.index', compact('mahasiswas'));
    }
};
