@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="margin: 80px 0 0 0">
                Sửa nhà cung cấp vật tư
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
                    @foreach ($edit_sup as $key =>$edit_sup)

                    <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{URL::to('/update-supplier/'.$edit_sup->supplier_id)}}" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Tên nhà cung cấp</label>
                            <div class="col-lg-6">
                                <input value="{{$edit_sup->supplier_name}}" class=" form-control" id="cname" name="supplier_name" minlength="2" type="text" required="">
                            </div>
                        </div>
                        {{-- mô tả --}}
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Mô tả nhà cung cấp</label>
                            <div class="col-lg-6">
                                <textarea rows="8" class="form-control " id="ccomment" name="supplier_des" required="">{{$edit_sup->supplier_des}}</textarea>
                            </div>
                        </div>

                        {{-- số điện thoại --}}
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Số điện thoại</label>
                            <div class="col-lg-6">
                                <input value="{{$edit_sup->supplier_phone}}" class=" form-control" id="cname" name="supplier_phone" minlength="2" type="text" required="">
                            </div>
                        </div>

                         {{-- địa chỉ --}}
                         <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Địa chỉ</label>
                            <div class="col-lg-6">
                                <input value="{{$edit_sup->supplier_address}}" class=" form-control" id="cname" name="supplier_address" minlength="2" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
				                <input type="submit" value="Sửa nhà cung cấp" name="login">
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>
    </div>
</div>
@endsection
