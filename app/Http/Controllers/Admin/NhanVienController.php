<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cookie;

class NhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Cookie::get('email');
        $value = DB::table('nhanviens')->where('email', '=', $email)->get();
        $data = DB::table('nhanviens')->paginate(4);
        return view('admin.nhanvien.index', ['data' => $data, 'value' => $value]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $email = Cookie::get('email');
        $value = DB::table('nhanviens')->where('email', '=', $email)->get();
        return view('admin.nhanvien.add', ['value' => $value]);
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
        $data1 = [
            'MaNV' => $data['MaNV'],
            'LoaiNV' => $data['LoaiNV'],
            'HoTen' => $data['HoTen'],
            'email' => $data['email'],
            'password' => $data['password'],
            'Anh' => $imagePath
        ];
        nhanvien::create($data1);
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
        $email = Cookie::get('email');
        $value = DB::table('nhanviens')->where('email', '=', $email)->get();
        $nhanvien = nhanvien::findOrFail($id);
        return view('admin.nhanvien.edit', compact('nhanvien'), ['value' => $value]);
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
        $data = nhanvien::findOrFail($id);
        $this->validate($request, [
            'password' => 'required',
            'email' => 'required',
            'LoaiNV' => 'required',
            'HoTen' => 'required',
        ]);
        $Anh = $data->MaNV . '.jpg';
        if (!$request->hasFile('Anh')) {
            $data['Anh'] = $data->Anh;
        } else {
            File::delete($data->Anh);
            $image = $request->file('Anh');
            $image->move('backend/img/AnhNhanVien', $Anh);
        }
        $data->update([
            'MaNV' => $data->MaNV,
            'LoaiNV' => $request->LoaiNV,
            'HoTen' => $request->HoTen,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Anh' => $data['Anh']
        ]);
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
