<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DinasNganjuk extends Model
{
    use HasFactory;

    protected $table = 'akundinasnganjuk'; // Match the table name from the migration
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
