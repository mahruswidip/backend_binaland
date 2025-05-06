<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'id_lokasi';
    public $timestamps = false;
    protected $fillable = [
        'nama_lokasi',
        'company',
        'deskripsi',
        'provinsi',
        'kota',
        'kecamatan',
        'alamat'
    ];

    public function gambarLokasi()
    {
        return $this->hasMany(Gambar_lokasi::class, 'fk_id_lokasi', 'id_lokasi');
    }
    public function tipeRumah()
    {
        return $this->hasMany(Tipe_rumah::class, 'fk_id_lokasi', 'id_lokasi');
    }
    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'fk_id_lokasi', 'id_lokasi');
    }
}
