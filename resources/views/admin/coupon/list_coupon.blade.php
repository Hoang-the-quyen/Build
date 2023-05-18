@extends('admin')
@section('content')

    <!--main content start-->
        <section class="wrapper" style="padding: 0">
            <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Danh sách mã giảm giá
        </div>

        <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h5 id="message" style="animation: ease-in-out 3s">' . $message . '</h5>';
                Session::put('message', null);
            }

        ?>
        {{-- đoạn text sẽ bị mất khi xuất hiện 5s --}}
        <script>
            setTimeout(function() {
                document.getElementById("message").style.display = "none";
            }, 5000);
        </script>

        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">
                  <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                  </label>
                </th>
                <th>Tên mã giảm giá</th>
                <th>Mã code</th>
                <th>Số lương</th>
                <th>Giảm theo </th>
                <th>% or money</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($coupon as $key => $cou )

                <tr>
                  <td><label class="i-checks m-b-none"><input value="" type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{$cou->coupon_name}}</td>
                  <td>{{$cou->coupon_code}}</td>
                  <td>{{$cou->coupon_time}}</td>
                  <td>
                    <?php
                        if($cou->coupon_condition == 1){
                            ?>
                                <a style="color:green" href="">Giảm Theo %</span></a>
                            <?php
                        }
                        elseif($cou->coupon_condition == 2){
                            ?>
                                <a style="color:red" href="">Giảm theo số tiền</a>
                        <?php
                        }
                        else {
                            echo 'lỗi';
                        }
                    ?>
                  </td>
                  <?php
                        if($cou->coupon_condition == 1){
                            ?>
                                <td>{{$cou->coupon_number}} %</td>
                                <?php
                        }
                        elseif($cou->coupon_condition == 2){
                            ?>
                                <td>{{number_format($cou->coupon_number)}} vnđ</td>
                        <?php
                        }
                        else {
                            echo 'lỗi';
                        }
                    ?>
                  <td>
                    <a onclick="return confirm('Bạn có muốn xóa mã giảm giá ?')" href="{{URL::to('/delete_coupon/'.$cou->coupon_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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
