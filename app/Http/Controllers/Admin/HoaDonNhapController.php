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
            'MaHD' => 'required',
            'NhanVien_id' => 'required',
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
