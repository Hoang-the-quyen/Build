@extends('admin')
@section('content')

    <!--main content start-->
        <section class="wrapper" style="padding: 0">
            <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Quản lý sản phẩm

        </div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Gạch</option>
              <option value="1">Sắt</option>
              <option value="2">Máy</option>
              <option value="3">Dụng cụ</option>
            </select>
            <button class="btn btn-sm btn-default">Áp dụng</button>
          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
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
                <th>Tên sản phẩm</th>
                <th>Mô tả sản phẩm</th>
                <th>Tình trạng</th>
                <th>Giá sản phẩm</th>
                <th>hình ảnh</th>
                <th>Danh mục</th>
                <th>Nhà cung cấp</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($all_product as $key =>$all_pro)

                <tr>
                  <td><label class="i-checks m-b-none"><input value="{{$all_pro->product_id}}" type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{$all_pro->product_name}}</td>
                  <td>{{$all_pro->product_des}}</td>
                  <td>
                    <?php
                        if($all_pro->product_status == 1){
                            ?>
                                <a style="color:green;font-size:20px" href="{{URL::to('/active-product/'.$all_pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                            <?php
                        }
                        else{
                            ?>
                                <a style="color:red;font-size:20px" href="{{URL::to('/unactive-product/'.$all_pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></a>
                        <?php
                        }
                    ?>
                  </td>
                  <td>{{$all_pro->product_price}}</td>
                  {{-- hình ảnh --}}
                  <td><img src="{{URL::to('public/uploads/product/'.$all_pro->product_image)}}" width="100px" height="100px" alt=""></td>
                  {{-- danh mục --}}
                  <td>{{$all_pro->category_name}}</td>
                  {{-- nhà cung cấp --}}
                  <td>{{$all_pro->supplier_name}}</td>
                  <td>
                    <a style="color:green" href="{{URL::to('/edit-product/'.$all_pro->product_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a onclick="return confirm('Bạn có muốn xóa sản phẩm này !')" href="{{URL::to('/delete-product/'.$all_pro->product_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                  </td>
                @endforeach
              </tr>
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
