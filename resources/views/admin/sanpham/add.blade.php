@extends('admin.app')
@section('title') Thêm Sản Phẩm @endsection
@section('content')
<div class="container mt-3">
    @if($errors->first('Anh')!=null || $errors->first('MaSanPham')!=null || $errors->first('TenSanPham')!=null ||$errors->first('GiaBan')!=null || $errors->first('SLTK')!=null || $errors->first('MoTa')!=null)
    <span style="color:red">Bạn phải nhập đầy đủ tất cả thông tin</span>
    @endif
    <div class="d-flex flex-row">
      <div class="col-12 px-0">
        <form action="{{route('admin.sanpham.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="MaSanPham">Mã Sản Phẩm:</label>
            <input type="text" class="form-control rounded-0" id="MaSanPham" placeholder="MaSanPham" name="MaSanPham">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="TenSanPham">Tên Sản Phẩm:</label>
            <input type="text" class="form-control rounded-0" id="TenSanPham" placeholder="TenSanPham" name="TenSanPham">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="GiaBan">Giá Bán:</label>
            <input type="text" class="form-control rounded-0" id="GiaBan" placeholder="GiaBan" name="GiaBan">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="SLTK">SLTK</label>
            <input type="SLTK" class="form-control rounded-0" id="SLTK" placeholder="SLTK" name="SLTK">
          </div>
          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="MoTa">Mô Tả</label>
            <input type="MoTa" class="form-control rounded-0" id="MoTa" placeholder="MoTa" name="MoTa">
          </div>

          <div class="form-group ">
            <label class="text-uppercase font-weight-bold" for="Anh">Ảnh sản phẩm:</label>
            <input type="file" class="form-control rounded-0" id="Anh" placeholder="Anh" name="Anh">
          </div>

          <div class="form-group ">
            <button type="submit" class="btn btn-danger text-uppercase rounded-0 font-weight-bold">
              Thêm Sản Phẩm
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
