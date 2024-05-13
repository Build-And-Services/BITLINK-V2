<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAkunProdusen extends Model
{
    use HasFactory;

    protected $table = 'data_akun_produsen';

    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    // protected $fillable = [
    //     'nama_pemilik',
    //     'nama_perusahaan',
    //     'nomor_legalitas_usaha',
    //     'alamat_lengkap',
    //     'email',
    //     'telepon',
    //     'username',
    //     'password',
    //     'id_kemitraan',
    // ];

    public function kemitraan()
    {
        return $this->belongsTo(DataMitra::class, 'id_kemitraan');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
