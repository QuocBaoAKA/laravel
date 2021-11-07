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
      THÊM SẢN PHẨM
      <a style="margin-left: 20px;" href="{{URL::to('/danhsachsanpham/')}}" class="btn btn-success" name="" type="submit">Trở về</a>
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
            <form role="form" name="themsanpham" action="{{URL::to('/savesanpham')}}" method="post" enctype="multipart/form-data" class="was-validated"onsubmit="return ktradl();">
                {{ csrf_field() }}
                

                <div>
                    <label for="tensanpham">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="tensanpham" placeholder="Tên sản phẩm..." name="tensanpham" required="Vui lòng nhập tên sản phẩm">
                </div>

                <div class="form-group">
                    <label for="motasanpham">Mô tả</label>
                    <textarea style="resize: none" rows="5" class="form-control" id="motasanpham" placeholder="Mô tả..." name="motasanpham" required="Vui lòng nhập mô tả"></textarea>
                    <!-- <div class="invalid-feedback">Vui lòng nhập đầy đủ thông tin!</div> -->
                </div>

                <div class="form-group">
                    <label for="gia">Giá</label>
                    <input type="number" min="1000" class="form-control" id="gia" placeholder="Giá sản phẩm..." name="gia" required="Vui lòng nhập giá">
                </div>
                
                <div class="form-group">
                    <label for="soluong">Số lượng</label>
                    <input type="number" min="0" class="form-control" id="soluong" placeholder="Số lượng sản phẩm..." name="soluong" required="Vui lòng nhập số lượng">
                </div>

                <div class="form-group">
                    <label for="hinhanh">Chọn hình ảnh</label>
                    <input type="file" class="form-control" name="flHinhsp" id="exampleInputEmail1" placeholder="" required="">
                </div>

                <div>
                    <label for="tenloai">Tên loại</label>
                        <select name="tenloai" class="form-control input-sm m-bot15">
                            @foreach($loaisanpham as $key => $loai)
                                <option value="{{$loai->maloai}}">{{$loai->tenloai}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                    <label for="trangthai">Trạng thái</label>
                    <select name="trangthai" class="form-control input-sm m-bot15">
                        <option value="1">Hiện</option>
                        <option value="0">Ẩn</option>             
                    </select>
                </div>

            <button type="submit" name="themsanpham" class="btn btn-info">Thêm sản phẩm</button>
            </form>
            </div>
            <br>
        </div>
@endsection                            