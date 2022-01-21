@extends('admin.app')
@section('title') khách hàng  @endsection
@section('content')
<main class="app-content">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <a style="text-decoration:none;font-size:20px" href="{{ route('admin.khachhang.add') }}">thêm khách hàng </a>
    <table class="table table-striped">
        <tr>
            <th>mã khách hàng </th>
            <th>tên khách hàng </th>
            <th>địa chỉ</th>
            <th>Số điện thoại</th>
            <th>mật khẩu</th>
            
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->MaKH }}</td>
            <td>{{ $item->TenKH }}</td>
            <td>{{ $item->Dchi }}</td>
            <td>{{ $item->SDT }}</td>
            <td>{{ $item->MatKhau }}</td>
            
        </tr>
        @endforeach

    </table>
  </main>

@endsection