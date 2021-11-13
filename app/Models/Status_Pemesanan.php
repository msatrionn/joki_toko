<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_Pemesanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_status';
    protected $table = 'status_pemesanan';
    protected $fillable = ['pemesanan_id', 'status'];
}
