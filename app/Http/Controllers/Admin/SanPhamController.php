<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cookie;

class SanPhamController extends Controller
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
        $data = DB::table('sanphams')->get();
        return view('admin.sanpham.index', ['data' => $data, 'value' => $value]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sanpham.add');
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
        $Anh = $data['MaSanPham'] . '.jpg';
        $this->validate($request, [
            'Anh' => 'required',
            'TenSanPham' => 'required',
            'GiaBan' => 'required',
            'SLTK' => 'required',
            'MaSanPham' => 'required',
            'MoTa' => 'required',
        ]);
        $image = $request->file('Anh');
        $imagePath = $image->move('backend/img/AnhSanPham', $Anh);
        DB::insert('insert into sanphams (MaSanPham, TenSanPham, GiaBan, SLTK, MoTa,Anh) values (?, ?, ?, ?, ?, ?)', [$data['MaSanPham'], $data['TenSanPham'], $data['GiaBan'], $data['SLTK'], $data['MoTa'], $imagePath]);


        return redirect()->route('admin.sanpham')->with('success', 'Thêm thành công!');
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
        $sanpham = sanpham::findOrFail($id);
        return view('admin.sanpham.edit', compact('sanpham'));
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
        $sanpham = sanpham::findOrFail($id);
        $this->validate($request, [
            'MaSanPham' => 'require',
            'TenSanPham' => 'required',
            'GiaBan' => 'required',
            'SLTK' => 'required',
            'Anh' => 'required',
            'MoTa' => 'required',

        ]);
        $data = $request->all();
        $data['MaSanPham'] = $sanpham->MaSanPham;
        $Anh = $data['MaSanPham'] . '.jpg';
        if (!$request->hasFile('Anh')) {
            $data['Anh'] = $sanpham->Anh;
        } else {
            File::delete($sanpham->Anh);
            $image = $request->file('Anh');
            $data['Anh'] = $image->move('backend/img/AnhSanpham', $Anh);
        }
        DB::update('update sanphams set MaSanPham = ?, TenSanPham = ?, GiaBan = ?, SLTK = ? , Anh = ?,MoTa = ? where id = ?', [$data['MaSanPham'], $data['TenSanPham'], $data['GiaBan'], $data['SLTK'], $data['Anh'], $data['MoTa'], $id]);
        return redirect()->route('admin.sanpham')->with('success', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = sanpham::findOrFail($id);
        File::delete($sanpham->Anh);
        $sanpham->delete();
        return redirect()->route('admin.sanpham')->with('success', 'Xóa thành công!');
    }
}
