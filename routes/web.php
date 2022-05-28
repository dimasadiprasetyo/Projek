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

// Logiin
Route::get('/', function () {
    return view('login.index');
})->name('login');

Route::post('/postlogin','LoginController@postlogin')->name('postlogin');
Route::get('/logout','LoginController@logout')->name('logout');

Route::middleware(['auth', 'ceklevel:admin,pemilik'])->group(function () {
    
    Route::get('/dasboard','DasboardController@dasboard')->name('dasboard.index');
    
    Route::get('password', 'passwordController@edit')->name('password.edit');
});

Route::middleware(['auth','ceklevel:admin'])->group(function () {
    
    // ---ADMIN----
    
    // Route::resource('pengguna', 'PenggunaController');
    Route::resource('akun', 'AkunController');
    Route::get('barangindex', 'BarangController@tampil')->name('barangindex.tampil');
    // Route::resource('barangindex', 'BarangController');
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
    Route::get('notatunai','TunaiController@nota')->name('notatunai.index');
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
    Route::get('cetakangdp/{id_trx}','AngsuranController@cetakdp')->name('cetakangdp.index');
    Route::get('cetakang/{kode_angsuran}','AngsuranController@cetak')->name('cetakang.index');
    
    // Laporan Penjualan
    Route::get('lappen','LappenController@index')->name('lappen.index');
    Route::post('lappentampil','LappenController@tampilindex')->name('lappentampil.index');
    Route::post('cetaklappen','LappenController@cetak')->name('cetaklappen.index');
    
    // Laporan Piutang
    Route::get('lappi','LappiController@index')->name('lappi.index');
    Route::post('lappitampil','LappiController@tampilindex')->name('lappitampil.index');
    Route::post('cetaklappi','LappiController@cetak')->name('cetaklappi.index');

    // Jurnal Umum
    Route::get('jurnalumum','JUController@index')->name('jurnalumum.index');
    Route::get('tampil','JUController@tampil')->name('tampil.index');
    Route::get('posting/{id_jurnal}','JUController@posting')->name('posting.index');
    // Route::patch('posting/{id_jurnal}','JUController@posting')->name('posting.index');
    Route::post('cetakJU','JUController@cetak')->name('cetakJU.index');
    
    // Buku Besar
    Route::get('bukubesar','BukubesarController@index')->name('bukubesar.index');
    Route::post('bukubesartampil','BukubesarController@tampilindex')->name('bukubesartampil.index');
    Route::post('cetakbb','BukubesarController@cetak')->name('cetakbb.index');

    // Neraca
    Route::get('neraca','NeracaController@index')->name('neraca.index');
    Route::post('neracatampil','NeracaController@tampil')->name('neracatampil.index');
    Route::post('cetak','NeracaController@cetak')->name('cetakneraca.index');

});

Route::middleware(['auth', 'ceklevel:pemilik'])->group(function () {
    // --PEMILIK--
    //---------------------------
    //---------------------------
    //---------------------------
    // Pengguna User
    Route::get('penggunaindex', 'PenggunaController@index')->name('pengguna.index');
    Route::get('penggunacreate', 'PenggunaController@create')->name('pengguna.create');
    Route::post('penggunastore', 'PenggunaController@store')->name('pengguna.store');
    Route::get('penggunaedit', 'PenggunaController@edit')->name('pengguna.edit');
    Route::patch('password', 'PenggunaController@update')->name('pengguna.update');
    Route::delete('penggunadelete/{id}', 'PenggunaController@destroy')->name('pengguna.delete');

    //Barang
    Route::resource('barang', 'BarangController');
    Route::delete('select-delete','BarangController@deleteCheckedStudents')->name('select.delete');

    // Laporan Penjualan
    Route::get('lappenpemilik','LappenController@indexpemilik')->name('lappen.indexpemilik');
    Route::get('lappentampilpemilik','LappenController@tampilindexpemilik')->name('lappentampil.indexpemilik');
    
    // Laporan Piutang
    Route::get('lappipemilik','LappiController@indexpemilik')->name('lappipemilik.index');
    Route::post('lappitampilpemilik','LappiController@tampilindexpemilik')->name('lappitampilpemilik.index');
    
    //Jurnal Umum
    Route::get('jurnalumumpemilik','JUController@indexpemilik')->name('jurnalumum.indexpemilik');
    
    Route::post('tampilpemilik','JUController@tampilpemilik')->name('tampilpemilik.index');
    // Route::get('posting/{id_jurnal}','JUController@posting')->name('posting.index');
    // Route::post('cetakJU','JUController@cetak')->name('cetakJU.index');
    
    // Buku Besar
    Route::get('bukubesarpemilik','BukubesarController@indexpemilik')->name('bukubesarpemilik.index');
    Route::post('bukubesartampilpemilik','BukubesarController@tampilindexpemilik')->name('bukubesartampilpemilik.index');

    // Neraca
    Route::get('neracapemilik','NeracaController@indexpemilik')->name('neracapemilik.index');
    Route::post('neracatampilpemilik','NeracaController@tampilpemilik')->name('neracatampilpemilik.index');
    // Route::get('cetak','NeracaController@cetak')->name('cetakneraca.index');

});





