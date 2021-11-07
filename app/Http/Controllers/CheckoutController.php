<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
    	$loaisanpham = DB::table('tbl_loaisanpham')->orderby('maloai','desc')->get();
    	return view('pages.checkout.login_checkout')->with('loaisanpham',$loaisanpham);
    }
}
