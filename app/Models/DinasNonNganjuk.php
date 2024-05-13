<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DinasNonNganjuk extends Model // Consider a more descriptive name
{
    use HasFactory;

    protected $table = 'akundinasnonnganjuk'; // Match the table name from the migration
    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
