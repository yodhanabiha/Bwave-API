<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewUmkm extends Model
{
    use HasFactory;
    protected $table = 'riviewumkm';

    protected $fillable = [
        'idumkm',
        'iduser',
        'rating'
    ];
}
