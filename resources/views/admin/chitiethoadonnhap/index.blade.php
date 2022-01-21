@extends('admin.app')
@section('title') Chi tiết hoá đơn nhập @endsection
@section('content')
<main class="app-content">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <a style="text-decoration:none;font-size:20px" href="{{ route('admin.chitiethoadonnhap.add') }}">Thêm chi tiết hoá đơn nhập</a>
    <table class="table table-striped">
        <tr>
            <th>Mã hoá đơn</th>
            <th>Mã sản phẩm đã có</th>
            <th>Mã sản phẩm mới</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Công cụ</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->HoaDonNhap_id }}</td>
            <td>{{ $item->SanPham_id }}</td>
            <td>{{ $item->MaSanPham }}</td>
            <td>{{ $item->SL }}</td>
            <td>{{ $item->GiaBan }}</td>
            <td style="padding:0px">
                <a href="{{ route('admin.chitiethoadonnhap.edit',$item->id) }}"><img style="width:30px" src="{{ asset("backend/icon/edit.png") }}"></img></a>
                <a href="{{ route('admin.chitiethoadonnhap.delete',$item->id) }}"><img style="width:45px" src="{{ asset("backend/icon/remove.png") }}"></img></i></a>
            </td>
        </tr>
        @endforeach

    </table>
  </main>

@endsection
