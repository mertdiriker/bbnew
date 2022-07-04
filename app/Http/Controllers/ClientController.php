<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Excel;
use App\Models\User;
use App\Models\Recipe;
use App\Imports\ProductImport;
use App\Imports\TeklifImport;
use App\Models\Product;
use Illuminate\Filesystem\Filesystem;
use View;
use File;


class ClientController extends Controller
{
    function index(){
        $projects = DB::select('select * from proje');
        return view('dashboards.clients.index',['projects'=>$projects]);
       }
       function profile(){
        return view('dashboards.clients.profile');
    }
    function import() 
    {
        Excel::import(new TeklifImport,request()->file('file'));
        Excel::import(new ProductImport,request()->file('file'));

        header('Content-Type: text/html; charset=utf-8');
                    $postUrl='http://panel.vatansms.com/panel/smsgonder1Npost.php';
                    $MUSTERİNO='29984'; //5 haneli müşteri numarası
                    $KULLANICIADI='05339640512';
                    $SIFRE='Bur9640512';
                    $ORGINATOR="BUR-BANT";

                    $TUR='Normal';  // Normal yada Turkce
                    $ZAMAN='2014-04-07 10:00:00';

                    $mesaj1=Auth::user()->name.' isimli kullanıcı '.\Carbon\Carbon::now().'tarihinde Excel kullanarak teklif oluşturdu.';
                    $numara1='05339640512';
                 

                    $xmlString='data=<sms>
                    <kno>'. $MUSTERİNO .'</kno>
                    <kulad>'. $KULLANICIADI .'</kulad>
                    <sifre>'.$SIFRE .'</sifre>
                    <gonderen>'.  $ORGINATOR .'</gonderen>
                    <mesaj>'. $mesaj1 .'</mesaj>
                    <numaralar>'. $numara1.'</numaralar>
                    <tur>'. $TUR .'</tur>
                    </sms>';

                    // Xml içinde aşağıdaki alanlarıda gönderebilirsiniz.
                    //<zaman>'. $ZAMAN.'</zaman> İleri tarih için kullanabilirsiniz

                    $Veriler =  $xmlString;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $postUrl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $Veriler);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                    $response = curl_exec($ch);
        return back();
               
       
    }
    function proje(){
        $products = DB::select('select * from urun');
        $firms = DB::select('select * from firma');
        return view('dashboards.clients.proje',['products'=>$products,'firms'=>$firms]);
        }
        function hizliproje(){
            $products = DB::select('select * from urun');
            $firms = DB::select('select * from firma');
            return view('dashboards.clients.hizliproje',['products'=>$products,'firms'=>$firms]);
            }
            function fetchTip(Request $request){
                $tip = $request->input('tip');
                $tip2 = "";
                if($tip=="AFT+AFT"){
                $tip="AFT";
                $tip2="AFT";
                }
                if($tip=="Thinsulate+TransferTape"){
                    $tip="Thinsulate";
                    $tip2="Transfer Tape";
                }
                if($tip=="Duallock+Duallock"){
                    $tip="Duallock";
                    $tip2="Duallock";
                }
                $products = DB::select("select * from urun where urun_Tur = '$tip'");
                $product2s = DB::select("select * from urun where urun_Tur = '$tip2'");
                return response()->json(['products'=>$products,'product2s'=>$product2s]);
            }
            function excelproje(){
         
                return view('dashboards.clients.excelproje');
                }
                function sikproje(){
         
                    return view('dashboards.clients.sikproje');
                    }
    function teklifler(){
        $kisi=Auth::user()->id;
        $teklifs  = DB::select("SELECT firma.firma_Ad,teklif.*,urun.urun_ID,urun.urun_Ad,urun2.urun_ID,urun2.urun_Ad AS S1 FROM (teklif INNER JOIN urun ON teklif.teklif_hammaddeID = urun.urun_ID) 
        inner join urun AS urun2 ON teklif.teklif_hammadde2ID = urun2.urun_ID inner join firma on teklif.teklif_firmaID = firma.firma_ID HAVING teklif.teklif_kisi = '$kisi'");
        $dosyas = DB::select('SELECT * FROM teklifdosya');
        return view('dashboards.clients.teklifler',['teklifs'=>$teklifs,'dosyas'=>$dosyas]);
    }
    function SaveProjectFile(Request $request){
        $path = 'clients/projects/';
        $file = $request->file('file');
        $type = $file->getClientOriginalName();
        $extension = $request->file->getClientOriginalExtension();
        $new_name = Auth::user()->firm_ID.date('Ymd').$type;
        $upload = $file->move(public_path($path), $new_name);
        $data=array('teklif_dosya'=>$new_name,'teklif_dosyatur'=>$extension);
        $update = DB::table('teklif')->insert($data);
    
        return back()->with('success','Dosya başarıyla eklendi!');
    }
    function DownloadProjectFile(Request $request){
        $pathlocation=$request->input('dosyaad');
        
        
        $path = public_path('clients/projects/'.$pathlocation.'');
    
            return response()->download($path,null,[],null);
    }
    function clientAddTeklif(Request $request)
{
    
    $figur = $request->input('sekil');
    $singleorcombine = $request->input('ProductType');
    $uruntip = $request->input('Product');
    $pakettip = $request->input('PackType');
    $soptarih = $request->input('SOP');
    $eoptarih = $request->input('EOP');
    $hacim = $request->input('AnnualVolume');
    $firmid = $request->input('Customer');
    $projead = $request->input('ProjectName');
    $projekod = $request->input('ProjectCode');
    $fingerlift = $request->input('FingerLift');
    $linerchange = $request->input('LinerChange');
    $sandwich = $request->input('Sandwich');
    $hottrim = $request->input('HotTrim');
    $plaincut = $request->input('PlainCut');
    $edgeseal = $request->input('EdgeSeal');
    $urunen = $request->input('WidthSize');
    $urunboy = $request->input('LengthSize');
    $fingerliftlength = $request->input('EXTSize');
    $sheetwidth = $request->input('SheetWidthItem');
    $sheetlength = $request->input('SheetLengthItem');
    $sheetspace = $request->input('SpaceSize');
    $hammadde = $request->input('Product1');
    $hammadde2 = $request->input('Product2');
    $path = 'clients/projects/';
    $file = $request->file('file');
    $type = $file->getClientOriginalName();
    $extension = $request->file->getClientOriginalExtension();
    $new_name = Auth::user()->firm_ID.date('Ymd').$type;
    $upload = $file->move(public_path($path), $new_name);
  


    $data=array('teklif_figur'=>$figur,'teklif_singleorcombine'=>$singleorcombine,'teklif_uruntip'=>$uruntip,'teklif_pakettip'=>$pakettip,'teklif_soptarih'=>$soptarih,
    'teklif_eoptarih'=>$eoptarih,'teklif_hacim'=>$hacim,'teklif_firmaID'=>$firmid,'teklif_projead'=>$projead,'teklif_projekod'=>$projekod,'teklif_fingerlift'=>$fingerlift,
    'teklif_linerchange'=>$linerchange,'teklif_sandwich'=>$sandwich,'teklif_hottrim'=>$hottrim,'teklif_plaincut'=>$plaincut,'teklif_edgeseal'=>$edgeseal,'teklif_urunen'=>$urunen,
    'teklif_urunboy'=>$urunboy,'teklif_fingerliftlength'=>$fingerliftlength,'teklif_sheeten'=>$sheetwidth,'teklif_sheetboy'=>$sheetlength,'teklif_sheetspace'=>$sheetspace,
    'teklif_hammaddeID'=>$hammadde,'teklif_hammadde2ID'=>$hammadde2,'teklif_dosya'=>$new_name,'teklif_dosyatur'=>$extension);
    $check = DB::table('teklif')->insert($data);
    $check3 = Product::where('urun_Kod', '=', $projekod)->first();
if ($check3 === null) {
    $data2=array('urun_Ad'=>$projead,'urun_Kod'=>$projekod);
    $check2 = DB::table('urun')->insert($data2);
}
    

    header('Content-Type: text/html; charset=utf-8');
                    $postUrl='http://panel.vatansms.com/panel/smsgonder1Npost.php';
                    $MUSTERİNO='29984'; //5 haneli müşteri numarası
                    $KULLANICIADI='05339640512';
                    $SIFRE='Bur9640512';
                    $ORGINATOR="BUR-BANT";

                    $TUR='Normal';  // Normal yada Turkce
                    $ZAMAN='2014-04-07 10:00:00';

                    $mesaj1=Auth::user()->name.' isimli kullanıcı '.\Carbon\Carbon::now().'tarihinde Otomatik Teklif kullanarak bir teklif oluşturdu.';
                    $numara1='05339640512';
                 

                    $xmlString='data=<sms>
                    <kno>'. $MUSTERİNO .'</kno>
                    <kulad>'. $KULLANICIADI .'</kulad>
                    <sifre>'.$SIFRE .'</sifre>
                    <gonderen>'.  $ORGINATOR .'</gonderen>
                    <mesaj>'. $mesaj1 .'</mesaj>
                    <numaralar>'. $numara1.'</numaralar>
                    <tur>'. $TUR .'</tur>
                    </sms>';

                    // Xml içinde aşağıdaki alanlarıda gönderebilirsiniz.
                    //<zaman>'. $ZAMAN.'</zaman> İleri tarih için kullanabilirsiniz

                    $Veriler =  $xmlString;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $postUrl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $Veriler);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                    $response = curl_exec($ch);

    //$akillikod=base_convert($hammadde,10,36).base_convert($hammadde2,10,36).;

    //$data2=array('urun_Akillikod'=>$akillikod);

    //$check2=DB::table('teklif')->insert($data2);

    if($check){
        return back()->with('success','Teklif başarıyla eklendi!');
    }
    else
    {
        return back()->with('error','Teklif eklenemedi!');
    }
}

