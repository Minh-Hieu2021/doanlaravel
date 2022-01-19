<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class NhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('khachhangs')->get();
        return view('admin.khachhang.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.khachhang.add');
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
            
            'MaKH' => 'required',
            'TenKH' => 'required',
            'Dchi' => 'required',
            'SDT' => 'required',
            'MatKhau' => 'required',
        ]);
        DB::insert('insert into khachhangs (MaKH, TenKH, Dchi, SDT, MatKhau ) values (?, ?, ?, ?, ?, ?)', [$data['MaKH'], $data['TenKH'], $data['Dchi'], $data['SDT'], $data['MatKhau']]);


        return redirect()->route('admin.khachhang')->with('success', 'Thêm thành công!');
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
        $khachhang = khachhang::findOrFail($id);
        return view('admin.khachhang.edit', compact('khachhang'));
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
        $khachhang = khachhang::findOrFail($id);
        $this->validate($request, [
            'MaKH' => 'required',
            'TenKH' => 'required',
            'Dchi' => 'required',
            'SDT' => 'required',
            'MatKhau' => 'required',
        ]);
        $data = $request->all();
        
        DB::update('update khachhangs set MaNV = ?, LoaiNV = ?, HoTen = ?, email = ? , password = ?, Anh = ? where id = ?', [$nhanvien->MaNV, $data['LoaiNV'], $data['HoTen'], $data['email'], $data['password'], $data['Anh'], $id]);
        return redirect()->route('admin.khachhang')->with('success', 'Sửa thành công!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khachhang = khachhang::findOrFail($id);
        File::delete($khachhang->id);
        $khachhang->delete();
        return redirect()->route('admin.khachhang')->with('success', 'Xóa thành công!');
    }
}
