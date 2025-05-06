<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservasi_lokasi extends Model
{
    protected $table = 'reservasi_lokasi';
    protected $primaryKey = 'id_reservasi_lokasi';
    public $timestamps = false;
    protected $fillable = ['fk_id_reservasi', 'fk_id_lokasi'];

    public function survey()
    {
        return $this->belongsTo(Reservasi_survey::class, 'fk_id_reservasi', 'id_reservasi');
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'fk_id_lokasi', 'id_lokasi');
    }
}
