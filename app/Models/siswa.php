<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";

    protected $primaryKey = 'user_id'; // 👉 Laravel akan pakai user_id, bukan id

    public $incrementing = false;      // 👉 Karena user_id biasanya bukan auto-increment
    protected $keyType = 'int';        // 👉 Ganti ke 'string' kalau user_id berupa string

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
