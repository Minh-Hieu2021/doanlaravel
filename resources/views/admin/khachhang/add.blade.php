@extends('admin.app')
@section('title') Thêm khách hàng @endsection
@section('content')
<div class="container mt-3">
    @if($errors->first('MaKH')!=null || $errors->first('TenKH')!=null ||$errors->first('Dchi')!=null || $errors->first('SDT')!=null || $errors->first('MatKhau')!=null)
    <span style="color:red">Bạn phải nhập đầy đủ tất cả thông tin</span>
    @endif
    <div class="d-flex flex-row">
      <div class="col-12 px-0">
        <form action="{{route('admin.khachhang.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="MaKH">Mã khách hàng :</label>
            <input type="text" class="form-control rounded-0" id="MaKH" placeholder="MaKH" name="MaKH">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="TenKH">tên  khách hàng :</label>
            <input type="text" class="form-control rounded-0" id="TenKH" placeholder="TenKH" name="TenKH">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="DChi">địa chỉ :</label>
            <input type="text" class="form-control rounded-0" id="DChi" placeholder="DChi" name="DChi">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="SDT"> số điện thoại :</label>
            <input type="text" class="form-control rounded-0" id="SDT" placeholder="SDT" name="SDT">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="MatKhau">password</label>
            <input type="password" class="form-control rounded-0" id="MatKhau" placeholder="MatKhau" name="MatKhau">
          </div>

          <div class="form-group ">
            <button type="submit" class="btn btn-danger text-uppercase rounded-0 font-weight-bold">
              Thêm khách hàng
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
