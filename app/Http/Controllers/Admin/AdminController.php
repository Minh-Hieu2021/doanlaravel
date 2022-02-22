<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Cookie::get('email');
        $value = DB::select('select * from nhanviens where email = ?', [$email]);
        $listhd = DB::select('select *
                            from hoadonbans
                            inner join khachhangs on hoadonbans.khachhang_id = khachhangs.id
                            where NgLap >= ?', [Carbon::now()->startOfWeek()]);
        $listtienkhchi = DB::select('select khachhangs.id, khachhangs.MaKH as MaKH, khachhangs.TenKH as TenKH, sum(hoadonbans.TongTien) as Tiendachi
                                    from hoadonbans inner join khachhangs on hoadonbans.khachhang_id = khachhangs.id
                                    where hoadonbans.NgLap >= ?
                                    GROUP BY khachhangs.id,khachhangs.MaKH,khachhangs.TenKH', [Carbon::now()->startOfWeek()]);
        $doanhthu = DB::select('select sum(hoadonbans.TongTien) as dt from hoadonbans where NgLap >= ?', [Carbon::now()->startOfWeek()]);
        return view('admin.dashboard.index', ['listhd' => $listhd, 'listtienkhchi' => $listtienkhchi, 'doanhthu' => $doanhthu, 'value' => $value]);
    }
    public function doanhthu(Request $request)
    {
        $email = Cookie::get('email');
        $value = DB::select('select * from nhanviens where email = ?', [$email]);
        if ($request->datedtstart == $request->datedtend) {
            $doanhthu  = DB::select('select sum(hoadonbans.TongTien) as dt from hoadonbans where DATE(NgLap) LIKE ?', [$request->datedtstart]);
        } else {
            $doanhthu  = DB::select('select sum(hoadonbans.TongTien) as dt from hoadonbans where DATE(NgLap) >= ? and DATE(NgLap) <= ?', [$request->datedtstart, $request->datedtend]);
        }

        return view('admin.thongkechitiet.doanhthu', ['doanhthu' => $doanhthu, 'value' => $value]);
    }
    public function doanhso(Request $request)
    {
        $email = Cookie::get('email');
        $value = DB::select('select * from nhanviens where email = ?', [$email]);
        if ($request->datedsstart == $request->datedsend) {
            $doanhso  = DB::select('select sanphams.MaSanPham, sanphams.TenSanPham,  SUM(chitiethoadonbans.SL) as TongSL
            from chitiethoadonbans
            inner JOIN sanphams on chitiethoadonbans.SanPham_id = sanphams.id
            inner JOIN hoadonbans on chitiethoadonbans.HoaDonBan_id = hoadonbans.id
            WHERE DATE(hoadonbans.NgLap) >= ?
            GROUP by sanphams.id,sanphams.MaSanPham, sanphams.TenSanPham
            ORDER BY TongSL DESC', [$request->datedsstart]);
        } else {
            $doanhso  = DB::select('select sanphams.MaSanPham, sanphams.TenSanPham,  SUM(chitiethoadonbans.SL) as TongSL
            from chitiethoadonbans
            inner JOIN sanphams on chitiethoadonbans.SanPham_id = sanphams.id
            inner JOIN hoadonbans on chitiethoadonbans.HoaDonBan_id = hoadonbans.id
            WHERE DATE(hoadonbans.NgLap) >= ? and DATE(hoadonbans.NgLap) <= ?
            GROUP by sanphams.id,sanphams.MaSanPham, sanphams.TenSanPham
            ORDER BY TongSL DESC', [$request->datedsstart, $request->datedsend]);
        }
        return view('admin.thongkechitiet.doanhso', ['value' => $value, 'doanhso' => $doanhso]);
    }
    public function topsanpham(Request $request)
    {
        $email = Cookie::get('email');
        $value = DB::select('select * from nhanviens where email = ?', [$email]);
        $topsp = DB::select('select sanphams.MaSanPham, sanphams.TenSanPham,  SUM(chitiethoadonbans.SL) as TongSL
                            from chitiethoadonbans inner JOIN sanphams on chitiethoadonbans.SanPham_id = sanphams.id
                            GROUP by sanphams.id,sanphams.MaSanPham, sanphams.TenSanPham
                            ORDER BY TongSL DESC
                            LIMIT 0, ?', [$request->topsanpham]);
        $i = 1;
        return view('admin.thongkechitiet.topsanpham', ['topsp' => $topsp, 'i' => $i, 'value' => $value]);
    }
    public function tongtienkhachchi()
    {
        $email = Cookie::get('email');
        $value = DB::select('select * from nhanviens where email = ?', [$email]);
        $listtienkhchi = DB::select('select khachhangs.id, khachhangs.MaKH as MaKH, khachhangs.TenKH as TenKH, sum(hoadonbans.TongTien) as Tiendachi
        from hoadonbans RIGHT join khachhangs on hoadonbans.khachhang_id = khachhangs.id
        GROUP BY khachhangs.id,khachhangs.MaKH,khachhangs.TenKH');
        return view('admin.thongkechitiet.tongtienkhachchi', ['listtienkhchi' => $listtienkhchi, 'value' => $value]);
    }
    public function danhsachhoadontheokhoangthoigian(Request $request)
    {
        $email = Cookie::get('email');
        $value = DB::select('select * from nhanviens where email = ?', [$email]);
        $listhd = DB::select('select *
        from hoadonbans
        inner join khachhangs on hoadonbans.khachhang_id = khachhangs.id
        where DATE(NgLap) >= ? and DATE(NgLap) <= ?
        ORDER BY NgLap ASC', [$request->datehdstart, $request->datehdend]);
        return view('admin.thongkechitiet.danhsachhoadon', ['listhd' => $listhd, 'value' => $value]);
    }
    public function profile()
    {
        $email = Cookie::get('email');
        $value = DB::select('select * from nhanviens where email = ?', [$email]);
        return view('admin.profile.index', ['value' => $value]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
