<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataTracking extends Model
{
    use HasFactory;

    protected $table = 'datatracking';
    protected $primaryKey = 'id_tracking';
    protected $fillable = [
        'Status',
        'id_kontrakpembelian',
    ];

    public function kontrakPembelian(): BelongsTo
    {
        return $this->belongsTo(DataKontrakPembelian::class, 'id_kontrakpembelian', 'id_kontrakpembelian');
    }
}
