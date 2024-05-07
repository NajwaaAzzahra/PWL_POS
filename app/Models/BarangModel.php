<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\Barang as  Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class BarangModel extends Model
{
    
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    
    protected $fillable = ['barang_id', 'kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual', 'created_at', 'update_at', 'image'];
    
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }
    public function stok(): HasMany
    {
        return $this->hasMany(StokModel::class, 'barang_id', 'barang_id');
    }
    protected function image(): Attribute {
        return new Attribute(
            get: fn ($image) => url('/storage/posts/' . $image),
        );
    }
}