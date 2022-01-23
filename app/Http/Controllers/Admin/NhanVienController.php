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
        $data = DB::table('nhanviens')->paginate(2);
        return view('admin.nhanvien.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nhanvien.add');
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
        $data['password'] = Hash::make($request->password);
        $Anh = $data['MaNV'] . '.jpg';
        $this->validate($request, [
            'Anh' => 'required',
            'password' => 'required',
            'email' => 'required',
            'MaNV' => 'required',
            'LoaiNV' => 'required',
            'HoTen' => 'required',
        ]);
        $image = $request->file('Anh');
        $imagePath = $image->move('backend/img/AnhNhanVien', $Anh);
        DB::insert('insert into nhanviens (MaNV, LoaiNV, HoTen, email, password, Anh) values (?, ?, ?, ?, ?, ?)', [$data['MaNV'], $data['LoaiNV'], $data['HoTen'], $data['email'], $data['password'], $imagePath]);


        return redirect()->route('admin.nhanvien')->with('success', 'Thêm thành công!');
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
        $nhanvien = nhanvien::findOrFail($id);
        return view('admin.nhanvien.edit', compact('nhanvien'));
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
        $nhanvien = nhanvien::findOrFail($id);
        $this->validate($request, [
            'password' => 'required',
            'email' => 'required',
            'LoaiNV' => 'required',
            'HoTen' => 'required',
        ]);
        $data = $request->all();
        $data['MaNV'] = $nhanvien->MaNV;
        $Anh = $data['MaNV'] . '.jpg';
        if (!$request->hasFile('Anh')) {
            $data['Anh'] = $nhanvien->Anh;
        } else {
            File::delete($nhanvien->Anh);
            $image = $request->file('Anh');
            $data['Anh'] = $image->move('backend/img/AnhNhanVien', $Anh);
        }
        $data['password'] = Hash::make($request->password);
        DB::update('update nhanviens set MaNV = ?, LoaiNV = ?, HoTen = ?, email = ? , password = ?, Anh = ? where id = ?', [$nhanvien->MaNV, $data['LoaiNV'], $data['HoTen'], $data['email'], $data['password'], $data['Anh'], $id]);
        return redirect()->route('admin.nhanvien')->with('success', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhanvien = nhanvien::findOrFail($id);
        File::delete($nhanvien->Anh);
        $nhanvien->delete();
        return redirect()->route('admin.nhanvien')->with('success', 'Xóa thành công!');
    }
}
