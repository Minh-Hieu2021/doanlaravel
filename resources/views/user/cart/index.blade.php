@extends('user.layouts')
@section('title') Home | E-Shopper @endsection

@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr >
                        <td >
                            <a href=""><img style="width: 80px;" src= "{{ asset($item->Anh)}}" alt=""></a>
                        </td>
                        <td >
                            <h4><a href="">{{ $item->TenSanPham }}</a></h4>
                        </td>
                        <td >
                            <h4 >{{ $item->GiaBan }} VND</h4>
                        </td>
                        <td >
                            <input type="number" name="quantity" value="{{ $item->SL }}" min="1" max="50">
                        </td>
                        <td>
                            <p class="cart_total_price">{{ $item->Total }} VND</p>
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning">Cập nhật</button>
                            <button type="button" class="btn btn-warning">Xóa</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       <div style= "padding-bottom: 20px;text-align: center">
        <button type="button" class="btn btn-warning">Mua hàng</button>
       </div>
    </div>
</section>
@endsection