function clientShowUpdateTeklif(Request $request){

    $teklifID = $request->input('teklifID');
    $teklifs = DB::select("SELECT firma.firma_Ad,firma.firma_ID,teklif.*,urun.urun_ID,urun.urun_Ad,urun2.urun_ID AS S1_ID,urun2.urun_Ad AS S1 FROM (teklif INNER JOIN urun ON teklif.teklif_hammaddeID = urun.urun_ID) 
    inner join urun AS urun2 ON teklif.teklif_hammadde2ID = urun2.urun_ID inner join firma on teklif.teklif_firmaID = firma.firma_ID HAVING teklif.teklif_ID = '$teklifID'");

    $firms = DB::select('select * from firma');

    $products = DB::select('select * from urun');
             

    return view('dashboards.clients.teklifduzenle',['teklifs'=>$teklifs,'firms'=>$firms,'products'=>$products]);

}
function clientShowYineleTeklif(Request $request){

    $teklifID = $request->input('teklifID');
    $teklifs = DB::select("SELECT firma.firma_Ad,firma.firma_ID,teklif.*,urun.urun_ID,urun.urun_Ad,urun2.urun_ID AS S1_ID,urun2.urun_Ad AS S1 FROM (teklif INNER JOIN urun ON teklif.teklif_hammaddeID = urun.urun_ID) 
    inner join urun AS urun2 ON teklif.teklif_hammadde2ID = urun2.urun_ID inner join firma on teklif.teklif_firmaID = firma.firma_ID HAVING teklif.teklif_ID = '$teklifID'");

    $firms = DB::select('select * from firma');

    $products = DB::select('select * from urun');
             

    return view('dashboards.clients.teklifyinele',['teklifs'=>$teklifs,'firms'=>$firms,'products'=>$products]);

}
function clientShowSikTeklif(Request $request){

    $figur = $request->input('figur');
    $singleorcombine = $request->input('singleorcombine');
    $uruntip = $request->input('tip');
    $pakettip = $request->input('pakettip');
    $fingerlift = $request->input('fingerlift');
    $linerchange = $request->input('linerchange');
    $sandwich = $request->input('sandwich');
    $hottrim = $request->input('hottrim');
    $plaincut = $request->input('plaincut');
    $edgeseal = $request->input('edgeseal');
    $products = DB::select('select * from urun');
    $firms = DB::select('select * from firma');
    return view('dashboards.clients.sikprojeolustur',['figur'=>$figur,'singleorcombine'=>$singleorcombine,'tip'=>$uruntip,'pakettip'=>$pakettip
    ,'fingerlift'=>$fingerlift,'linerchange'=>$linerchange,'sandwich'=>$sandwich,'hottrim'=>$hottrim,'plaincut'=>$plaincut
    ,'edgeseal'=>$edgeseal,'products'=>$products,'firms'=>$firms]);

}
function clientHizliTeklif(Request $request){
    $tekliftip = $request->input('tekliftip');
    $figur = $request->input('figur');
    $singleorcombine = $request->input('singleorcombine');
    $uruntip = $request->input('tip');
    $pakettip = $request->input('pakettip');
    $soptarih = $request->input('soptarih');
    $eoptarih = $request->input('eoptarih');
    $hacim = $request->input('hacim');
    $firmid = $request->input('firma');
    $projead = $request->input('projead');
    $projekod = $request->input('projekod');
    $fingerlift = $request->input('fingerlift');
    $linerchange = $request->input('linerchange');
    $sandwich = $request->input('sandwich');
    $hottrim = $request->input('hottrim');
    $plaincut = $request->input('plaincut');
    $edgeseal = $request->input('edgeseal');
    $urunen = $request->input('urunen');
    $urunboy = $request->input('urunboy');
    $fingerliftlength = $request->input('fingerliftlength');
    $sheetwidth = $request->input('sheeten');
    $sheetlength = $request->input('sheetboy');
    $sheetspace = $request->input('sheetspace');
    $hammadde = $request->input('hammadde');
    $hammadde2 = $request->input('hammadde2');
    $path = 'clients/projects/';
    $file = $request->file('file');
    if($file==""){
        $type="0";
        $extension="0";
        $new_name="Dosya Yok";
    }
    else{
        $type = $file->getClientOriginalName();
        $extension = $request->file->getClientOriginalExtension();
        $new_name = Auth::user()->firm_ID.date('Ymd').$type;
        $upload = $file->move(public_path($path), $new_name);
        
    }
    $kisi = Auth::user()->id;
   

    $data=array('teklif_figur'=>$figur,'teklif_singleorcombine'=>$singleorcombine,'teklif_uruntip'=>$uruntip,'teklif_pakettip'=>$pakettip,'teklif_soptarih'=>$soptarih,
    'teklif_eoptarih'=>$eoptarih,'teklif_hacim'=>$hacim,'teklif_firmaID'=>$firmid,'teklif_projead'=>$projead,'teklif_projekod'=>$projekod,'teklif_fingerlift'=>$fingerlift,
    'teklif_linerchange'=>$linerchange,'teklif_sandwich'=>$sandwich,'teklif_hottrim'=>$hottrim,'teklif_plaincut'=>$plaincut,'teklif_edgeseal'=>$edgeseal,'teklif_urunen'=>$urunen,
    'teklif_urunboy'=>$urunboy,'teklif_fingerliftlength'=>$fingerliftlength,'teklif_sheeten'=>$sheetwidth,'teklif_sheetboy'=>$sheetlength,'teklif_sheetspace'=>$sheetspace,
    'teklif_hammaddeID'=>$hammadde,'teklif_hammadde2ID'=>$hammadde2,'teklif_dosya'=>$new_name,'teklif_dosyatur'=>$extension,'teklif_kisi'=>$kisi);
$check = DB::table('teklif')->insert($data);
$check3 = Product::where('urun_Kod', '=', $projekod)->first();
if ($check3 === null) {
    $data2=array('urun_Ad'=>$projead,'urun_Kod'=>$projekod);
    $check2 = DB::table('urun')->insert($data2);
}

header('Content-Type: text/html; charset=utf-8');
                    $postUrl='http://panel.vatansms.com/panel/smsgonder1Npost.php';
                    $MUSTERİNO='29984'; //5 haneli müşteri numarası
                    $KULLANICIADI='05339640512';
                    $SIFRE='Bur9640512';
                    $ORGINATOR="BUR-BANT";

                    $TUR='Normal';  // Normal yada Turkce
                    $ZAMAN='2014-04-07 10:00:00';

                    $mesaj1=Auth::user()->name.' isimli kullanıcı '.\Carbon\Carbon::now().' tarihinde '.$tekliftip.' Teklif kullanarak bir teklif oluşturdu.';
                    $numara1='05339640512';
                 

                    $xmlString='data=<sms>
                    <kno>'. $MUSTERİNO .'</kno>
                    <kulad>'. $KULLANICIADI .'</kulad>
                    <sifre>'.$SIFRE .'</sifre>
                    <gonderen>'.  $ORGINATOR .'</gonderen>
                    <mesaj>'. $mesaj1 .'</mesaj>
                    <numaralar>'. $numara1.'</numaralar>
                    <tur>'. $TUR .'</tur>
                    </sms>';

                    // Xml içinde aşağıdaki alanlarıda gönderebilirsiniz.
                    //<zaman>'. $ZAMAN.'</zaman> İleri tarih için kullanabilirsiniz

                    $Veriler =  $xmlString;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $postUrl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $Veriler);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                    $response = curl_exec($ch);
$kisi=Auth::user()->id;
$teklifs  = DB::select("SELECT firma.firma_Ad,teklif.*,urun.urun_ID,urun.urun_Ad,urun2.urun_ID,urun2.urun_Ad AS S1 FROM (teklif INNER JOIN urun ON teklif.teklif_hammaddeID = urun.urun_ID) 
inner join urun AS urun2 ON teklif.teklif_hammadde2ID = urun2.urun_ID inner join firma on teklif.teklif_firmaID = firma.firma_ID HAVING teklif.teklif_kisi = '$kisi'");
$dosyas = DB::select('SELECT * FROM teklifdosya');
return view('dashboards.clients.teklifler',['teklifs'=>$teklifs,'dosyas'=>$dosyas]);
}
function clientUpdateTeklif(Request $request){


    $teklifID = $request->input('teklifID');
$teklifs = DB::table('teklif')
->select('*')
->where('teklif_ID', $teklifID)
->get();

    $figur = $request->input('figur');
    $singleorcombine = $request->input('singleorcombine');
    $uruntip = $request->input('tip');
    $pakettip = $request->input('pakettip');
    $soptarih = $request->input('soptarih');
    $eoptarih = $request->input('eoptarih');
    $hacim = $request->input('hacim');
    $firmid = $request->input('firma');
    $projead = $request->input('projead');
    $projekod = $request->input('projekod');
    $fingerlift = $request->input('fingerlift');
    $linerchange = $request->input('linerchange');
    $sandwich = $request->input('sandwich');
    $hottrim = $request->input('hottrim');
    $plaincut = $request->input('plaincut');
    $edgeseal = $request->input('edgeseal');
    $urunen = $request->input('urunen');
    $urunboy = $request->input('urunboy');
    $fingerliftlength = $request->input('fingerliftlength');
    $sheetwidth = $request->input('sheeten');
    $sheetlength = $request->input('sheetboy');
    $sheetspace = $request->input('sheetspace');
    $hammadde = $request->input('hammadde');
    $hammadde2 = $request->input('hammadde2');

    $data=array('teklif_figur'=>$figur,'teklif_singleorcombine'=>$singleorcombine,'teklif_uruntip'=>$uruntip,'teklif_pakettip'=>$pakettip,'teklif_soptarih'=>$soptarih,
    'teklif_eoptarih'=>$eoptarih,'teklif_hacim'=>$hacim,'teklif_firmaID'=>$firmid,'teklif_projead'=>$projead,'teklif_projekod'=>$projekod,'teklif_fingerlift'=>$fingerlift,
    'teklif_linerchange'=>$linerchange,'teklif_sandwich'=>$sandwich,'teklif_hottrim'=>$hottrim,'teklif_plaincut'=>$plaincut,'teklif_edgeseal'=>$edgeseal,'teklif_urunen'=>$urunen,
    'teklif_urunboy'=>$urunboy,'teklif_fingerliftlength'=>$fingerliftlength,'teklif_sheeten'=>$sheetwidth,'teklif_sheetboy'=>$sheetlength,'teklif_sheetspace'=>$sheetspace,
    'teklif_hammaddeID'=>$hammadde,'teklif_hammadde2ID'=>$hammadde2);
$check = DB::table('teklif')->where('teklif_ID',$teklifID)->update($data);



$teklifs = DB::select("SELECT firma.firma_Ad,firma.firma_ID,teklif.*,urun.urun_ID,urun.urun_Ad,urun2.urun_ID AS S1_ID,urun2.urun_Ad AS S1 FROM (teklif INNER JOIN urun ON teklif.teklif_hammaddeID = urun.urun_ID) 
inner join urun AS urun2 ON teklif.teklif_hammadde2ID = urun2.urun_ID inner join firma on teklif.teklif_firmaID = firma.firma_ID HAVING teklif.teklif_ID = '$teklifID'");

$firms = DB::select('select * from firma');

$products = DB::select('select * from urun');



if($check){
    return view('dashboards.clients.teklifduzenle',['teklifs'=>$teklifs,'firms'=>$firms,'products'=>$products]);
}
else
{   
 
    return view('dashboards.clients.teklifduzenle',['teklifs'=>$teklifs,'firms'=>$firms,'products'=>$products]);
   
                } }
    function updatePicture(Request $request){
        $path = 'users/images/';
        $file = $request->file('user_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';
    
        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
        }else{
            //Get Old picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];
    
            if( $oldPicture != '' ){
                if( \File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }
    
            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);
    
            if( !$update ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
            }
        }
    }
    function changePassword(Request $request){
        //Validate form
        $validator = \Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if( !\Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
             ],
             'newpassword'=>'required|min:8|max:30',
             'cnewpassword'=>'required|same:newpassword'
         ],[
             'oldpassword.required'=>'Enter your current password',
             'oldpassword.min'=>'Old password must have atleast 8 characters',
             'oldpassword.max'=>'Old password must not be greater than 30 characters',
             'newpassword.required'=>'Enter new password',
             'newpassword.min'=>'New password must have atleast 8 characters',
             'newpassword.max'=>'New password must not be greater than 30 characters',
             'cnewpassword.required'=>'ReEnter your new password',
             'cnewpassword.same'=>'New password and Confirm new password must match'
         ]);
    
        if( !$validator->passes() ){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             
         $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);
    
         if( !$update ){
             return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
         }else{
             return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
         }
        }
    }
    function updateInfo(Request $request){
           
        $validator = \Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
            
        ]);
    
        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
             $query = User::find(Auth::user()->id)->update([
                  'name'=>$request->name,
                  'email'=>$request->email,
                
             ]);
    
             if(!$query){
                 return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
             }else{
                 return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
             }
        }
    }
}
