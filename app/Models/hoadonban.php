<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonban extends Model
{
    use HasFactory;
    protected $fillable = [
        'Khachhang_id',
        'MaHD',
        'NgLap',
        'TongTien',
        'TrangThai',
        'SDT',
        'DChi'
    ];
    protected $table = 'hoadonbans';
}
