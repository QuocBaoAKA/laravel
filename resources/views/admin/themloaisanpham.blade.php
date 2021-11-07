@extends('admin_layout')
@section('admin_content')
<script lang="javascript">
// function ktradl()
// {
//     gia = document.themsp.gia.value;
//     if(gia < 1000)
//     {
//         alert("Giá phải lớn hơn hoặc bằng 1000 VND.");
//         document.themsp.gia.focus();
//         return false;
//     }
//     else{
//         return true;
//     }
  
// }
</script>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      THÊM LOẠI SẢN PHẨM
      <a style="margin-left: 20px;" href="{{URL::to('/danhsachloaisanpham/')}}" class="btn btn-success" name="" type="submit">Trở về</a>
    </div>
        <div class="panel-body">
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="position-center">
            <form role="form" name="themloaisanpham" action="{{URL::to('/saveloaisanpham')}}" method="post" class="was-validated" onsubmit="return ktradl();">
                {{ csrf_field() }}
                

                <div>
                    <label for="tenloai">Tên loại sản phẩm</label>
                    <input type="text" class="form-control" id="tenloai" placeholder="Tên sản phẩm..." name="tenloai" required="Vui lòng nhập tên loại sản phẩm">
                </div>
                <br>
            <button type="submit" name="themloaisanpham" class="btn btn-info">Thêm loại sản phẩm</button>
            </form>
            </div>
            <br>
        </div>
@endsection                            