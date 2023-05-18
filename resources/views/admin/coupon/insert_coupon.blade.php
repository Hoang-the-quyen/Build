@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="margin: 80px 0 0 0">
                Thêm mã giảm giá
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
            <div class="panel-body">
                    <?php
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                    ?>

                        <div class=" form">
                            <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{URL::to('/insert_coupon_code')}}" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Tên mã</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="coupon_name" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Mã code giảm giá</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="coupon_code" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Số lượng mã</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="coupon_time" minlength="2" type="text" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Tính năng mã</label>
                                    <div class="col-lg-6">
                                        <select name="coupon_condition" class="form-control input-lg m-bot15">
                                            <option value="0">-----Chọn-----</option>
                                            <option value="1">Giảm theo %</option>
                                            <option value="2">Giảm theo số tiền</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Nhập số lượng % hoặc số tiền giảm</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="cname" name="coupon_number" minlength="2" type="text" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <input type="submit" value="Thêm mã giảm giá" name="">
                                    </div>
                                </div>
                            </form>
                        </div>


            </div>
        </section>
    </div>
</div>
@endsection
