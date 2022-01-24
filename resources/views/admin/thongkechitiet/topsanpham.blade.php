@extends('admin.app')
@section('title') Doanh thu @endsection
@section('content')
<main class="app-content">
    <div>
        <form action="{{ route('admin.thongkechitiet.topsanpham') }}">
        <h5>Top sản phẩm bán chạy</h5><br>
        <select style="height: 34px;" name="topsanpham" id="">
            <option value="5">Top 5</option>
            <option value="10">Top 10</option>
            <option value="15">Top 15</option>
        </select>
        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form><br>
        <table class="table table-striped">
            <tr>
                <th>STT</th>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
            </tr>
            @foreach ($topsp as $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->MaSanPham }}</td>
                <td>{{ $item->TenSanPham }}</td>
                <td>{{ $item->TongSL }}</td>
            </tr>
            @endforeach

        </table>
    </div><br>
  </main>

@endsection
