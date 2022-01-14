@extends('admin.app')
@section('title') Nhân viên @endsection
@section('content')
<main class="app-content">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <a style="text-decoration:none;font-size:20px" href="{{ route('admin.nhanvien.add') }}">Thêm nhân viên</a>
    <table class="table table-striped">
        <tr>
            <th>Mã nhân viên</th>
            <th>Tên nhân viên</th>
            <th>Loại nhân viên</th>
            <th>Email</th>
            <th>Ảnh</th>
            <th></th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->MaNV }}</td>
            <td>{{ $item->HoTen }}</td>
            <td>{{ $item->LoaiNV }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->Anh }}</td>
            <td style="padding:0px">
                <a href="{{ route('admin.nhanvien.edit',$item->id) }}"><img style="width:30px" src="{{ asset("backend/icon/edit.png") }}"></img></a>
                <a href="{{ route('admin.nhanvien.delete',$item->id) }}"><img style="width:45px" src="{{ asset("backend/icon/remove.png") }}"></img></i></a>
            </td>
        </tr>
        @endforeach

    </table>
  </main>

@endsection
