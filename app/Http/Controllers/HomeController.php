<?php

namespace App\Http\Controllers;

use App\Models\giohang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\chitietgiohang;
use App\Models\hoadonban;
use App\Models\chitiethoadonban;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

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
        // $data = DB::table('sanphams')->get();
        $data = DB::select('select sanphams.GiaBan, sanphams.Anh, sanphams.id, sanphams.MaSanPham, sanphams.TenSanPham,  SUM(chitiethoadonbans.SL) as TongSL
        from chitiethoadonbans inner JOIN sanphams on chitiethoadonbans.SanPham_id = sanphams.id
        GROUP by sanphams.id,sanphams.MaSanPham, sanphams.TenSanPham,sanphams.Anh,sanphams.GiaBan
        ORDER BY TongSL DESC
        LIMIT 0, ?', [3]);
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
            ->select('chitietgiohangs.id as id', 'sanphams.Anh as Anh', 'sanphams.TenSanPham as TenSanPham', 'sanphams.GiaBan as GiaBan', 'chitietgiohangs.SL as SL')
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

    public function showformnhapthongtinhoadon($sp, $sl = null)
    {
        return view('user.invoice.index');
    }
    public function addInvoice(Request $request)
    {
        $this->validate($request, [
            'DChi' => 'required',
            'SDT' => 'required'
        ]);
        $DChi = $request->DChi;
        $SDTgiao = $request->SDT;
        $sdt = Cookie::get('SDT');
        $idkh = DB::table('khachhangs')->where('SDT', '=', $sdt)->select('id')->first();
        $idgh = DB::table('giohangs')->where('KhachHang_id', '=', $idkh->id)->select('id')->first();
        $chitietgiohang = DB::table('chitietgiohangs')->where('GioHang_id', '=', $idgh->id)->get();
        $date = Carbon::now();
        $tongtien = 0;
        foreach ($chitietgiohang as $item) {
            $dongia = DB::table('sanphams')->where('id', '=', $item->SanPham_id)->select('GiaBan')->first();
            $tongtien += $item->SL * $dongia->GiaBan;
        }
        $mahd = 'HD' . $idkh->id . $date;
        $hoadonban = [
            'Khachhang_id' => $idkh->id,
            'MaHD' => $mahd,
            'NgLap' => $date,
            'TongTien' => $tongtien,
            'TrangThai' => 0,
            'DChi' => $DChi,
            'SDT' => $SDTgiao

        ];
        hoadonban::create($hoadonban);
        $hoadonbanid = DB::table('hoadonbans')->where('MaHD', '=', $mahd)->select('id')->first();
        foreach ($chitietgiohang as $item) {
            $dongia = DB::table('sanphams')->where('id', '=', $item->SanPham_id)->select('GiaBan')->first();
            $chitiethoadonban = [
                'SanPham_id' => $item->SanPham_id,
                'HoaDonBan_id' => $hoadonbanid->id,
                'SL' => $item->SL,
                'GiaBan' => $dongia->GiaBan
            ];
            chitiethoadonban::create($chitiethoadonban);
            $chitietgiohang = chitietgiohang::findOrFail($item->id);
            $chitietgiohang->delete();
        }
        $giohang = giohang::findOrFail($idgh->id);
        $giohang->delete();
        return redirect()->route('home');
    }
    public function addCartQuantity(Request $request, $sp)
    {
        $sl = $request->quantity;
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
    public function updateQuantity(Request $request, $id)
    {
        $quantity = $request->quantity;
        $chitietgiohang = chitietgiohang::findOrFail($id);
        $chitietgiohang->update([
            'GioHang_id' => $chitietgiohang->GioHang_id,
            'SanPham_id' => $chitietgiohang->SanPham_id,
            'SL' => $quantity
        ]);

        return redirect()->route('cart');
    }
    public function deleteCart($id)
    {
        $chitietgiohang = chitietgiohang::findOrFail($id);
        $chitietgiohang->delete();
        return redirect()->route('cart');
    }
}
