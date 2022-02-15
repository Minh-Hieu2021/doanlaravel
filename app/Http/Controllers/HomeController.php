<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\sanpham;

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
        $data = DB::table('sanphams')->get();
        return view('user.layouts',['data' =>$data]);
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
    public function productdetail($sp)
    {
        if(sanpham::where('MaSanPham',$sp)->exists()) {
            $data = sanpham::where('MaSanPham',$sp)->get();
            return view('user.home.productdetail', compact('data'));
        }
    }

}
