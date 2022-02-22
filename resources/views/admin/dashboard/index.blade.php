@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')
<main class="app-content">
    <div class="row">
      <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
          <i class="icon fa fa-users fa-3x"></i>
          <div class="info">
            <h4>Users</h4>
            <p><b>5</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon">
          <i class="icon fa fa-thumbs-o-up fa-3x"></i>
          <div class="info">
            <h4>Likes</h4>
            <p><b>25</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon">
          <i class="icon fa fa-files-o fa-3x"></i>
          <div class="info">
            <h4>Uploades</h4>
            <p><b>10</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon">
          <i class="icon fa fa-star fa-3x"></i>
          <div class="info">
            <h4>Stars</h4>
            <p><b>500</b></p>
          </div>
        </div>
      </div>
    </div>
    <div>
        <h5>Danh sách hóa đơn trong tuần</h5><br>
        <table class="table table-striped">
            <tr>
                <th>Mã hóa đơn</th>
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
    <div>
        <h5>Tổng tiền khách hàng đã chi của các khách hàng mua hàng trong tuần</h5><br>
        <table class="table table-striped">
            <tr>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Số tiền đã chi</th>
            </tr>
            @foreach ($listtienkhchi as $item)
            <tr>
                <td>{{ $item->MaKH }}</td>
                <td>{{ $item->TenKH }}</td>
                <td>{{ $item->Tiendachi }} VND</td>
            </tr>
            @endforeach

        </table>
    </div><br>
    <div>
        <h5>Doanh thu tuần hiện tại: @foreach ($doanhthu as  $item)
            {{ $item->dt }}
        @endforeach VND</h5><br>
    </div><br>
  </main>

@endsection
