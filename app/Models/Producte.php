<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producte extends Model
{
    /** @use HasFactory<\Database\Factories\ProducteFactory> */
    use HasFactory;

    protected $fillable = [
        'nom',
        "descripcio",
        "preu",
        "quantitat",
        "imatge",
    ];
}
