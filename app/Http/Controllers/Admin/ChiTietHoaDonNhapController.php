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
            'MaSanPham' => 'required',
            'SL' => 'required',
            'GiaBan' => 'required',
        ]);
        DB::insert('insert into chitiethoadonnhaps (HoaDonNhap_id, SanPham_id, MaSanPham, SL, GiaBan) values (?, ?, ?, ?, ?)', [$data['HoaDonNhap_id'], $data['SanPham_id'], $data['MaSanPham'], $data['SL'], $data['GiaBan']]);


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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chitiethoadonnhap = chitiethoadonnhap::findOrFail($id);
        return view('admin.chitiethoadonnhap.edit', compact('chitiethoadonnhap'));
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
        $chitiethoadonnhap = chitiethoadonnhap::findOrFail($id);
        $this->validate($request, [
            'MaSanPham' => 'required',
            'SL' => 'required',
            'GiaBan' => 'required',
        ]);
        $data = $request->all();
        $data['HoaDonNhap_id'] = $chitiethoadonnhap->HoaDonNhap_id;
        $data['SanPham_id'] = $chitiethoadonnhap->SanPham_id;
        DB::update('update chitiethoadonnhaps set HoaDonNhap_id = ?, SanPham_id = ?, MaSanPham = ? , SL = ?, GiaBan = ?, where id = ?', [$chitiethoadonnhap->HoaDonNhap_id, $chitiethoadonnhap->SanPham_id, $data['MaSanPham'], $data['SL'], $data['GiaBan'], $id]);
        return redirect()->route('admin.chitiethoadonnhap')->with('success', 'Sửa thành công!');
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
