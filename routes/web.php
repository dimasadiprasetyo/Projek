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
Route::post('detailheader/{id_trx}','TunaiController@headerstoretunai')->name('detailheader.index');
Route::get('detailstok/{kode_barang}','TunaiController@cekstok')->name('detailstok.index');
Route::put('stok/{kode_barang}','TunaiController@stok')->name('stok.index');
Route::get('daftartrx','TunaiController@daftartrx')->name('daftartrx.index');
Route::get('detailbayar/{id_trx}', 'TunaiController@cekkurang')->name('detailbayar.index');
Route::get('notatunai/{id_trx}','TunaiController@nota')->name('notatunai.index');
Route::delete('deletedetail/{id_trx}','TunaiController@deletedetail')->name('deletedetail.index');

// Kredit
Route::get('kredit', 'KreditController@create')->name('kredit.create');
Route::post('detailkredit', 'KreditController@detailStore')->name('detailkredit.store');
Route::get('detailindexkredit/{id_trx}', 'KreditController@detailIndex')->name('detailindexkredit.index');
Route::post('detailheaderkredit', 'KreditController@headerstoretunai')->name('detailheaderkredit.index');
Route::get('detailstokkredit/{kode_barang}', 'KreditController@cekstokkredit')->name('detailstokkredit.index');
Route::put('stokkredit/{kode_barang}', 'KreditController@stokkredit')->name('stokkredit.index');
Route::get('daftartrxkredit', 'KreditController@daftartrxkredit')->name('stokkredit.index');
Route::get('detailkurangbayar/{id_trx}', 'KreditController@cekkurang')->name('detailkurangbayar.index');
Route::get('nota','KreditController@nota')->name('nota.index');
Route::delete('deletedetailkredit/{id_trx}','KreditController@deletedetailkredit')->name('deletedetailkredit.index');


// angsuran dan bayar
Route::get('angsuranindex','AngsuranController@index')->name('angsuranindex.index');
Route::get('bayarindex/{id_trx}','AngsuranController@indexbayar')->name('bayarindex.index');
Route::post('bayarang/{id_trx}','AngsuranController@store')->name('bayarang.store');
Route::get('cetakang','AngsuranController@cetak')->name('cetakang.index');

// Laporan Penjualan
Route::get('lappen','LappenController@index')->name('lappen.index');
Route::get('lappentampil','LappenController@tampilindex')->name('lappentampil.index');
Route::get('cetaklappen','LappenController@cetak')->name('cetaklappen.index');

// Laporan Piutang
Route::get('lappi','LappiController@index')->name('lappi.index');
Route::post('lappitampil','LappiController@tampilindex')->name('lappitampil.index');
Route::get('cetaklappi','LappiController@cetak')->name('cetaklappi.index');

// Jurnal Umum
Route::get('jurnalumum','JUController@index')->name('jurnalumum.index');
Route::post('tampil','JUController@tampil')->name('tampil.index');
Route::get('posting/{id_jurnal}','JUController@posting')->name('posting.index');
Route::get('cetakJU','JUController@cetak')->name('cetakJU.index');

// Buku Besar
Route::get('bukubesar','BukubesarController@index')->name('bukubesar.index');
Route::post('bukubesartampil','BukubesarController@tampilindex')->name('bukubesartampil.index');
Route::get('cetakbb','BukubesarController@cetak')->name('cetakbb.index');

// Neraca
Route::get('neraca','NeracaController@index')->name('neraca.index');
Route::post('neracatampil','NeracaController@tampil')->name('neracatampil.index');


// --PEMILIK--
// Laporan Penjualan
Route::get('lappenpemilik','LappenController@indexpemilik')->name('lappen.indexpemilik');
Route::get('lappentampilpemilik','LappenController@tampilindexpemilik')->name('lappentampil.indexpemilik');
