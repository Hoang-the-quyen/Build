@extends('admin')
@section('content')

    <!--main content start-->
        <section class="wrapper" style="padding: 0">
            <div class="table-agile-info">
      <div class="panel panel-default">
        <div class="panel-heading">
          Quản lý danh mục
        </div>
        <div class="row w3-res-tb">
          <div class="col-sm-5 m-b-xs">

          </div>
          <div class="col-sm-4">
          </div>
          <div class="col-sm-3">
            <div class="input-group">
              <input type="text" class="input-sm form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
              </span>
            </div>
          </div>
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
                <th>Tên danh mục</th>
                <th>Mô tả danh mục</th>
                <th>Tình trạng</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($all_category_product as $key =>$arr)

                <tr >
                  <td><label class="i-checks m-b-none"><input value="{{$arr->category_id}}" type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{$arr->category_name}}</td>
                  <td width="60%">{{$arr->category_des}}</td>
                  <td >
                    <?php
                        if($arr->category_status == 1){
                            ?>
                                <a style="color:green;font-size:20px" href="{{URL::to('/active-category-product/'.$arr->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                            <?php
                        }
                        else{
                            ?>
                                <a style="color:red;font-size:20px" href="{{URL::to('/unactive-category-product/'.$arr->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></a>
                        <?php
                        }
                    ?>
                  </td>
                  <td>
                    <a style="color:green" href="{{URL::to('/edit-category-product/'.$arr->category_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a onclick="return confirm('Bạn có muốn xóa danh mục này!')" href="{{URL::to('/delete-category-product/'.$arr->category_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                  </td>
                @endforeach
              </tr>
            </tbody>
        </table>
        </div>

      </div>
    </div>
@endsection
