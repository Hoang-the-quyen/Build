@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="margin: 80px 0 0 0">
                Thêm nhà cung cấp vật tư
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
                    <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{URL::to('/save-supplier')}}" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Tên nhà cung cấp</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="cname" name="supplier_name" minlength="2" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Mô tả nhà cung cấp</label>
                            <div class="col-lg-6">
                                <textarea rows="8" class="form-control " id="ccomment" name="supplier_des" required=""></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Trạng thái</label>
                            <div class="col-lg-6">
                                <select name="supplier_status" class="form-control input-lg m-bot15">
                                    <option value="1">Còn cung ứng</option>
                                    <option value="0">không còn cung ứng</option>
                                </select>
                            </div>
                        </div>

                        {{-- số điện thoại --}}
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Số điện thoại</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="cname" name="supplier_phone" minlength="2" type="text" required="">
                            </div>
                        </div>

                         {{-- địa chỉ --}}
                         <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Địa chỉ</label>
                            <div class="col-lg-6">
                                <input class=" form-control" id="cname" name="supplier_address" minlength="2" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
				                <input type="submit" value="Thêm nhà cung cấp" name="login">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
