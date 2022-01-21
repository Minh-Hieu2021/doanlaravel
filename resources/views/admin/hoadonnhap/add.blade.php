@extends('admin.app')
@section('title') Thêm hoá đơn nhập @endsection
@section('content')
<div class="container mt-3">
    @if($errors->first('NhanVien_id')!=null || $errors->first('MaHD')!=null || $errors->first('NgNhap')!=null ||$errors->first('TongTien')!=null)
    <span style="color:red">Bạn phải nhập đầy đủ tất cả thông tin</span>
    @endif
    <div class="d-flex flex-row">
      <div class="col-12 px-0">
        <form action="{{route('admin.hoadonnhap.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="NhanVien_id">Mã nhân viên:</label>
            <input type="text" class="form-control rounded-0" id="NhanVien_id" placeholder="NhanVien_id" name="NhanVien_id">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="MaHD">Mã hoá đơn:</label>
            <input type="text" class="form-control rounded-0" id="MaHD" placeholder="MaHD" name="MaHD">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="NgNhap">Ngày nhập:</label>
            <input type="datetime" class="form-control rounded-0" id="NgNhap" placeholder="NgNhap" name="NgNhap">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="TongTien">Tổng tiền</label>
            <input type="text" class="form-control rounded-0" id="TongTien" placeholder="TongTien" name="TongTien">
          </div>
          <div class="form-group ">
            <button type="submit" class="btn btn-danger text-uppercase rounded-0 font-weight-bold">
              Thêm hoá đơn nhập
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
