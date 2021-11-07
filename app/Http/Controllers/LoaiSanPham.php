<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Toastr;
session_start();

class LoaiSanPham extends Controller
{
    public function AuthLogin(){
        $tendangnhap = Session::get('tendangnhap');
        if($tendangnhap){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function themloaisanpham(){
        $this->AuthLogin();
    	return view('admin.themloaisanpham');
    }
    public function danhsachloaisanpham(){
        $this->AuthLogin();
    	$danhsachloaisanpham = DB::table('tbl_loaisanpham')->get();
    	$manager_loaisanpham = view('admin.danhsachloaisanpham')->with('danhsachloaisanpham',$danhsachloaisanpham);
    	return view('admin_layout')->with('admin.danhsachloaisanpham',$manager_loaisanpham);
    }
    public function saveloaisanpham(Request $request){
    	$this->AuthLogin();
    	$data = array();
    	$data['tenloai'] = $request->tenloai;

    	DB::table('tbl_loaisanpham')->insert($data);
    	Toastr::success('Thêm thành công','Thành công');
    	return Redirect::to('danhsachloaisanpham');
    }
    public function sualoaisanpham($maloai){
        $this->AuthLogin();
    	$sualoaisanpham = DB::table('tbl_loaisanpham')->where('maloai',$maloai)->get();
    	$manager_loaisanpham = view('admin.sualoaisanpham')->with('sualoaisanpham',$sualoaisanpham);
    	return view('admin_layout')->with('admin.sualoaisanpham',$manager_loaisanpham);
    }
    public function updateloaisanpham(Request $request,$maloai){
        $this->AuthLogin();
    	$data = array();
    	$data['tenloai'] = $request->tenloai;

    	DB::table('tbl_loaisanpham')->where('maloai',$maloai)->update($data);
    	// Session::put('message','Sửa sản phẩm thành công');
        Toastr::success('Cập nhật thành công','Thành công');
    	return Redirect::to('danhsachloaisanpham');
    }
    public function xoaloaisanpham($maloai){
        $this->AuthLogin();
    	DB::table('tbl_loaisanpham')->where('maloai',$maloai)->delete();
    	Toastr::success('Xóa thành công','Thành công');
    	return Redirect::to('danhsachloaisanpham');
    }
    //ket thuc loai san pham

    //danh muc san pham trang chu
    public function show_loaisanpham_home($maloai){
        $loaisanpham = DB::table('tbl_loaisanpham')->orderby('maloai','desc')->get();

        $sanpham_by_id = DB::table('tbl_sanpham')->join('tbl_loaisanpham','tbl_sanpham.maloai','=','tbl_loaisanpham.maloai')->where('tbl_sanpham.maloai',$maloai)->get();
        return view('pages.loaisanpham.show_loaisanpham')->with('loaisanpham',$loaisanpham)->with('sanpham_by_id',$sanpham_by_id);
    }
}
