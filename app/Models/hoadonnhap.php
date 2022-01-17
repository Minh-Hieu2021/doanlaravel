<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class hoadonnhap extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'NhanVien_id',
        'MaHD',
        'NgNhap',
        'TongTien',
    ];
    protected $table = 'hoadonnhaps';
}
