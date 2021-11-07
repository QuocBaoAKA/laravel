@extends('admin_layout')
@section('admin_content')
<style type="text/css">
    span.text-alert{
    color: red;
    font-size: 17px;
    width: 100%;
    text-align: center;
    font-weight: bold;
}
.header{
    background-color: #fff;
}
.active .fa-pencil-square-o{ /*màu và kích cỡ nút sửa*/
    color: green;
    font-size: 20px;
}
.active .fa-trash-alt{ /*màu và kích cỡ nút xóa*/
    color: red;
    font-size: 20px;
}
.sub .fa-heart{ /*màu nút thêm, danh sách*/
    color: #00FF00;
}
.brand{
background-color: #fff;
}
.nameadmin{
    background-color: #e64398;
}
/*menu*/
.leftside-navigation{
    /*background-image: url(public/backend/img/bg8.jpg);*/
    width: 100%;
    height: 5000px;
    background-color: #f0ebf4;
    color: black !important;
}
.leftside-navigation .sidebar-menu .sub-menu a{
        color: black;
        border-radius: 15px;
}
.leftside-navigation .sidebar-menu .sub-menu:hover{
    border-radius: 15px;
    margin: 0.5rem 0 0.5rem 0;
}
/*khung chữ thêm danh sách*/
.panel-default>.panel-heading {
    color: #000000 ! important;
    background-color: #f172a1! important;
    border-color: #000 ! important;
    font-size: 20px;
}
/*khung ngoài bảng*/
.table-agile-info{
    background-color: #f0ebf4;
    padding: 2em;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
/*chữ trong bảng*/
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    font-size: 0.9em;
    color: #100000;
    border-top: none !important;
}
/*thanh 3 gạch*/
.brand {
    background:#b39bc8;
    float:left;
    width:240px;
    height:80px;
    position:relative;
    background-color: #f172a1;
}
.panel-heading {
    position: relative;
    height: 57px;
    line-height: 57px;
    letter-spacing: 0.2px;
    color: #000;
    font-size: 18px;
    font-weight: 400;
    padding: 0 16px;
    background: #FBA79B;
    border-top-right-radius: 2px;
    border-top-left-radius: 2px;
    text-transform: uppercase;
    text-align: center;
}
.top-nav ul.top-menu>li>a {
    border-radius: 100px;
    -webkit-border-radius: 100px;
    padding: 0px;
    background: none;
    margin-right: 0;
    border: 1px solid #b39bc8;
    background: #b39bc8;
}
/*nút thêm*/
.btn-info {
    color: #000;
    background-color: #48B7F3;
    border-color: #FBA79B;
}
.btn-info:hover {
    color: #fff;
    background-color: #000;
}
</style>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        SỬA SẢN PHẨM
    </div>
        <div class="panel-body">    
            @foreach($suasanpham as $key => $edit_value)
                <div class="position-center">
                   
                <form role="form" action="{{URL::to('/updatesanpham/'.$edit_value->masanpham)}}" method="post" enctype="multipart/form-data" class="was-validated">
                    {{ csrf_field() }}
                        <div>
                            <label for="tensanpham">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="tensanpham" value="{{$edit_value->tensanpham}}" name="tensanpham" required="">
                        </div>

                        <div class="form-group">
                            <label for="motasanpham">Mô tả</label>
                            <textarea style="resize: none" rows="5" class="form-control" id="motasanpham" placeholder="Mô tả..." name="motasanpham" required="">{{$edit_value->mota}}</textarea>
                            <!-- <div class="invalid-feedback">Vui lòng nhập đầy đủ thông tin!</div> -->
                        </div>

                        <div class="form-group">
                            <label for="gia">Giá</label>
                            <input type="number" min="1000" class="form-control" id="gia" value="{{$edit_value->gia}}" name="gia" required="">
                        </div>
                        
                        <div class="form-group">
                            <label for="soluong">Số lượng</label>
                            <input type="number" min="0" class="form-control" id="soluong" value="{{$edit_value->soluong}}" name="soluong" required="">
                        </div>

                        <div class="form-group">
                            <label for="hinhanh">Chọn hình ảnh</label>
                            <input type="file" class="form-control" name="flHinhsp" id="hinhanh" placeholder="">
                            <img src="{{URL::to('public/uploads/sanpham/'.$edit_value->hinhanh)}}" width="100" height="100">
                        </div>

                        <div class="form-group">
                            <label for="tenloai">Tên loại</label>
                            <select name="tenloai" class="form-control input-sm m-bot15">
                                @foreach($loaisanpham as $key => $loai)
                                    @if($loai->maloai==$edit_value->maloai)
                                    <option selected value="{{$loai->maloai}}">{{$loai->tenloai}}</option>
                                    @else
                                    <option value="{{$loai->maloai}}">{{$loai->tenloai}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    <button type="submit" name="updatesanpham" class="btn btn-info">Sửa sản phẩm</button>
                </form>
                </div>
            @endforeach
    </div>
@endsection                            