@extends('index')
@section('content')


        <div class="features_items"><!--features_items-->
            @foreach ($pro_product as $key => $pro )
                @foreach ($cate_product as $key => $cate_name )
                    @if($pro->category_id == $cate_name->category_id)
                        <h2 style="margin-top: 10px" class="title text-center">Sản phẩm thuộc danh mục {{$cate_name->category_name}}</h2>
                    @endif
                @endforeach
                @break
            @endforeach
            @foreach ($pro_product as $key => $pro )
            <a href="{{URL::to('/product-detail/'.$pro->product_id)}}">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img style="height:240px" src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" alt="" />
                                <h2>{{number_format($pro->product_price)}} vnđ </h2>
                                <p>{{$pro->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach







@endsection

