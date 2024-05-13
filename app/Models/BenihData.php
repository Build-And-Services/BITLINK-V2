<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BenihData extends Model
{
    use HasFactory;

    protected $table = 'benih_data';
    protected $primaryKey = 'id_benih';
    protected $fillable = [
        'varietas',
        'jenis_benih',
        'stok_benih',
        'kualitas_benih',
        'harga_benih',
        'foto_benih',
        'tgl_masuk',
        'turun_gudang',
        'jemur_kering',
        'blower1',
        'benih_susut',
        'biji_kecil',
        'jumlah_benih',
        'id_akunp'
    ];

    public function akunProdusen()
    {
        return $this->belongsTo(User::class, 'id_akunp', 'id');
    }
}
