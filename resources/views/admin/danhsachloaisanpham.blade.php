@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH LOẠI SÁCH SẢN PHẨM
      <a style="margin-left: 20px;" href="{{URL::to('/themloaisanpham/')}}" class="btn btn-success" name="" type="submit">Thêm</a>
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
            <th>MÃ LOẠI SẢN PHẨM</th>
            <th>TÊN LOẠI SẢN PHẨM</th>                    
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($danhsachloaisanpham as $key => $cate_pro)
          <tr>
            <td>{{ $cate_pro->maloai}}</td>
            <td>{{ $cate_pro->tenloai}}</td>
            
            <!-- NÚT SỬA XÓA -->
            <td>
              <a href="{{URL::to('/sualoaisanpham/'.$cate_pro->maloai)}}" class="active" ui-toggle-class="active styling-edit">
                <i class="fa fa-pencil-square-o"></i>
                <br><br>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{URL::to('/xoaloaisanpham/'.$cate_pro->maloai)}}" class="active" ui-toggle-class="active styling-edit">
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