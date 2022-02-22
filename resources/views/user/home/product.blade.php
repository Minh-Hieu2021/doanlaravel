@extends('user.layouts')
@section('title') SanPham | E-Shopper @endsection

@section('content')
@php
    $data = App\Models\sanpham::all()
@endphp
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    @foreach ($data as $sp)
                    <div class="col-sm-3">
                        <a href="{{ route('productdetail', $sp->MaSanPham) }}">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ $sp->Anh }}" alt="" />
                                        <h2>{{ number_format($sp->GiaBan) }} VND</h2>
                                        <p>{{ $sp->TenSanPham }}</p>
                                        <a href="{{ route('addCart',['sp'=>$sp->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ $sp->GiaBan }} VND</h2>
                                            <p>{{ $sp->TenSanPham }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href={{ route('productdetail',$sp->MaSanPham) }}><i class="fa fa-plus-square"></i>Xem chi tiết</a></li>
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                    </div>
                    @endforeach
                </div>
            </div>

                    <ul class="pagination">
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">&raquo;</a></li>
                    </ul>
                 <!--features_items-->

        </div>
    </div>
</section>
@endsection
