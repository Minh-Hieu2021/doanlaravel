@extends('admin.app')
@section('title') Chỉnh sửa chi tiết hoá đơn nhập @endsection
@section('content')
<div class="container mt-3">
    @if($errors->first('SanPham_id')!=null || $errors->first('SL')!=null || $errors->first('GiaBan')!=null)
    <span style="color:red">Bạn phải nhập đầy đủ tất cả thông tin</span>
    @endif
    <div class="row">
      <div class="col-12 ">
        <form action="{{route('admin.chitiethoadonnhap.update',$chitiethoadonnhap->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group ">
                <label class="text-uppercase font-weight-bold" for="SanPham_id">Mã sản phẩm đã có:</label>
                <input type="text" class="form-control rounded-0" id="SanPham_id" placeholder="SanPham_id" name="SanPham_id"
                  value="{{$chitiethoadonnhap->SanPham_id}}">
            </div>
            <div class="form-group ">
                <label class="text-uppercase font-weight-bold" for="MaSanPham">Mã sản phẩm mới:</label>
                <input type="text" class="form-control rounded-0" id="MaSanPham" placeholder="MaSanPham" name="MaSanPham"
                  value="{{$chitiethoadonnhap->MaSanPham}}">
            </div>
            <div class="form-group ">
                <label class="text-uppercase font-weight-bold" for="SL">Số lượng:</label>
                <input type="text" class="form-control rounded-0" id="SL" placeholder="SL" name="SL"
                  value="{{$chitiethoadonnhap->SL}}">
            </div>
            <div class="form-group ">
                <label class="text-uppercase font-weight-bold" for="GiaBan">Đơn giá:</label>
                <input type="text" class="form-control rounded-0" id="GiaBan" placeholder="GiaBan" name="GiaBan"
                  value="{{$chitiethoadonnhap->GiaBan}}">
            </div>
            <div class="form-group ">
                <button type="submit" class="btn btn-warning text-uppercase rounded-0 font-weight-bold">
                    Lưu chi tiết hoá đơn nhập
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection
