<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KejuruanModel extends Model
{
    use HasFactory;

    protected $table = 'kejuruan';

    protected $fillable = [
        'nama_kejuruan',
    ];

    protected $hidden = [
        'id',
    ];
}
