@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SÁCH SẢN PHẨM
      <a style="margin-left: 20px;" href="{{URL::to('/themsanpham/')}}" class="btn btn-success" name="" type="submit">Thêm</a>
    </div>
    <?php
      $message = Session::get('message');
      if($message){
          echo '<span class="text-alert">'.$message.'</span>';
          Session::put('message',null);
      }
    ?>  
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th>MÃ SẢN PHẨM</th>
            <th>TÊN SẢN PHẨM</th>
            <th>MÔ TẢ</th>
            <th>GIÁ</th>
            <th>SỐ LƯỢNG</th>
            <th>HÌNH ẢNH</th>
            <th>LOẠI SẢN PHẨM</th>
            <th>TRẠNG THÁI</th>                    
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($danhsachsanpham as $key => $cate_pro)
          <tr>
            <td>{{ $cate_pro->masanpham}}</td>
            <td>{{ $cate_pro->tensanpham}}</td>
            <td>{{ $cate_pro->mota}}</td>
            <td>{{ $cate_pro->gia}}</td>
            <td>{{ $cate_pro->soluong}}</td>
            <td><img src="public/uploads/sanpham/{{$cate_pro->hinhanh}}" height="100" width="100"></td>
            <td>{{ $cate_pro->tenloai}}</td>
            <td><span class="text-ellipsis">
              <?php
                if($cate_pro->trangthai==1){
              ?>
                <a href="{{URL::to('/unactive-sanpham/'.$cate_pro->masanpham)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
              <?php
                }else{
              ?>
                <a href="{{URL::to('/active-sanpham/'.$cate_pro->masanpham)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
              <?php
                }
              ?>
            </span>
            </td>
            
            <!-- NÚT SỬA XÓA -->
            <td>
              <a href="{{URL::to('/suasanpham/'.$cate_pro->masanpham)}}" class="active" ui-toggle-class="active styling-edit">
                <i class="fa fa-pencil-square-o"></i>
                <br><br>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{URL::to('/xoasanpham/'.$cate_pro->masanpham)}}" class="active" ui-toggle-class="active styling-edit">
                <i class="fa fa-trash-alt"></i></a>
            </td>
            <!-- NÚT SỬA XÓA -->
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection