<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'id_artikel', 'judul', 'isi', 'gambar', 'company', 'kategori', 'tanggal'
    ];

    public static function reorderIdArtikel()
    {
        DB::statement("SET @num := 0;");
        DB::statement("UPDATE artikel SET id_artikel = (@num := @num + 1) ORDER BY id_artikel;");
        DB::statement("ALTER TABLE artikel AUTO_INCREMENT = 1;");
    }
}

