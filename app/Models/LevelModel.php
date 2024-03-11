<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level'; // Nama tabel level
    
    protected $primaryKey = 'level_id'; // Nama primary key

    protected $fillable = ['level_id', 'level_kode', 'level_nama']; // Kolom yang bisa diisi

    // Relasi dengan UserModel
    public function users(): HasMany {
        return $this->hasMany(UserModel::class, 'level_id', 'level_id');
    }
}
