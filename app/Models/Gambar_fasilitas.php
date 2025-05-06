<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar_fasilitas extends Model
{
    protected $table = 'gambar_fasilitas';
    protected $primaryKey = 'id_gambar_fasilitas';
    public $timestamps = false;
    protected $fillable = ['fk_id_fasilitas', 'gambar'];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fk_id_fasilitas', 'id_fasilitas');
    }
}
