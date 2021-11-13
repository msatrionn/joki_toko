<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pembeli';
    protected $table = 'pembeli';
    protected $fillable = ['user_id', 'nama_pembeli', 'alamat', 'no_hp'];
}
