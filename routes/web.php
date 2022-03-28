<?php
use App\Http\Controllers\AkunController;
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

Route::get('/', function () {
    return view('layout/template');
});
// dasboard
Route::get('dasboard','DasboardController@dasboard')->name('dasboard.index');
// ---ADMIN----
// Pengguna User
Route::resource('akun', 'AkunController');
Route::resource('barang', 'BarangController');
Route::resource('pelanggan', 'PelangganController');
// Tunai
Route::get('tunai', 'TunaiController@create')->name('tunai.create');
Route::post('detailtunai','TunaiController@detailStore')->name('detailtunai.store');
Route::get('detailindex/{id_trx}','TunaiController@detailIndex')->name('detailindex.index');
Route::post('detailheader','TunaiController@headerstoretunai')->name('detailheader.index');
Route::get('detailstok/{kode_barang}','TunaiController@cekstok')->name('detailstok.index');
Route::post('stok/{kode_barang}','TunaiController@stok')->name('stok.index');
Route::get('daftartrx','TunaiController@daftartrx')->name('daftartrx.index');
Route::get('nota','TunaiController@nota')->name('nota.index');
Route::delete('deletedetail/{id_trx}','TunaiController@deletedetail')->name('deletedetail.index');
// Kredit
Route::get('kredit', 'KreditController@create')->name('kredit.create');
Route::post('detailkredit', 'KreditController@detailStore')->name('detailkredit.store');
Route::get('detailindexkredit/{id_trx}', 'KreditController@detailIndex')->name('detailindexkredit.index');
Route::post('detailheaderkredit', 'KreditController@headerstoretunai')->name('detailheaderkredit.index');
Route::get('detailstokkredit/{kode_barang}', 'KreditController@headerstoretunai')->name('detailstokkredit.index');
Route::get('detailkurangbayar/{id_trx}', 'KreditController@cekkurang')->name('detailkurangbayar.index');
Route::get('nota','KreditController@nota')->name('nota.index');
// angsuran dan bayar
Route::get('angsuranindex','AngsuranController@index')->name('angsuranindex.index');
Route::get('bayarindex/{id_trx}','AngsuranController@indexbayar')->name('bayarindex.index');
Route::post('bayarang','AngsuranController@store')->name('bayarang.store');
// Laporan Penjualan
Route::get('lappen','LappenController@index')->name('lappen.index');
Route::post('lappentampil','LappenController@tampilindex')->name('lappentampil.index');
// Laporan Piutang
Route::get('lappi','LappiController@index')->name('lappi.index');
Route::post('lappitampil','LappiController@tampilindex')->name('lappitampil.index');
// Jurnal Umum
Route::get('jurnalumum','JUController@index')->name('jurnalumum.index');
Route::post('tampil','JUController@tampil')->name('tampil.index');
// Buku Besar
Route::get('bukubesar','BukubesarController@index')->name('bukubesar.index');
Route::get('bukubesartampil','BukubesarController@tampilindex')->name('bukubesartampil.index');
// Neraca
Route::get('neraca','NeracaController@index')->name('neraca.index');

// --PEMILIK--
