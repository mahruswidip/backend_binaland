<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar_rumah extends Model
{
    protected $table = 'gambar_rumah';
    protected $primaryKey = 'id_gambar';
    public $timestamps = false;
    protected $fillable = [
        'id_gambar', 'fk_id_tipe_rumah', 'gambar'
    ];

    public function tipeRumah()
    {
        return $this->belongsTo(Tipe_rumah::class, 'fk_id_tipe_rumah', 'id_tipe_rumah');
    }
}
