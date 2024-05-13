<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMitra extends Model
{
    use HasFactory;

    protected $table = 'kemitraan_data';

    protected $primaryKey = 'id_kemitraan';

    protected $fillable = [
        'nama_mitra'
    ];
}
