<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListTopikModel extends Model
{
    use HasFactory;

    protected $table = 'listtopik';

    protected $fillable = [
        'id_kejuruan',
        'title',
        'description',
        'status',
        'price',
        'level',
        'duration',
        'instructor',
        'photo',
    ];

    protected $hidden = [
        'id',
    ];
}
