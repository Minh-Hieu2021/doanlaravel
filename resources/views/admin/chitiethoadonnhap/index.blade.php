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
            <th>Mã sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Công cụ</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->HoaDonNhap_id }}</td>
            <td>{{ $item->SanPham_id }}</td>
            <td>{{ $item->SL }}</td>
            <td>{{ $item->DonGia }}</td>
            <td style="padding:0px">
                <a href="{{ route('admin.chitiethoadonnhap.delete',$item->id) }}"><img style="width:45px" src="{{ asset("backend/icon/remove.png") }}"></img></i></a>
            </td>
        </tr>
        @endforeach

    </table>
  </main>

@endsection
