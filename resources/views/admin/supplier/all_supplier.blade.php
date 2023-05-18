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
            <select class="input-sm form-control w-sm inline v-middle">
              <option value="0">Bulk action</option>
              <option value="1">Delete selected</option>
              <option value="2">Bulk edit</option>
              <option value="3">Export</option>
            </select>
            <button class="btn btn-sm btn-default">Apply</button>
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
                <th>Tên nhà cung cấp</th>
                <th>Mô tả nhà cung cấp</th>
                <th>Tình trạng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th style="width:30px;"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($all_supplier as $key =>$all_sup)

                <tr>
                  <td><label class="i-checks m-b-none"><input value="{{$all_sup->supplier_id}}" type="checkbox" name="post[]"><i></i></label></td>
                  <td>{{$all_sup->supplier_name}}</td>
                  <td>{{$all_sup->supplier_des}}</td>
                  <td>
                    <?php
                        if($all_sup->supplier_status == 1){
                            ?>
                                <a style="color:green;font-size:20px" href="{{URL::to('/active-supplier/'.$all_sup->supplier_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                            <?php
                        }
                        else{
                            ?>
                                <a style="color:red;font-size:20px" href="{{URL::to('/unactive-supplier/'.$all_sup->supplier_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></a>
                        <?php
                        }
                    ?>
                  </td>
                  <td>{{$all_sup->supplier_phone}}</td>
                  <td>{{$all_sup->supplier_address}}</td>

                  <td>
                    <a style="color:green" href="{{URL::to('/edit-supplier/'.$all_sup->supplier_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a onclick="return confirm('Bạn có muốn xóa nhà cung ứng !')" href="{{URL::to('/delete-supplier/'.$all_sup->supplier_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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
