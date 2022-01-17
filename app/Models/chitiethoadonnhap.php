<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class chitiethoadonnhap extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'HoaDonNhap_id',
        'SanPham_id',
        'SL',
        'DonGia',
    ];
    protected $table = 'chitiethoadonnhaps';
}
