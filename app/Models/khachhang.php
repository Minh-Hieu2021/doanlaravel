<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'MaKH',
        'TenKH',
        'Dchi',
        'SDT',
        'MatKhau',
        
    ];
    protected $table = 'khachhangs';
}
