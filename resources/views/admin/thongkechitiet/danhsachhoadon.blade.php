@extends('admin.app')
@section('title') Doanh thu @endsection
@section('content')
<main class="app-content">
    <div>
        <form action="">
        <h5>Danh sách hóa đơn theo khoảng thời gian</h5><br>
        <input style="height: 34px;" type="date" name="datehdstart"> -
        <input style="height: 34px;" type="date" name="datehdend">
        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </form><br>
        <table class="table table-striped">
            <tr>
                <th>Mã hóa đơn</th>
                <th>Nhân viên</th>
                <th>Khách hàng</th>
                <th>Ngày lập</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>SDT</th>
                <th>Địa chỉ</th>
            </tr>
            @foreach ($listhd as $item)
            <tr>
                <td>{{ $item->MaHD }}</td>
                <td>{{ $item->HoTen }}</td>
                <td>{{ $item->TenKH }}</td>
                <td>{{ $item->NgLap }}</td>
                <td>{{ $item->TongTien }} VND</td>
                @if ($item->TrangThai == 1)
                <td><button class="btn btn-success">True</button></td>
                @else
                <td><button class="btn btn-danger">False</button></td>
                @endif
                <td>{{ $item->SDT }}</td>
                <td>{{ $item->DChi }}</td>
            </tr>
            @endforeach
        </table>
    </div><br>
  </main>

@endsection
