<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipe_rumah extends Model
{
    protected $table = 'tipe_rumah';
    protected $primaryKey = 'id_tipe_rumah';
    public $timestamps = false;
    protected $fillable = [
        'id_tipe_rumah', 'fk_id_lokasi', 'nama_tipe', 'luas_bangunan', 'luas_tanah', 'harga', 'jumlah_kamar', 'jumlah_kamar_mandi', 'fasilitas_unggulan', 'is_promo'
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'fk_id_lokasi', 'id_lokasi');
    }

    public function gambarRumah()
    {
        return $this->hasMany(Gambar_rumah::class, 'fk_id_tipe_rumah', 'id_tipe_rumah');
    }
}
