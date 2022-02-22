<?php

namespace App\Http\Controllers;

use App\Models\giohang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\chitietgiohang;
use Illuminate\Support\Facades\Cookie;

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
        return view('user.home.index', ['data' => $data]);
    }
    public function cart()
    {
        $total = 0;
        $sdt = Cookie::get('SDT');
        $idkh = DB::table('khachhangs')->where('SDT', '=', $sdt)->select('id')->first();
        $data = DB::table('giohangs')->where('KhachHang_id', '=', $idkh->id)
            ->join('chitietgiohangs', 'giohangs.id', '=', 'chitietgiohangs.GioHang_id')
            ->join('sanphams', 'chitietgiohangs.SanPham_id', '=', 'sanphams.id')
            ->select('sanphams.Anh as Anh', 'sanphams.TenSanPham as TenSanPham', 'sanphams.GiaBan as GiaBan', 'chitietgiohangs.SL as SL')
            ->addSelect(DB::raw('sanphams.GiaBan*chitietgiohangs.SL as Total'))->get();
        return view('user.cart.index', ['data' => $data]);
    }
    public function productdetail($sp)
    {
        if (sanpham::where('MaSanPham', $sp)->exists()) {
            $data = sanpham::where('MaSanPham', $sp)->get();
            return view('user.home.productdetail', compact('data'));
        }
    }
    public function addCart($sp, $sl = null)
    {
        if ($sl == null) {
            $sl = 1;
        }
        $sdt = Cookie::get('SDT');
        $idkh = DB::table('khachhangs')->where('SDT', '=', $sdt)->select('id')->first();
        $idgh = DB::table('giohangs')->where('KhachHang_id', '=', $idkh->id)->select('id')->first();
        if ($idgh == null) {
            $giohang = [
                'KhachHang_id' => $idkh->id
            ];
            giohang::create($giohang);
            $idgh = DB::table('giohangs')->where('KhachHang_id', '=', $idkh->id)->select('id')->first();
        }
        $SanPham_id = DB::table('chitietgiohangs')->where('SanPham_id', '=', $sp)->first();
        if ($SanPham_id == null) {
            $chitietgiohang = [
                'GioHang_id' => $idgh->id,
                'SanPham_id' => $sp,
                'SL' => $sl,
            ];
            chitietgiohang::create($chitietgiohang);
        } else {
            $chitietgiohang = chitietgiohang::findOrFail($SanPham_id->id);
            $chitietgiohang->update([
                'GioHang_id' => $SanPham_id->GioHang_id,
                'SanPham_id' => $SanPham_id->SanPham_id,
                'SL' => $SanPham_id->SL + $sl,
            ]);
        }


        return redirect()->route('cart');
    }
}
