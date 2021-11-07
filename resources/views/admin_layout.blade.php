
<!DOCTYPE html>
<head>
<title>ADMIN</title>
<LINK REL="SHORTCUT ICON"  HREF="#">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<link rel="stylesheet" href="{{asset('public/backend/css/jquery.dataTables.min.css')}}" >

<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<!-- calendar -->
<!-- câu thông báo -->
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dataTables.min.js')}}"></script>

</head>
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
    border: 1px solid #ccc;
    border-top: 1px solid #ccc !important;

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
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a style="color: black;" class="logo">
        ADMIN
    </a>
    <div style="background-color: #b39bc8;" class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<!--logo end-->
<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li class="dropdown">
            <a data-toggle="dropdown" class="nameadmin" href="#"> 
                <img alt="" src="public/backend/img/1.png">  
                <span class="username">
                    <?php
                    $name = Session::get('hoten');
                    if($name){
                    echo $name;
                    }
                    ?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a onclick="return confirm('Bạn có muốn đăng xuất?')"href="{{URL::to('/logout')}}"><i class="fas fa-key"></i> Đăng Xuất</a></li>
            </ul>
        </li>
    </ul>
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="sub-menu">
                    <a href="{{URL::to('/dashboard')}}">
                        <i class="fas fa-book"></i>
                        <span>TRANG CHỦ</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="{{URL::to('/')}}">
                        <i class="fas fa-th"></i>
                        <span>QUẢN LÝ QUYỀN</span></a>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="{{URL::to('/')}}">
                        <i class="fas fa-th"></i>
                        <span>QUẢN LÝ TÀI KHOẢN</span></a>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="{{URL::to('/danhsachsanpham')}}">
                        <i class="fas fa-th"></i>
                        <span>QUẢN LÝ SẢN PHẨM</span></a>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/danhsachloaisanpham')}}">
                        <i class="fa fa-th"></i>
                        <span>QUẢN LÝ LOẠI SẢN PHẨM</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/danhsachxx')}}">
                        <i class="fa fa-th"></i>
                        <span>QUẢN LÝ NHÀ CUNG CẤP</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/danhsachms')}}">
                        <i class="fa fa-th"></i>
                        <span>QUẢN LÝ ĐƠN HÀNG</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/danhsachbst')}}">
                        <i class="fa fa-th"></i>
                        <span>QUẢN LÝ CHI TIẾT ĐƠN ĐẶT HÀNG</span>
                    </a>
                    <!-- <ul class="sub">
                        <li><a href="{{URL::to('/thembst')}}"><i class="fas fa-heart"></i>Thêm bộ sưu tập</a></li>
                        <li><a href="{{URL::to('/danhsachbst')}}"><i class="fas fa-heart"></i>Danh sách bộ sưu tập</a></li>
                    </ul> -->
                </li>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<section id="main-content">
    <section class="wrapper">
        @yield('admin_content')
    </section>
 <!-- footer -->
	  <div style="background-color: white;" class="footer">
		<div class="wthree-copyright">
		  <center><p style="color: black;">Copyright © 2021 BLACK ROUGE | Designed by TAMNHU</p></center>
		</div>
	  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!-- câu thông báo -->
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	
<!--Phân trang, tìm kiếm-->
<script type="text/javascript">
$(document).ready( function () {
$('#myTable').DataTable();
} );
</script>
<script>

	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
