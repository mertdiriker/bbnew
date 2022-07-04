<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
        Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
        Route::get('ekle',[AdminController::class,'ekle'])->name('admin.ekle');
        Route::get('urunler',[AdminController::class,'urunler'])->name('admin.urunler');
        Route::get('firmalar',[AdminController::class,'firmalar'])->name('admin.firmalar');
        Route::get('importform',[AdminController::class,'importForm'])->name('admin.importform');
        Route::get('sendmail',[AdminController::class,'sendmail'])->name('admin.sendmail');
        
        


        Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
        Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
        Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');
        Route::post('add-product',[AdminController::class,'addProduct'])->name('adminAddProduct');
        Route::post('add-firm',[AdminController::class,'addFirm'])->name('adminAddFirm');
        Route::post('recipe',[AdminController::class,'AddRecipe'])->name('adminAddRecipe');
        Route::post('update-urun',[AdminController::class,'UpdateUrun'])->name('adminUpdateUrun');
        Route::post('show-recipe',[AdminController::class,'ShowRecipe'])->name('adminShowRecipe');
       
        Route::post('users-import',[AdminController::class,'import'])->name('adminImport');
        Route::post('sms-gonder',[AdminController::class,'smsgonder'])->name('smsmesaj');

       
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
    Route::get('urunler',[UserController::class,'urunler'])->name('user.urunler');
    Route::get('firmalar',[UserController::class,'firmalar'])->name('user.firmalar');
    Route::get('ekle',[UserController::class,'ekle'])->name('user.ekle');
    Route::get('proje',[UserController::class,'proje'])->name('user.proje');
    Route::get('projeler',[UserController::class,'projeler'])->name('user.projeler');
    Route::get('makineler',[UserController::class,'makineler'])->name('user.makine');
    Route::get('isemri',[UserController::class,'isemri'])->name('user.isemri');
    Route::get('teklifler',[UserController::class,'teklifler'])->name('user.teklifler');
    Route::get('hareketler',[UserController::class,'hareketler'])->name('user.urunhareket');
    Route::get('firma-urun',[UserController::class,'userShowFirmProduct'])->name('userShowFirmProduct');
    Route::get('show-recipe',[UserController::class,'ShowRecipe'])->name('userShowRecipe');
    Route::get('show-processproduct',[UserController::class,'ShowProcessToProduct'])->name('ShowProcessToProduct');
    Route::get('siparis',[UserController::class,'siparisler'])->name('user.siparis');
    Route::get('ongoru-show',[UserController::class,'ShowOngoruOlustur'])->name('userShowOngoruOlustur');
    Route::get('siparis-show',[UserController::class,'ShowSiparisOlustur'])->name('userShowSiparisOlustur');
    Route::get('process',[UserController::class,'processler'])->name('user.process');
    Route::get('operasyon-show',[UserController::class,'ShowOperasyon'])->name('userOperasyonShow');
    Route::get('3mimport',[UserController::class,'mimport'])->name('user.3mimport');
    Route::get('process-olustur',[UserController::class,'ShowAddProcess'])->name('ShowProcessEkle');
    Route::get('risk-ler',[UserController::class,'ShowRisk'])->name('ShowRisk');
    Route::get('kontrol-ler',[UserController::class,'ShowControl'])->name('ShowControl');
    Route::get('urun-detay',[UserController::class,'ShowUpdateUrun'])->name('userShowUpdateUrun');
    Route::get('firma-duzenle',[UserController::class,'ShowUpdateFirm'])->name('ShowUpdateFirm');
    Route::get('backxxx',[UserController::class,'GoBack'])->name('GoBack');
    Route::get('prototip',[UserController::class,'prototipler'])->name('user.prototip');
    Route::get('proje-detay',[UserController::class,'ShowUpdateProject'])->name('userShowUpdateProject');
  


    

    Route::post('add-product',[UserController::class,'addProduct'])->name('userAddProduct');
    Route::post('recipe',[UserController::class,'AddRecipe'])->name('userAddRecipe');
    Route::post('add-processtoproduct',[UserController::class,'AddProcessToProduct'])->name('AddProcessToProduct');
    Route::post('add-firm',[UserController::class,'addFirm'])->name('userAddFirm');
    Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('userPictureUpdate');
    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');
    Route::post('firma-urun',[UserController::class,'firmaurunEkle'])->name('userFirmaUrunEkle');
  
  
    Route::post('urun-duzenle',[UserController::class,'UpdateUrun'])->name('userUrunUpdate');
    Route::post('urun-detayla',[UserController::class,'AddDetail'])->name('userAddDetail');
    Route::post('urun-sil',[UserController::class,'deleteUrun'])->name('userDeleteUrun');

    Route::post('firma-guncelle',[UserController::class,'UpdateFirm'])->name('UpdateFirm');

  
    Route::post('proje-duzenle',[UserController::class,'userUpdateProject'])->name('userProjeUpdate');

    Route::post('teklif-olustur',[UserController::class,'userAddTeklif'])->name('userAddTeklif');
    Route::post('teklif-goster',[UserController::class,'userShowUpdateTeklif'])->name('userShowUpdateteklif');
    Route::post('teklif-dosya',[UserController::class,'SaveProjectFile'])->name('userSaveProjectFile');
    Route::post('teklif-duzenle',[UserController::class,'userUpdateTeklif'])->name('userTeklifUpdate');
    Route::post('teklif-dosya-indir',[UserController::class,'DownloadProjectFile'])->name('userDownloadProjectFile');
    Route::post('teklif-calisma-goster',[UserController::class,'userShowWorkTeklif'])->name('userShowWorkTeklif');
    
    Route::post('stok-gir',[UserController::class,'AddStockEntry'])->name('userAddStockEntry');
    Route::post('stok-gir-onay',[UserController::class,'CheckAddStockEntry'])->name('userAddStockEntryCheck');
    Route::post('stok-cik',[UserController::class,'AddStockExit'])->name('userAddStockExit');
    Route::post('stok-ver',[UserController::class,'StockVer'])->name('StokVer');
   



    Route::post('stok-ekle',[UserController::class,'StockEntry'])->name('userStockEntry');
    Route::post('stok-cikti',[UserController::class,'StockExit'])->name('userStockExit');

    Route::post('firma-urun-ekle',[UserController::class,'userAddProductToFirm'])->name('userAddProductToFirm');

    Route::post('user-machine-import',[UserController::class,'importmachine'])->name('userMachineImport');

    Route::post('dilim-save',[UserController::class,'DilimSave'])->name('userDilimSave');
    Route::post('fingerlift-save',[UserController::class,'FingerliftSave'])->name('userFingerliftSave');
    Route::post('siralikesim-save',[UserController::class,'SiraliKesimSave'])->name('userSiraliKesimSave');

    Route::post('ongoru-olustur',[UserController::class,'OngoruOlustur'])->name('userOngoruOlustur');
    Route::post('siparis-olustur',[UserController::class,'SiparisOlustur'])->name('userSiparisOlustur');
    Route::post('ongoru-siparis',[UserController::class,'OngoruToSiparis'])->name('OngoruToSiparis');
    Route::post('user-ongoru-import',[UserController::class,'importongoru'])->name('userOngoruImport');
    Route::post('user-siparis-import',[UserController::class,'importsiparis'])->name('userSiparisImport');
    Route::post('user-process-import',[UserController::class,'importprocess'])->name('userProcessImport');
    Route::post('user-operasyon-import',[UserController::class,'importoperasyon'])->name('userOperasyonImport');
    Route::post('siparis-kapa',[UserController::class,'SiparisKapa'])->name('userSiparisKapa');
    Route::post('seribasi-onay',[UserController::class,'SeriBasiOnay'])->name('userSeriBasiOnay');
    Route::post('serisonu-onay',[UserController::class,'SeriSonuOnay'])->name('userSeriSonuOnay');

    Route::post('user-process-ekle',[UserController::class,'AddProcess'])->name('ProcessEkle');
    Route::post('add-operasyon',[UserController::class,'AddOperasyon'])->name('AddOperasyon');
    Route::post('add-risk',[UserController::class,'AddRisk'])->name('AddRisk');
    Route::post('add-control',[UserController::class,'AddControl'])->name('AddControl');

    Route::post('update-operasyon',[UserController::class,'UpdateOperasyon'])->name('UpdateOperasyon');
    Route::post('update-risk',[UserController::class,'UpdateRisk'])->name('UpdateRisk');
    Route::post('update-control',[UserController::class,'UpdateControl'])->name('UpdateControl');

    Route::post('planla-siparis',[UserController::class,'SiparisPlanla3'])->name('SiparisPlanla');
    Route::post('alt-siparis-olustur',[UserController::class,'AltSiparisOlustur'])->name('AltSiparisOlustur');
    Route::post('siparis-stok-emri',[UserController::class,'SiparisStokEmri'])->name('SiparisStokEmri');
    Route::post('siparis-plan-tarih',[UserController::class,'SiparisPlanTarih'])->name('SiparisPlanTarih');

    Route::post('recete-urun-goster',[UserController::class,'ShowReceteUrun'])->name('ShowReceteUrun');
    Route::post('recete-urun-ekle',[UserController::class,'AddReceteUrun'])->name('AddReceteUrun');
    Route::post('recete-sil',[UserController::class,'DeleteRecete'])->name('DeleteRecete');
   

 
    Route::post('addproje',[UserController::class,'AddProject'])->name('AddProject');
    Route::post('po-dosya-indir',[UserController::class,'DownloadPOFile'])->name('DownloadPOFile');

    Route::post('work-urun-ekle',[UserController::class,'workurunekle'])->name('workurunekle');
    Route::post('work-save-product',[UserController::class,'saveworkproduct'])->name('saveworkproduct');
   
    

   

   
   
   
    
});
Route::group(['prefix'=>'client', 'middleware'=>['isClient','auth','PreventBackHistory']], function()
{

    Route::get('dashboard',[ClientController::class,'index'])->name('client.dashboard');
    Route::get('profile',[ClientController::class,'profile'])->name('client.profile');
    Route::get('proje',[ClientController::class,'proje'])->name('client.proje');
    Route::get('hizliproje',[ClientController::class,'hizliproje'])->name('client.hizliproje');
    Route::get('excelproje',[ClientController::class,'excelproje'])->name('client.excelproje');
    Route::get('sikproje',[ClientController::class,'sikproje'])->name('client.sikproje');
    Route::get('teklifler',[ClientController::class,'teklifler'])->name('client.teklifler');

    Route::post('hizliproje',[ClientController::class,'fetchTip'])->name('clientfetchTip');
    

    Route::post('change-profile-picture',[ClientController::class,'updatePicture'])->name('clientPictureUpdate');
    Route::post('change-password',[UserController::class,'changePassword'])->name('clientChangePassword');
    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('clientUpdateInfo');

    Route::post('client-import',[ClientController::class,'import'])->name('clientImport');
    Route::post('teklif-sik-goster',[ClientController::class,'clientShowSikTeklif'])->name('clientTeklifSikShow');
    Route::post('teklif-hizli-olustur',[ClientController::class,'clientHizliTeklif'])->name('clientTeklifHizli');
    Route::post('teklif-olustur',[ClientController::class,'clientAddTeklif'])->name('clientAddTeklif');
    Route::post('teklif-dosya',[ClientController::class,'SaveProjectFile'])->name('clientSaveProjectFile');
    Route::post('teklif-goster',[ClientController::class,'clientShowUpdateTeklif'])->name('clientShowUpdateteklif');
    Route::post('teklif-yinele-goster',[ClientController::class,'clientShowYineleTeklif'])->name('clientShowYineleteklif');
    Route::post('teklif-duzenle',[ClientController::class,'clientUpdateTeklif'])->name('clientTeklifUpdate');
    Route::post('ornek-excel',[ClientController::class,'DownloadProjectFile'])->name('clientDownloadProjectFile');
    


});
