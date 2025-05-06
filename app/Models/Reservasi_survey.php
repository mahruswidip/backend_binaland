<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Reservasi_survey extends Model
{
    protected $table = 'reservasi_survey';
    protected $primaryKey = 'id_reservasi';
    public $timestamps = false;
    protected $fillable = ['nama_pemesan', 'nomor_telepon', 'email', 'tanggal_survey', 'jam_survey', 'catatan', 'status'];
    
    public function reservasi_lokasi()
    {
        return $this->hasOne(Reservasi_lokasi::class, 'fk_id_reservasi');
    }
    public function reservasiLokasi()
    {
        return $this->hasOne(Reservasi_lokasi::class, 'fk_id_reservasi');
    }
}