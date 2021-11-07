@extends('welcome')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
			  <li class="active">Giỏ hàng</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<?php
				$content = Cart::content();
			?>
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên sản phẩm</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng tiền</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($content as $v_content)
					<tr>
						<td class="cart_product">
						<form>
							<a href=""><img src="{{URL::to('public/uploads/sanpham/'.$v_content->options->image)}}" width="50" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$v_content->name}}</a></h4>
						</td>
						<td class="cart_price">
							<h4>{{number_format($v_content->price).' '.'VNĐ'}}</h4>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
							<form action="{{URL::to('/update-giohang-quantity')}}" method="POST">
								{{ csrf_field() }}
							<input class="cart_quantity_input" type="text" name="giohang_quantity" value="{{$v_content->qty}}">
							<input type="hidden" value="{{$v_content->rowId}}" name="rowId_giohang" class="form-control">
							<input type="submit" value="Cập nhật" class="btn btn-default btn-sm">
							</form>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
								<?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal).' '.'VNĐ';
								?>
							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{URL::to('/delete-to-giohang/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->
<section id="do_action">
	<div class="container">
		
		<div class="row">
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Tổng <span>{{Cart::priceTotal(0).' '.'VNĐ'}}</span></li>
						<!-- <li>Thuế <span>{{Cart::tax(0).' '.'VNĐ'}}</span></li> -->
						<li>Phí vận chuyển <span>Free ship</span></li>
						<li>Thành tiền <span>{{Cart::total(0).' '.'VNĐ'}}</span></li>
					</ul>
						<a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
@endsection