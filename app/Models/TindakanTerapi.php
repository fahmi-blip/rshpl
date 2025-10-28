<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TindakanTerapi extends Model
{
    protected $table = 'kode_tindakan_terapi';
    protected $primaryKey = 'idtindakan_terapi';
    protected $fillable = [
        'kode',
        'deskripsi_tindakan_terapi',
    ];
    public function kategori(){
        return $this->belongsTo(Kategori::class, 'idkategori', 'idkategori');
    }
    public function kategoriKlinis(){
        return $this->belongsTo(KategoriKlinis::class, 'idkategori_klinis', 'idkategori_klinis');
    }
}
