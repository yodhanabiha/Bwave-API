<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewUmkm extends Model
{
    use HasFactory;

    protected $table = 'viewumkm';

    protected $fillable = [
        'idumkm',
        'iduser',
    ];
}
