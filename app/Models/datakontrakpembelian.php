<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKontrakPembelian extends Model
{
    use HasFactory;

    protected $table = 'datakontrakpembelian';

    protected $fillable = [
        'tgl_kontrakpembelian',
        'id_akunm',
        'id_benih',
        'quantity',
        'alamat_lengkap',
        'email',
        'telepon',
        'tgl_pengiriman',
        'pembayaran',
        'status_kontrak',
    ];

    public function akunm()
    {
        return $this->belongsTo(DinasLuarDaerah::class, 'id_akunm', 'id_akunm');
    }

    public function benih()
    {
        return $this->belongsTo(BenihData::class, 'id_benih', 'id_benih');
    }
}
