@extends('admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="margin: 80px 0 0 0">
                Sửa danh mục sản phẩm
                <span class="tools pull-right">
                    <a class="fa fa-chevron-down" href="javascript:;"></a>
                    <a class="fa fa-cog" href="javascript:;"></a>
                    <a class="fa fa-times" href="javascript:;"></a>
                 </span>
            </header>
                    <?php
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                    ?>
            <div class="panel-body">
                @foreach ($edit_category_product as $key =>$edit_value)

                <div class=" form">
                    <form class="cmxform form-horizontal " id="commentForm" method="post" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-3">Tên danh mục</label>
                            <div class="col-lg-6">
                                <input class=" form-control" value="{{$edit_value->category_name}}" id="cname" name="category_name" minlength="2" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="ccomment" class="control-label col-lg-3">Mô tả</label>
                            <div class="col-lg-6">
                                <textarea rows="8" class="form-control" id="ccomment" name="category_des" required="">{{$edit_value->category_name}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
				                <input type="submit" value="Thêm danh mục" name="login">
                            </div>
                        </div>
                    </form>
                </div>

                @endforeach

            </div>
        </section>
    </div>
</div>
@endsection
