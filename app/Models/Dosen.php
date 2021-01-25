<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';

    protected $fillable = [
        'nip',
        'name',
        'matkul_id',
        'alamat',
        'slug',
    ];

    public function Matkul()
    {
        return $this->belongsTo(Matkul::class);
    }
}
