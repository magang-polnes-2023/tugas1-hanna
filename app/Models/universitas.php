<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class universitas extends Model
{
    use HasFactory;
    protected $table = 'universitas';
    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'email',
        'akreditas'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(mahasiswa::class);
    }
}
