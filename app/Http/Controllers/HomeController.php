<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Toastr;
session_start();

class HomeController extends Controller
{
    public function index(){
    	$loaisanpham = DB::table('tbl_loaisanpham')->orderby('maloai','desc')->get();
    	// $danhsachsanpham = DB::table('tbl_sanpham')
     //    ->join('tbl_loaisanpham','tbl_loaisanpham.maloai','=','tbl_sanpham.maloai')
     //    ->orderby('tbl_sanpham.masanpham','desc')->get();

    	$danhsachsanpham = DB::table('tbl_sanpham')->where('trangthai','1')->orderby('masanpham','desc')->limit(4)->get();
    	return view('pages.home')->with('loaisanpham',$loaisanpham)->with('danhsachsanpham',$danhsachsanpham);
    }
}
