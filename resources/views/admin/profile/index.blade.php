@extends('admin.app')
@section('title') Profile @endsection
@section('content')
@foreach ($value as $item)
<div style="margin: 0px;" class="container">
    <div class="row">
        <div class="col-md-4">
            <div><img style='display: grid;width: 150px;height: 200px;' src="{{ asset($item->Anh) }}" alt=""/><span style="font-size:20px">{{ $item->HoTen }}</span></div>
        </div>
        <div class="col-md-8">
            <span>Họ Tên : {{ $item->HoTen }}</span><br>
            <span>Email : {{ $item->email }}</span>
        </div>
    </div>
</div>
@endforeach

@endsection
