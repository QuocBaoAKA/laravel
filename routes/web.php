<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//frontend
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');

//Danh muc san pham trang chu
Route::get('/danhmucsanpham/{maloai}','LoaiSanPham@show_loaisanpham_home');
Route::get('/chitietsanpham/{masanpham}','SanPham@details_sanpham');

//backend
Route::get('/admin','Admincontroller@index');
Route::get('/dashboard','Admincontroller@show_dashboard');
Route::get('/logout','Admincontroller@logout');
Route::post('/admin-dashboard','Admincontroller@dashboard');

//sanpham
Route::get('/themsanpham','SanPham@themsanpham');
Route::get('/suasanpham/{masanpham}','SanPham@suasanpham');
Route::get('/xoasanpham/{masanpham}','SanPham@xoasanpham');
Route::get('/danhsachsanpham','SanPham@danhsachsanpham');

Route::get('/unactive-sanpham/{masanpham}','SanPham@unactive_sanpham');
Route::get('/active-sanpham/{masanpham}','SanPham@active_sanpham');

Route::post('/savesanpham','SanPham@savesanpham');
Route::post('/updatesanpham/{masanpham}','SanPham@updatesanpham');

//loaisanpham
Route::get('/themloaisanpham','LoaiSanPham@themloaisanpham');
Route::get('/sualoaisanpham/{maloai}','LoaiSanPham@sualoaisanpham');
Route::get('/xoaloaisanpham/{masanpham}','LoaiSanPham@xoaloaisanpham');
Route::get('/danhsachloaisanpham','LoaiSanPham@danhsachloaisanpham');

Route::post('/saveloaisanpham','LoaiSanPham@saveloaisanpham');
Route::post('/updateloaisanpham/{maloai}','LoaiSanPham@updateloaisanpham');

//gio hang
Route::post('/update-giohang-quantity','GioHang@update_giohang_quantity');
Route::post('/save-giohang','GioHang@save_giohang');
Route::get('/show-giohang','GioHang@show_giohang');
Route::get('/delete-to-giohang/{rowId}','GioHang@delete_to_giohang');

//checkout
Route::get('/login-checkout','CheckoutController@login_checkout');
