<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.layouts');
    }
    public function cart()
    {
        // $this->middleware('auth');
        $data = DB::select('select sanphams.Anh as Anh, sanphams.TenSanPham, sanphams.GiaBan, chitietgiohangs.SL,  sanphams.GiaBan*chitietgiohangs.SL as Total
        from giohangs
        inner JOIN chitietgiohangs on giohangs.id = chitietgiohangs.GioHang_id
        INNER JOIN sanphams on chitietgiohangs.SanPham_id = sanphams.id
        WHERE giohangs.KhachHang_id = 2');
        return view('user.cart.index', ['data' => $data]);
    }
}
