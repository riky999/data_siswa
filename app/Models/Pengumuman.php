<?php
// app/Models/Pengumuman.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumumen'; // Nama tabel di database

    protected $fillable = [
        'no',
        'title',
        'date',
        'content',
    ];
}


