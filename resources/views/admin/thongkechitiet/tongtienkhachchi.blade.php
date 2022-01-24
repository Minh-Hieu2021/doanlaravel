@extends('admin.app')
@section('title') Doanh thu @endsection
@section('content')
<main class="app-content">
    <div>
        <h5>Tổng tiền khách hàng đã chi</h5><br>
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
                @if ($item->Tiendachi != null)
                <td>{{ $item->Tiendachi }} VND</td>
                @else
                <td>0 VND</td>
                @endif

            </tr>
            @endforeach
        </table>
    </div><br>
  </main>

@endsection
