@extends('admin.app')
@section('title') Sản Phẩm @endsection
@section('content')
<main class="app-content">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <a style="text-decoration:none;font-size:20px" href="{{ route('admin.sanpham.add') }}">Thêm sản phẩm</a>
    <table class="table table-striped">
        <tr>
            <th>Mã nhân viên</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Bán</th>
            <th>SLTK</th>
            <th>Mô Tả</th>
            <th>Ảnh</th>

        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->MaSanPham }}</td>
            <td>{{ $item->TenSanPham }}</td>
            <td>{{ $item->GiaBan }}</td>
            <td>{{ $item->SLTK }}</td>
            <td>{{ $item->MoTa }}</td>
            <td style="padding:5px"><img style="width:100px" src="{{ asset($item->Anh) }}" alt=""></td>
            <td style="padding:0px">
                <a href="{{ route('admin.sanpham.edit',$item->id) }}"><img style="width:30px" src="{{ asset("backend/icon/edit.png") }}"></img></a>
                <a href="{{ route('admin.sanpham.delete',$item->id) }}"><img style="width:45px" src="{{ asset("backend/icon/remove.png") }}"></img></i></a>
            </td>
        </tr>
        @endforeach

    </table>
  </main>

@endsection
