<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar_lokasi extends Model
{
    protected $table = 'gambar_lokasi';
    protected $primaryKey = 'id_gambar';
    public $timestamps = false;
    protected $fillable = [
        'fk_id_lokasi',
        'gambar'
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'fk_id_lokasi', 'id_lokasi');
    }
}
