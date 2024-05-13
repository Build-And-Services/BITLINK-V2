<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataEdukasi extends Model
{
    use HasFactory;

    protected $table = 'dataedukasi';
    protected $primaryKey = 'id_edukasi';
    protected $fillable = [
        'tanggal_edukasi',
        'judul_edukasi',
        'isi_edukasi',
        'id_akunp',
        'id_akun_dinas',
    ];

    public function akunProdusen(): BelongsTo
    {
        return $this->belongsTo(DataAkunProdusen::class, 'id_akunp', 'id_user');
    }
    public function akunDinas(): BelongsTo
    {
        return $this->belongsTo(DinasNganjuk::class, 'id_akun_dinas', 'id_user');
    }
}
