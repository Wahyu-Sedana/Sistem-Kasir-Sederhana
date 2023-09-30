<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class JenisBarang extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_jenis_barang';

    protected $fillable = [
        'nama_jenis',
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
