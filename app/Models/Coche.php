<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{

    use HasFactory;

    protected $table = 'coche';

    protected $fillable = [
        'modelo',
        'marca',
        'precio',
        'imagen',
    ];

    public $timestamps = false;
}
