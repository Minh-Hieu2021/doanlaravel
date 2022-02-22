<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietgiohang extends Model
{
    use HasFactory;
    protected $fillable = [
        'GioHang_id',
        'SanPham_id',
        'SL'
    ];
    protected $table = 'chitietgiohangs';
}
