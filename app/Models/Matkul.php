<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table = 'matkul';

    protected $fillable = [
        'matkul_id',
        'name',
        'slug'
    ];

    public function Dosen()
    {
        return $this->hasMany(Dosen::class);
    }
}
