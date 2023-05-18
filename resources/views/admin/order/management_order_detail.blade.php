@extends('admin')
@section('content')
    <!--main content start-->
    <section class="wrapper" style="padding: 0">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn Hàng
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading" style="margin: 80px 0 0 0">
                    Thông tin người nhận , nơi nhận đơn hàng
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                     </span>
                </header>
                <div class="panel-body">
                            <div class=" form">
                                @foreach ($view_order_detail_customer as $key =>$view_o_d )
                                <form class="cmxform form-horizontal "  id="commentForm" method="post" action="" enctype="multipart/form-data" novalidate="novalidate">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Tên khách hàng</label>
                                        <div class="col-lg-6">
                                            <input value="{{$view_o_d->shipping_name}}" class=" form-control" readonly id="cname" name="product_name" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Số điện thoại</label>
                                        <div class="col-lg-6">
                                            <input value="{{$view_o_d->shipping_phone}}"  class=" form-control" readonly id="cname" name="product_price" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Email liên hệ</label>
                                        <div class="col-lg-6">
                                            <input value="{{$view_o_d->shipping_email}}"  class=" form-control" readonly id="cname" name="product_name" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-3">Địa chỉ</label>
                                        <div class="col-lg-6">
                                            <input value=" {{$view_o_d->shipping_address}}" class=" form-control" readonly id="cname" name="product_price" minlength="2" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ccomment" class="control-label col-lg-3">Ghi chú của khách hàng</label>
                                        <div class="col-lg-6">
                                            <textarea  rows="8" readonly class="form-control " id="ccomment" name="product_des" required="">{{$view_o_d->shipping_note}}</textarea>
                                        </div>
                                    </div>


                                </form>

                                @endforeach
                            </div>
                </div>
            </section>
        </div>
    </div>

    <div class="table-responsive">
        <header class="panel-heading" style="margin: 80px 0 0 0">
            Chi tiết đơn hàng
            <span class="tools pull-right">
                <a class="fa fa-chevron-down" href="javascript:;"></a>
             </span>
        </header>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Tổng</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($view_order_detail as $key =>$order_detail )
                <tr>
                    <td>{{$order_detail->product_name}}</td>
                    <td>{{$order_detail->product_sales_quantity}}</td>
                    <td>{{number_format($order_detail->product_price).' '.'vnđ'}}</td>
                    <td>{{$order_detail->product_sales_quantity * $order_detail->product_price}}</td>
                </tr>
            @endforeach
                <tr>
                    <td><span style="color: red">Thành tiền</span> = {{$order_detail->order_total}} <span style="color: red">VNĐ</span></td>
                </tr>
        </tbody>
    </table>
    </div>
    <footer class="panel-footer">
      <div class="row">



      </div>
    </footer>
  </div>
</div>
@endsection
