<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\hoadonnhap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class HoaDonNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('hoadonnhaps')->get();
        return view('admin.hoadonnhap.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hoadonnhap.add');
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
            'NhanVien_id' => 'required',
            'MaHD' => 'required',
            'NgNhap' => 'required',
            'TongTien' => 'required',
        ]);
        DB::insert('insert into hoadonnhaps (NhanVien_id, MaHD, NgNhap, TongTien) values (?, ?, ?, ?)', [$data['NhanVien_id'], $data['MaHD'],  $data['NgNhap'], $data['TongTien']]);


        return redirect()->route('admin.hoadonnhap')->with('success', 'Thêm thành công!');
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
        $hoadonnhap = hoadonnhap::findOrFail($id);
        return view('admin.hoadonnhap.edit', compact('hoadonnhap'));
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
        $hoadonnhap = hoadonnhap::findOrFail($id);
        $this->validate($request, [
            'NhanVien_id' => 'required',
            'NgNhap' => 'required',
            'TongTien' => 'required',
        ]);
        $data = $request->all();
        $data['MaHD'] = $hoadonnhap->MaHD;
        DB::update('update hoadonnhaps set NhanVien_id = ?, MaHD = ?, NgNhap = ? , TongTien = ?, where id = ?', [$data['NhanVien_id'], $hoadonnhap->MaHD, $data['NgNhap'], $data['TongTien'], $id]);
        return redirect()->route('admin.hoadonnhap')->with('success', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hoadonnhap = hoadonnhap::findOrFail($id);
        $hoadonnhap->delete();
        return redirect()->route('admin.hoadonnhap')->with('success', 'Xóa thành công!');
    }
}
