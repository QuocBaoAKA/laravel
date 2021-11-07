<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Toastr;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $tendangnhap = Session::get('tendangnhap');
        if($tendangnhap){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('trang-chu')->send();
        }
    }
    public function index(){
    	return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
    	$tendangnhap = $request->tendangnhap;
    	$matkhau = md5($request->matkhau);

    	$result = DB::table('tbl_taikhoan')->where('tendangnhap',$tendangnhap)->where('matkhau',$matkhau)->first();
    	if($result){
    		Session::put('hoten',$result->hoten);
    		Session::put('tendangnhap',$result->tendangnhap);
    		return Redirect::to('/dashboard');
    	}else{
    		Toastr::error('Tên đăng nhập hoặc mật khẩu bị sai','Thất bại');
    		return Redirect::to('/trang-chu');
    	}
    }
	public function logout(Request $request){
        $this->AuthLogin();
		Session::put('hoten',null);
		Session::put('tendangnhap',null);
		return Redirect::to('/trang-chu');
	}
}
