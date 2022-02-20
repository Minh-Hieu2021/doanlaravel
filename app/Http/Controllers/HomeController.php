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
        return view('user.home.index',['data' =>$data]);
    }
    public function cart()
    {
        // $this->middleware('auth');
        $total = 0;
        $data = DB::table('giohangs')
        ->join('chitietgiohangs','giohangs.id','=','chitietgiohangs.GioHang_id')
        ->join('sanphams','chitietgiohangs.SanPham_id','=','sanphams.id')
        ->select('sanphams.Anh as Anh', 'sanphams.TenSanPham as TenSanPham', 'sanphams.GiaBan as GiaBan', 'chitietgiohangs.SL as SL')
        ->addSelect(DB::raw('sanphams.GiaBan*chitietgiohangs.SL as Total'))->get();
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
