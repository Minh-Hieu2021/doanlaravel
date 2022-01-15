@extends('admin.app')
@section('title') Thêm nhân viên @endsection
@section('content')
<div class="container mt-3">
    @if($errors->first('Anh')!=null || $errors->first('email')!=null || $errors->first('password')!=null ||$errors->first('LoaiNV')!=null || $errors->first('HoTen')!=null || $errors->first('MaNV')!=null)
    <span style="color:red">Bạn phải nhập đầy đủ tất cả thông tin</span>
    @endif
    <div class="d-flex flex-row">
      <div class="col-12 px-0">
        <form action="{{route('admin.nhanvien.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="MaNV">Mã nhân viên:</label>
            <input type="text" class="form-control rounded-0" id="MaNV" placeholder="MaNV" name="MaNV">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="LoaiNV">Loại nhân viên:</label>
            <input type="text" class="form-control rounded-0" id="LoaiNV" placeholder="LoaiNV" name="LoaiNV">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="HoTen">Tên nhân viên:</label>
            <input type="text" class="form-control rounded-0" id="HoTen" placeholder="HoTen" name="HoTen">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="email">email</label>
            <input type="email" class="form-control rounded-0" id="email" placeholder="Email" name="email">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="password">password</label>
            <input type="password" class="form-control rounded-0" id="password" placeholder="Password" name="password">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="Anh">Ảnh nhân viên:</label>
            <input type="file" class="form-control rounded-0" id="Anh" placeholder="Anh" name="Anh">
          </div>
          <div class="form-group ">
            <button type="submit" class="btn btn-danger text-uppercase rounded-0 font-weight-bold">
              Thêm nhân viên
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
