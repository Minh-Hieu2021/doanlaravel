@extends('admin.app')
@section('title') Doanh thu @endsection
@section('content')
<main class="app-content">
    <div>
        <form action="{{ route('admin.thongkechitiet.doanhso') }}">
        <h5>Danh số bán hàng theo khoảng thời gian</h5><br>
        <input style="height: 34px;" type="date" name="datedsstart"> -
        <input style="height: 34px;" type="date" name="datedsend">
        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form><br>
        <table class="table table-striped">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
            </tr>
            @foreach ($doanhso as $item)
                <tr>
                    <td>{{ $item->MaSanPham }}</td>
                    <td>{{ $item->TenSanPham }}</td>
                    <td>{{ $item->TongSL }}</td>
                </tr>
            @endforeach

        </table>
    </div><br>
  </main>

@endsection
