<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";

    protected $primaryKey = 'user_id';

    public $incrementing = false;      
    protected $keyType = 'int';     

    protected $fillable = [
        'user_id',
        'nomer_induk',
        'nama',
        'alamat',
        'kelas',
        'pdf',
        'foto'
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
