@extends('index')
@section('content')

@foreach ($pro_product as $key => $pro_detail )
        <div class="product-details"><!--product-details-->
            <form>
                @csrf
                    <input type="hidden" class="cart_product_id_{{$pro_detail->product_id}}" value="{{$pro_detail->product_id}}">
                    <input type="hidden" class="cart_product_name_{{$pro_detail->product_id}}" value="{{$pro_detail->product_name}}">
                    <input type="hidden" class="cart_product_image_{{$pro_detail->product_id}}" value="{{$pro_detail->product_image}}">
                    <input type="hidden" class="cart_product_price_{{$pro_detail->product_id}}" value="{{$pro_detail->product_price}}">
                    <input type="hidden" class="cart_product_qty_{{$pro_detail->product_id}}" value="1">
                <div class="col-sm-5">
                    <div class="view-product">
                            <img src="{{URL::to('public/uploads/product/'.$pro_detail->product_image)}}" alt="" />
                        <h3>ZOOM</h3>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="product-information"><!--/product-information-->
                        <img  src="{{asset('/public/frontend/images/product-details/new.jpg')}}" class="newarrival" alt="" />
                        <h2>{{$pro_detail->product_name}}</h2>
                        <p>Product ID: {{$pro_detail->product_id}}</p>
                        <img src="{{asset('/public/frontend/images/product-details/rating.png')}}" alt="" />
                        <span>

                                <span style="width: 100%">{{number_format($pro_detail->product_price)}} vnđ</span>
                                <label>Số lượng:</label>
                                <input name="qty" type="text" value="1" />
                                <input type="hidden" name="productid_hidden" value="{{$pro_detail->product_id}}">
                                <button type="button" name="add-to-cart" data-id_product="{{$pro_detail->product_id}}" class="btn btn-fefault cart add-to-cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Giỏ hàng
                                </button>
                        </span>
                        <p><b>Số lượng hàng:</b> 1000</p>
                        <p><b>Trạng thái:</b> New</p>
                        @foreach ($sup_product as $key => $sup_pro )
                            @if ($pro_detail->supplier_id == $sup_pro->supplier_id)
                                <p><b>Nhà cung cấp:</b> {{$sup_pro->supplier_name}}</p>
                            @endif
                        @endforeach
                        <a href=""><img src="{{asset('/public/frontend/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                    </div><!--/product-information-->
                </div>
            </form>
        </div><!--/product-details-->
@endforeach

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li><a href="#details" data-toggle="tab">Sản phẩm liên quan</a></li>
                    <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="details" >
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery1.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery2.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery3.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery4.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="companyprofile" >
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery1.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery3.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery2.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery4.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tag" >
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery1.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery2.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery3.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('/public/frontend/images/home/gallery4.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade active in" id="reviews" >
                    <div class="col-sm-12">


                        <form action="#">
                            <span>
                                <input type="text" placeholder="Your Name"/>
                                <input type="email" placeholder="Email Address"/>
                            </span>
                            <textarea name="" ></textarea>
                            <b>Rating: </b> <img src="{{asset('/public/frontend/images/product-details/rating.png')}}" alt="" />
                            <button type="button" class="btn btn-default pull-right">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Có thể bạn cũng thích</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('/public/frontend/images/home/recommend1.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('/public/frontend/images/home/recommend2.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('/public/frontend/images/home/recommend3.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('/public/frontend/images/home/recommend1.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('/public/frontend/images/home/recommend2.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{asset('/public/frontend/images/home/recommend3.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                  </a>
            </div>
        </div><!--/recommended_items-->

@endsection
