@extends('admin.app')
@section('title') Chỉnh sửa nhân viên @endsection
@section('content')
<div class="container mt-3">
    <div class="row">
      <div class="col-12 ">
        <form action="{{route('admin.nhanvien.update',$nhanvien->id)}}" method="post">
            @method('PUT')
            @csrf
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="LoaiNV">Loại nhân viên:</label>
            <input type="text" class="form-control rounded-0" id="LoaiNV" placeholder="LoaiNV" name="LoaiNV"
              value="{{$nhanvien->LoaiNV}}">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="HoTen">Tên nhân viên:</label>
            <input type="text" class="form-control rounded-0" id="HoTen" placeholder="HoTen" name="HoTen"
              value="{{$nhanvien->HoTen}}">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="email">Email:</label>
            <input type="email" class="form-control rounded-0" id="email" placeholder="Email" name="email"
              value="{{$nhanvien->email}}">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="email">Password:</label>
            <input type="password" class="form-control rounded-0" id="Password" placeholder="Password" name="password"
              value="">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="Anh">Ảnh nhân viên:</label>
            <input type="text" class="form-control rounded-0" id="Anh" placeholder="Anh" name="Anh"
              value="{{$nhanvien->Anh}}">
          </div>
          <div class="form-group ">
            <button type="submit" class="btn btn-warning text-uppercase rounded-0 font-weight-bold">
              Lưu nhân viên
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
