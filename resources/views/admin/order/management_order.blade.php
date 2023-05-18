@extends('admin')
@section('content')
    <!--main content start-->
    <section class="wrapper" style="padding: 0">
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Đơn hàng
    </div>


    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Id đơn hàng</th>
            <th>Khách hàng</th>
            <th>Hình thức thanh toán</th>
            <th>Tình trạng</th>
            <th>Giá trị đơn hàng</th>
            <th>Chi tiết</th>
            <th>Xác nhận</th>
            <th>Đơn  lỗi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($view_order as $key =>$all_order )
                <tr>
                  <td><label class="i-checks m-b-none"><input value="" type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{$all_order->order_id}}</td>
                  <td>{{$all_order->customer_name}}</td>
                  <td>
                    <?php
                        if($all_order->payment_method == 2){
                            echo  'thanh toán khi nhận hàng';
                        }
                    ?>
                  </td>
                  <td>
                    <button class="btn ">
                        <span class="spinner-border spinner-border-sm text-warning" ></span>
                        Chưa gửi đơn...
                      </button>
                  </td>
                  <td>{{$all_order->order_total}} vnđ</td>
                  <td>
                    <a style="color:rgb(45, 45, 45)" href="{{URL::to('/management_order_detail/'.$all_order->order_id)}}" class="active" ui-toggle-class="">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    </td>
                    <td>
                        <a style="color:green" href="{{URL::to('/management_order_detail/'.$all_order->order_id)}}" class="active" ui-toggle-class="">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </td>

                    <td>
                        <a style="color:red;font-size:18px;" href="{{URL::to('/management_order_detail/'.$all_order->order_id)}}" class="active" ui-toggle-class="">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </td>
              </tr>

            @endforeach
        </tbody>
    </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
