<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListUMKM extends Model
{
    use HasFactory;

    protected $table = 'dataumkm';

    protected $fillable = [
        'image',
        'title',
        'view',
        'rating',
        'description',
        'location',
        'time_open',
        'time_close'
    ];

}
