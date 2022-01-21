@extends('admin.app')
@section('title') Hoá đơn nhập @endsection
@section('content')
<main class="app-content">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <a style="text-decoration:none;font-size:20px" href="{{ route('admin.hoadonnhap.add') }}">Thêm hoá đơn nhập</a>
    <table class="table table-striped">
        <tr>
            <th>Mã nhân viên</th>
            <th>Mã hoá đơn</th>
            <th>Ngày nhập</th>
            <th>Tổng tiền</th>
            <th>Công cụ</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->NhanVien_id }}</td>
            <td>{{ $item->MaHD }}</td>
            <td>{{ $item->NgNhap }}</td>
            <td>{{ $item->TongTien }}</td>
            <td style="padding:0px">
                <a href="{{ route('admin.hoadonnhap.edit',$item->id) }}"><img style="width:30px" src="{{ asset("backend/icon/edit.png") }}"></img></a>
                <a href="{{ route('admin.hoadonnhap.delete',$item->id) }}"><img style="width:45px" src="{{ asset("backend/icon/remove.png") }}"></img></i></a>
            </td>
        </tr>
        @endforeach

    </table>
  </main>

@endsection
