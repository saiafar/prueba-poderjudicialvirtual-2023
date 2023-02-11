<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'base',
        'impuesto',
        'neto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
