<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'mahasiswas'; //Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    protected $primaryKey = 'NIM'; //Memanggil isi DB dengan primarykey

    protected $fillable = [
        'NIM',
        'Nama',
        'kelas_id',
        'Jurusan',
        'Email',
        'No_Handphone',
        'Tanggal_lahir'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
