<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class GioHang extends Controller
{
    public function save_giohang(Request $request){
    	$sanphamid = $request->masanpham_hidden;
    	$quantity = $request->qty;

    	$sanpham_info = DB::table('tbl_sanpham')->where('masanpham',$sanphamid)->first();

    	

    	// Cart::add('293ad', 'Product 1', 1, 9.99, 550);
    	// Cart::destroy();
    	$data['id'] = $sanpham_info->masanpham;
    	$data['qty'] = $quantity;
    	$data['name'] = $sanpham_info->tensanpham;
    	$data['price'] = $sanpham_info->gia;
    	$data['weight'] = $sanpham_info->gia;
    	$data['options']['image'] = $sanpham_info->hinhanh;
    	Cart::add($data);
        Cart::setGlobalTax(0);
    	return Redirect::to('/show-giohang');
    }
    public function show_giohang(){
    	$loaisanpham = DB::table('tbl_loaisanpham')->orderby('maloai','desc')->get();
    	return view('pages.giohang.show_giohang')->with('loaisanpham',$loaisanpham);
    }
    public function delete_to_giohang($rowId){
    	Cart::update($rowId,0);
    	return Redirect::to('/show-giohang');
    }
    public function update_giohang_quantity(Request $request){
        $rowId = $request->rowId_giohang;
        $qty = $request->giohang_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-giohang');
    }
}
