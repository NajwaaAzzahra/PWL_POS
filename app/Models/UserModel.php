<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user'; //mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primarykey = 'user_id'; //mendefinisikan primary key yang digunakan

    //js 4 percobaan 1
    protected $fillable=['level_id', 'username', 'nama'];
}
