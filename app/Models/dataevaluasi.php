<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataEvaluasi extends Model
{
    use HasFactory;

    protected $table = 'dataevaluasi';
    protected $primaryKey = 'id_evaluasi';
    protected $fillable = [
        'id_akunp',
        'tgl_evaluasi',
        'kinerja_produksi',
        'kualitas_benih',
        'kendala_produksi',
        'saran_produksi',
    ];

    public function akunProdusen(): BelongsTo
    {
        return $this->belongsTo(DataAkunProdusen::class, 'id', 'id_akunp');
    }
}
