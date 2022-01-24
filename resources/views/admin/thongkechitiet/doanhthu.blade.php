@extends('admin.app')
@section('title') Doanh thu @endsection
@section('content')
<main class="app-content">
    <div>

        <form action="{{ route('admin.thongkechitiet.doanhthu') }}">
            <h5>Doanh thu theo khoảng thời gian</h5><br>
            <input style="height: 34px;" type="date" name="datedtstart"> -
            <input style="height: 34px;" max="{{ Now() }}" type="date" name="datedtend">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </form><br>
            <h5>Doanh thu trong khoảng thời gian trên là: @foreach ($doanhthu as  $item)
                {{ $item->dt }}
            @endforeach VND</h5><br>
    </div>
  </main>

@endsection
