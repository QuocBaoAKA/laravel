<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Toastr;
session_start();

class SanPham extends Controller
{
	public function AuthLogin(){
        $tendangnhap = Session::get('tendangnhap');
        if($tendangnhap){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function themsanpham(){
    	$this->AuthLogin();
    	$loaisanpham = DB::table('tbl_loaisanpham')->orderby('maloai','desc')->get();
    	return view('admin.themsanpham')->with('loaisanpham',$loaisanpham);
    }
    public function danhsachsanpham(){
    	$this->AuthLogin();
    	$danhsachsanpham = DB::table('tbl_sanpham')
        ->join('tbl_loaisanpham','tbl_loaisanpham.maloai','=','tbl_sanpham.maloai')
        ->orderby('tbl_sanpham.masanpham','desc')->get(); /*desc: hiện danh sahs theo sản phẩm mới nhất*/
    	$manager_sanpham = view('admin.danhsachsanpham')->with('danhsachsanpham',$danhsachsanpham);
    	return view('admin_layout')->with('admin.danhsachsanpham',$manager_sanpham);
    }
    public function savesanpham(Request $request){
    	$this->AuthLogin();
    	$data = array();
    	$data['tensanpham'] = $request->tensanpham;
    	$data['mota'] = $request->motasanpham;
    	$data['gia'] = $request->gia;
    	$data['soluong'] = $request->soluong;
    	$data['hinhanh'] = $request->flHinhsp;
    	$data['maloai'] = $request->tenloai;
    	$data['trangthai'] = $request->trangthai;

    	$get_image = $request->file('flHinhsp');

    	if($get_image){
    		$get_name_image = $get_image->getClientOriginalName();
    		$name_image = current(explode('.',$get_name_image));
    		$new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    		$get_image->move('public/uploads/sanpham',$new_image);
    		$data['hinhanh'] = $new_image;
    		DB::table('tbl_sanpham')->insert($data);
	    	Toastr::success('Thêm thành công','Thành công');
	    	return Redirect::to('danhsachsanpham');
    	}
    	$data['hinhanh'] = '';
    	DB::table('tbl_sanpham')->insert($data);
    	Toastr::success('Thêm thành công','Thành công');
    	return Redirect::to('danhsachsanpham');
    }
    public function unactive_sanpham($masanpham){
    	$this->AuthLogin();
    	DB::table('tbl_sanpham')->where('masanpham',$masanpham)->update(['trangthai'=>0]);
    	Toastr::success('Ẩn thành công','Thành công');
    	return Redirect::to('danhsachsanpham');
    }
    public function active_sanpham($masanpham){
    	$this->AuthLogin();
    	DB::table('tbl_sanpham')->where('masanpham',$masanpham)->update(['trangthai'=>1]);
    	Toastr::success('Hiện thành công','Thành công');
    	return Redirect::to('danhsachsanpham');
    }
    public function suasanpham($masanpham){
    	$this->AuthLogin();
    	$loaisanpham = DB::table('tbl_loaisanpham')->orderby('maloai','desc')->get();
    	$suasanpham = DB::table('tbl_sanpham')->where('masanpham',$masanpham)->get();
    	$manager_sanpham = view('admin.suasanpham')->with('suasanpham',$suasanpham)->with('loaisanpham',$loaisanpham);
    	return view('admin_layout')->with('admin.suasanpham',$manager_sanpham);
    }
    public function updatesanpham(Request $request,$masanpham){
    	$this->AuthLogin();
    	$data = array();
    	$data['tensanpham'] = $request->tensanpham;
    	$data['mota'] = $request->motasanpham;
    	$data['gia'] = $request->gia;
    	$data['soluong'] = $request->soluong;
    	$get_image = $request->file('flHinhsp');
    	$data['maloai'] = $request->tenloai;

    	if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/sanpham',$new_image);
            $data['hinhanh'] = $new_image;
            DB::table('tbl_sanpham')->where('masanpham',$masanpham)->update($data);
	    	Toastr::success('Sửa thành công','Thành công');
	    	return Redirect::to('danhsachsanpham');
        }

    	DB::table('tbl_sanpham')->where('masanpham',$masanpham)->update($data);
    	Toastr::success('Sửa thành công','Thành công');
    	return Redirect::to('danhsachsanpham');
    }
    public function xoasanpham($masanpham){
    	$this->AuthLogin();
    	DB::table('tbl_sanpham')->where('masanpham',$masanpham)->delete();
    	Toastr::success('Xóa thành công','Thành công');
    	return Redirect::to('danhsachsanpham');
    }

    //ket thuc san pham

    //chi tiet san pham

    public function details_sanpham($masanpham){
        $loaisanpham = DB::table('tbl_loaisanpham')->orderby('maloai','desc')->get();
        
        $details_sanpham = DB::table('tbl_sanpham')
        ->join('tbl_loaisanpham','tbl_loaisanpham.maloai','=','tbl_sanpham.maloai')
        ->where('tbl_sanpham.masanpham',$masanpham)->get();

        foreach ($details_sanpham as $key => $value) {
            $maloai = $value->maloai;
        }

        $related_sanpham = DB::table('tbl_sanpham')
        ->join('tbl_loaisanpham','tbl_loaisanpham.maloai','=','tbl_sanpham.maloai')
        ->where('tbl_loaisanpham.maloai',$maloai)->whereNotIn('tbl_sanpham.masanpham',[$masanpham])->get();
        

        return view('pages.sanpham.show_details')->with('loaisanpham',$loaisanpham)->with('details_sanpham',$details_sanpham)->with('related_sanpham',$related_sanpham);
    }

}
