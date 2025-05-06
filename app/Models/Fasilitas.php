<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    public $timestamps = false;
    protected $fillable = ['fk_id_lokasi', 'nama_fasilitas'];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'fk_id_lokasi', 'id_lokasi');
    }

    public function gambarFasilitas()
    {
        return $this->hasMany(Gambar_fasilitas::class, 'fk_id_fasilitas', 'id_fasilitas');
    }
}
