@extends('admin.app')
@section('title') Thêm chi tiết hoá đơn nhập @endsection
@section('content')
<div class="container mt-3">
    @if($errors->first('HoaDonNhap_id')!=null || $errors->first('SL')!=null ||$errors->first('GiaBan')!=null)
    <span style="color:red">Bạn phải nhập đầy đủ tất cả thông tin</span>
    @endif
    <div class="d-flex flex-row">
      <div class="col-12 px-0">
        <form action="{{route('admin.chitiethoadonnhap.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="HoaDonNhap_id">Mã hoá đơn:</label>
            <input type="text" class="form-control rounded-0" id="HoaDonNhap_id" placeholder="HoaDonNhap_id" name="HoaDonNhap_id">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="SanPham_id">Mã sản phẩm đã có:</label>
            <input type="text" class="form-control rounded-0" id="SanPham_id" placeholder="SanPham_id" name="SanPham_id">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="MaSanPham">Mã sản phẩm mới:</label>
            <input type="text" class="form-control rounded-0" id="MaSanPham" placeholder="MaSanPham" name="MaSanPham">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="SL">Số lượng:</label>
            <input type="datetime" class="form-control rounded-0" id="SL" placeholder="SL" name="SL">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="GiaBan">Đơn giá</label>
            <input type="text" class="form-control rounded-0" id="GiaBan" placeholder="GiaBan" name="GiaBan">
          </div>
          <div class="form-group ">
            <button type="submit" class="btn btn-danger text-uppercase rounded-0 font-weight-bold">
              Thêm chi tiết hoá đơn nhập
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
