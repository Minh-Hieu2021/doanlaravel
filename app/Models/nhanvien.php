<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class nhanvien extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'MaNV',
        'LoaiNV',
        'HoTen',
        'email',
        'password',
        'MaNV',
        'Anh',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $table = 'nhanviens';
}
