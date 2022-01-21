@extends('admin.app')
@section('title') Chỉnh sửa hoá đơn nhập @endsection
@section('content')
<div class="container mt-3">
    @if($errors->first('NgNhap')!=null || $errors->first('TongTien')!=null)
    <span style="color:red">Bạn phải nhập đầy đủ tất cả thông tin</span>
    @endif
    <div class="row">
      <div class="col-12 ">
        <form action="{{route('admin.hoadonnhap.update',$hoadonnhap->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group ">
                <label class="text-uppercase font-weight-bold" for="NhanVien_id">Mã nhân viên:</label>
                <input type="datetime" class="form-control rounded-0" id="NhanVien_id" placeholder="NhanVien_id" name="NhanVien_id"
                  value="{{$hoadonnhap->NhanVien_id}}">
            </div>
            <div class="form-group ">
                <label class="text-uppercase font-weight-bold" for="NgNhap">Ngày nhập:</label>
                <input type="datetime" class="form-control rounded-0" id="NgNhap" placeholder="NgNhap" name="NgNhap"
                  value="{{$hoadonnhap->NgNhap}}">
            </div>
            <div class="form-group ">
                <label class="text-uppercase font-weight-bold" for="TongTien">Tổng tiền:</label>
                <input type="text" class="form-control rounded-0" id="TongTien" placeholder="TongTien" name="TongTien"
                  value="{{$hoadonnhap->TongTien}}">
            </div>
            <div class="form-group ">
                <button type="submit" class="btn btn-warning text-uppercase rounded-0 font-weight-bold">
                    Lưu hoá đơn nhập
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection
