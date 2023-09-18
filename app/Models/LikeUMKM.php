<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeUMKM extends Model
{
    use HasFactory;

    protected $table = 'likeumkm';

    protected $fillable = [
        'idumkm',
        'iduser',
    ];
}
