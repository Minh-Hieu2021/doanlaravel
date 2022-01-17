<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\chitiethoadonnhap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ChiTietHoaDonNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('chitiethoadonnhaps')->get();
        return view('admin.chitiethoadonnhap.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chitiethoadonnhap.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'HoaDonNhap_id' => 'required',
            'SanPham_id' => 'required',
            'SL' => 'required',
            'DonGia' => 'required',
        ]);
        DB::insert('insert into chitiethoadonnhaps (HoaDonNhap_id, SanPham_id, SL, DonGia) values (?, ?, ?, ?, ?)', [$data['HoaDonNhap_id'], $data['SanPham_id'], $data['SL'], $data['DonGia']]);


        return redirect()->route('admin.chitiethoadonnhap')->with('success', 'Thêm thành công!');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chitiethoadonnhap = chitiethoadonnhap::findOrFail($id);
        $chitiethoadonnhap->delete();
        return redirect()->route('admin.chitiethoadonnhap')->with('success', 'Xóa thành công!');
    }
}
