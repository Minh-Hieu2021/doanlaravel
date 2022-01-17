<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class sanpham extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'MaSanPham',
        'TenSanPham',
        'GiaBan',
        'SLTK',
        'Anh',
        'MoTa',
    ];
    protected $table = 'sanphams';
}
