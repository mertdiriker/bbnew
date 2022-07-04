<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Excel;
use App\Models\User;
use App\Models\Recipe;
use App\Imports\ProductImport;
use App\Imports\MakineImport;
use App\Imports\OngoruImport;
use App\Imports\SiparisImport;
use App\Imports\ProcessImport;
use App\Imports\OperasyonImport;
use App\Models\Product;
use App\Models\Siparis;
use Illuminate\Filesystem\Filesystem;
use View;
use File;



class UserController extends Controller
{   

    
    function ShowProcessToProduct(Request $request){
        $urunkod=$request->input('urunkod');
        $products=DB::select("select * from urun where urun_Kod ='$urunkod'");
        $process = DB::select('select * from process');
        $names = DB::select("select * from process inner join urunprocess on process.process_ID = urunprocess.urunprocess_processID having urunprocess_urunKOD = '$urunkod'");
        return view('dashboards.users.urunprocess',['names'=>$names,'products'=>$products,'process'=>$process]);
    }
    function AddProcessToProduct(Request $request){
      
            $theprocess = $request->input('processID');
            $urunkod = $request->input('urunkod');
       
            $data=array('urunprocess_urunKOD'=>$urunkod,'urunprocess_processID'=>$theprocess);
            $check = DB::table('urunprocess')->insert($data);
            $products = DB::select("select * from urun where urun_KOD ='$urunkod'");
            $process = DB::select('select * from process');
            $names = DB::select("select * from urunprocess inner join process on process.process_ID = urunprocess.urunprocess_processID having urunprocess_urunKOD = '$urunkod'");
           
            if($check){
                return back()->with('success','Process başarıyla urune eklendi!');
            }
            else
            {
                return back()->with('error','Process eklenemedi!');
            }
            
    }

    function ShowOperasyon(Request $request){

        $process = $request->input('processID');
        $operasyons = DB::select("select * from operasyon where operasyon_process = '$process'");
        return view('dashboards.users.operasyon',['operasyons'=>$operasyons,'process'=>$process]);
         
        
    }

    function ShowRisk(Request $request){

        $operasyon = $request->input('operasyonID');
        $risks = DB::select("select * from risk where risk_operasyonID = '$operasyon'");
        return view('dashboards.users.risk',['risks'=>$risks,'operasyon'=>$operasyon]);
         
        
    }
    function ShowControl(Request $request){

        $risk = $request->input('riskID');
        $kontrols = DB::select("select * from kontrol where kontrol_riskID = '$risk'");
        return view('dashboards.users.kontrol',['kontrols'=>$kontrols,'risk'=>$risk]);
         
        
    }
    function AddOperasyon(Request $request){

        $process = $request->input('processID');
        $operasyonad = $request->input('operasyonad');
        $data=array("operasyon_ad"=>$operasyonad,"operasyon_process"=>$process);
        $check = DB::table('operasyon')->insert($data);
      
        return back()->with('success','Operasyon başarıyla eklendi!');
         
        
    }
    function UpdateOperasyon(Request $request){

        $operasyonid = $request->input('operasyonID');
        $operasyonad = $request->input('operasyonad');
        $data=array("operasyon_ad"=>$operasyonad);
        $check = DB::table('operasyon')->where('operasyon_ID',$operasyonid)->update($data);

      
        return back()->with('success','Operasyon başarıyla duzenlendi!');
         
        
    }
    function UpdateRisk(Request $request){

        $riskid = $request->input('riskID');
        $riskad = $request->input('riskad');
        $data=array("risk_ad"=>$riskad);
        $check = DB::table('risk')->where('risk_ID',$riskid)->update($data);

      
        return back()->with('success','Risk başarıyla duzenlendi!');
         
        
    }
    function UpdateControl(Request $request){

        $controlid = $request->input('kontrolID');
        $controlad = $request->input('kontrolad');
        $data=array("kontrol_ad"=>$controlad);
        $check = DB::table('kontrol')->where('kontrol_ID',$controlid)->update($data);

      
        return back()->with('success','Kontrol başarıyla duzenlendi!');
         
        
    }
    function AddRisk(Request $request){

        $operasyon = $request->input('operasyonID');
        $riskad = $request->input('riskad');
        $data=array("risk_ad"=>$riskad,"risk_operasyonID"=>$operasyon);
        $check = DB::table('risk')->insert($data);
      
        return back()->with('success','Risk başarıyla eklendi!');
         
        
    }
    function AddControl(Request $request){

        $risk = $request->input('riskID');
        $kontrolad = $request->input('kontrolad');
        $seribas = $request->input('seribas');
        $serison = $request->input('serison');
        $seri = $request->input('seri');
        $sorumlu = $request->input('sorumlu');
        $arac = $request->input('arac');
        $kayit = $request->input('kayit');
        $olcu = $request->input('olcu');
        $kritik = $request->input('kritik');
        $data=array("kontrol_ad"=>$kontrolad,"kontrol_riskID"=>$risk,"kontrol_seribas"=>$seribas,"kontrol_serison"=>$serison,
        "kontrol_seri"=>$seri,"kontrol_sorumlu"=>$sorumlu,"kontrol_arac"=>$arac,"kontrol_kayit"=>$kayit,"kontrol_data"=>$olcu,"kontrol_kritik"=>$kritik);
        $check = DB::table('kontrol')->insert($data);
      
        return back()->with('success','Kontrol başarıyla eklendi!');
         
        
    }

    function SiparisKapa(Request $request){
        $siparisid = $request->input('siparisid');
        $miktar = $request->input('miktar');
        $durum = "Kapalı";

        $oldsiparis = Siparis::find($siparisid);
        $newsiparis = $oldsiparis->replicate();
        $oldmiktar = $newsiparis->siparis_miktar;
        $newsiparis->siparis_miktar = $oldmiktar - $miktar;
        $newmiktar = $newsiparis->siparis_miktar;
        $newsiparis->siparis_sevktarih = "";
        if($newmiktar > 0)
        {
            $newsiparis->save();
        }

       
       
        $tarih = \Carbon\Carbon::now()->format('Y-m-d');
        $color = "red";
        $data=array("siparis_durum"=>$durum,"siparis_sevktarih"=>$tarih,"siparis_miktar"=>$miktar);
        $check = DB::table('siparis')->where('siparis_ID',$siparisid)->update($data);

        

        return response()->json(['durum'=>$durum,'color'=>$color,'siparisid'=>$siparisid,'tarih'=>$tarih]);
    }
    function SeriBasiOnay(Request $request){
        $isemriid = $request->input('isemriid');
        $tarih = \Carbon\Carbon::now()->format('Y-m-d');
        $durum=TRUE;
        $data=array("isemri_baslandi"=>$durum,"isemri_seribasonaytarih"=>$tarih);
        $check = DB::table('isemri')->where('isemri_ID',$isemriid)->update($data);

        return response()->json(['check'=>$check]);
    }
    function SeriSonuOnay(Request $request){
        $isemriid = $request->input('isemriid');
        $tarih = \Carbon\Carbon::now()->format('Y-m-d');
        $durum=TRUE;
        $data=array("isemri_bitti"=>$durum,"isemri_serisononaytarih"=>$tarih);
        $check = DB::table('isemri')->where('isemri_ID',$isemriid)->update($data);

        return response()->json(['check'=>$check]);
    }

    function siparisler(){
        $firms = DB::select('SELECT * FROM firma');
        $ongorus = DB::select('SELECT * FROM ongoru INNER JOIN urun ON ongoru.ongoru_urunkod = urun.urun_Kod INNER JOIN firma ON ongoru.ongoru_firmaID = firma_ID');
        $sipariss = DB::select('SELECT * FROM siparis INNER JOIN urun ON siparis.siparis_urunkod = urun.urun_Kod INNER JOIN firma ON siparis.siparis_firmaID = firma_ID');
        $date = \Carbon\Carbon::now();
        $thismonth = $date->format('Y-m');
        $lastmonth = $date->subMonth(2)->format('Y-m');
        $last2month = $date->subMonth(1)->format('Y-m');
        $last3month = $date->subMonth(1)->format('Y-m'); 
        $last4month = $date->subMonth(1)->format('Y-m');
        $last5month = $date->subMonth(1)->format('Y-m');
        $last6month = $date->subMonth(1)->format('Y-m');
        
       

        $lastmonthongorusvalue = 0;
        $lastmonthsiparisvalue = 0;
        $last2monthongorusvalue = 0;
        $last2monthsiparisvalue = 0;

        foreach ($ongorus as $ongoru){
            if(($ongoru->ongoru_termintarih)<=$thismonth&&($ongoru->ongoru_termintarih)>=$lastmonth){
                $lastmonthongorusvalue += $ongoru->ongoru_miktar;
            }
        }
        foreach ($sipariss as $siparis){
            if(($siparis->siparis_termintarih)<=$thismonth&&($siparis->siparis_termintarih)>=$lastmonth){
                $lastmonthsiparisvalue += $siparis->siparis_miktar;
            }
        }
        foreach ($ongorus as $ongoru){
            if(($ongoru->ongoru_termintarih)<=$lastmonth&&($ongoru->ongoru_termintarih)>=$last2month){
                $last2monthongorusvalue += $ongoru->ongoru_miktar;
            }
        }
        foreach ($sipariss as $siparis){
            if(($siparis->siparis_termintarih)<=$lastmonth&&($siparis->siparis_termintarih)>=$last2month){
                $last2monthsiparisvalue += $siparis->siparis_miktar;
            }
        }
       
        
        return view('dashboards.users.siparis',['firms'=>$firms,'ongorus'=>$ongorus,'sipariss'=>$sipariss,'lastmonth'=>$lastmonth,'last2month'=>$last2month,'last3month'=>$last3month,
        'lastmonthongorusvalue'=>$lastmonthongorusvalue,'lastmonthsiparisvalue'=>$lastmonthsiparisvalue,'last2monthongorusvalue'=>$last2monthongorusvalue,
        'last2monthsiparisvalue'=>$last2monthsiparisvalue]);
     
    }
    function ShowOngoruOlustur(){
        $products = DB::select('select * from urun');
        $firms = DB::select('select * from firma');
        return view('dashboards.users.ongoruekle',['products'=>$products,'firms'=>$firms]);
         
        
    }
    function ShowSiparisOlustur(){
        $products = DB::select('select * from urun');
        $firms = DB::select('select * from firma');
        return view('dashboards.users.siparisekle',['products'=>$products,'firms'=>$firms]);
    }
    function OngoruOlustur(Request $request){
        
        $urun = $request->input('urun');
        $firma = $request->input('firm');
        $miktar = $request->input('miktar');
        $sevkiyat = $request->input('sevkiyat');
        $tarih = $request->input('tarih');
       

        $data = array("ongoru_urunkod"=>$urun,"ongoru_firmaID"=>$firma,"ongoru_miktar"=>$miktar,"ongoru_sevkiyat"=>$sevkiyat,"ongoru_tarih"=>$tarih);
        $check = DB::table('ongoru')->insert($data);

        if($check){
            return back()->with('success','Ongoru başarıyla firmaya eklendi!');
        }
        else
        {
            return back()->with('error','Ongoru eklenemedi!');
        }
    }
    function SiparisOlustur(Request $request){
        
        $urun = $request->input('urun');
        $firma = $request->input('firm');
        $miktar = $request->input('miktar');
        $siparismiktar = $miktar;
        $sevkiyat = $request->input('sevkiyat');
        $tarih = $request->input('tarih');
        $spno = $request->input('spno');
     
       
       

        $data = array("siparis_urunkod"=>$urun,"siparis_firmaID"=>$firma,"siparis_miktar"=>$siparismiktar,"siparis_sevkiyat"=>$sevkiyat,"siparis_tarih"=>$tarih,"siparis_no"=>$spno);
        $check = DB::table('siparis')->insert($data);
        

        
    

        if($check){
            return back()->with('success','Siparis başarıyla firmaya eklendi!');
        }
        else
        {
            return back()->with('error','Siparis eklenemedi!');
        }
    }
    function SiparisPlanla(Request $request){
        $siparisid = $request->input('siparisid');
        $siparisinfos = DB::select("select * from siparis where siparis_ID = '$siparisid'");
        foreach($siparisinfos as $siparisinfo)
        {
            $urun = $siparisinfo->siparis_urunkod;
            $firma = $siparisinfo->siparis_firmaID;
            $miktar = $siparisinfo->siparis_miktar;
            
            $sevkiyat = $siparisinfo->siparis_sevkiyat;
            $tarih = $siparisinfo->siparis_tarih;
            $spno = $siparisinfo->siparis_no;
            
        }
        $siparismiktar = $miktar;
        $stokid = DB::select("select * from urun where urun_Kod = '$urun'");

        $exitisemris = array();
        $exitstokmiktars = array();
        $exiturunkods = array();

        foreach($stokid as $stoki){
            $stokid2 = $stoki->urun_ID;
        }


        
        $recetes = 1;
        $stoklar = DB::select("select * from urunhareket where urunhareket_urunID = $stokid2 ORDER BY urunhareket_urttarih ASC");
        $stokta = 0;
        foreach ($stoklar as $stokx){
            if($stokx->urunhareket_girdi==1&&$stokx->urunhareket_durum==""){
            $stokta += $stokx->urunhareket_kalanmiktar;
            $durumsiparis = "Sipariste";
            $aciklamasiparis = $spno;
            $idid = $stokx->urunhareket_ID;
            $data5= array("urunhareket_durum"=>$durumsiparis,"urunhareket_aciklama"=>$aciklamasiparis);
   
            }
        }
        $stokmiktar=$stokta-$miktar;
        $stokmiktar=abs($stokmiktar);
        foreach ($stoklar as $stokla)
          {
          $lotno = $stokla->urunhareket_lotno;
          $urttarih = $stokla->urunhareket_urttarih;
          $irsno = $stokla->urunhareket_irsno;
          $depo = $stokla->urunhareket_depokonumu;
          $kisi = "";
          $aciklama = $spno;
          $durum = "Ver";
          break;
          }
          $data3 = array("urunhareket_urunID"=>$stokid2,"urunhareket_kalanmiktar"=>$miktar,"urunhareket_cikanmiktar"=>$miktar,"urunhareket_lotno"=>$lotno,"urunhareket_urttarih"=>$urttarih,
          "urunhareket_irsno"=>$irsno,"urunhareket_depokonumu"=>$depo,"urunhareket_kisi"=>$kisi,"urunhareket_aciklama"=>$aciklama,"urunhareket_durum"=>$durum);
        
        if($stokta>=$miktar){
            $data = array("siparis_urunkod"=>$urun,"siparis_firmaID"=>$firma,"siparis_miktar"=>$siparismiktar,"siparis_sevkiyat"=>$sevkiyat,"siparis_tarih"=>$tarih,"siparis_no"=>$spno);
          
            $exitmiktar = $miktar;
            $exitlot = $lotno;
            return response()->json(['exitlot'=>$exitlot,'exitmiktar'=>$exitmiktar]);

        }
        else{
        while($recetes){

            
        $recetes = DB::select("select * from recete where recete_Urun1ID = '$stokid2'");
        foreach($recetes as $recete){
            $stokid3 = $recete->recete_Urun2ID;
            $stokmiktar = $recete->recete_Oran * $stokmiktar;
            $stoklar = DB::select("select * from urunhareket where urunhareket_urunID = $stokid3 ORDER BY urunhareket_urttarih ASC");
        
            $rstokmiktar= 0;
            foreach ($stoklar as $stokla){
                if($stokla->urunhareket_girdi==1&&$stokla->urunhareket_durum==""){
                $rstokmiktar += $stokla->urunhareket_kalanmiktar;
                $durumsiparis = "Sipariste";
                $aciklamasiparis = $spno;
                $idid = $stokla->urunhareket_ID;
                $data5= array("urunhareket_durum"=>$durumsiparis,"urunhareket_aciklama"=>$aciklamasiparis);
              
                
                }
            }
            $durum = "Ver";
            if($stokmiktar>$rstokmiktar&&$rstokmiktar>0){
                $stokmiktar2 = $stokmiktar - $rstokmiktar;
        
           
        
            
            
         

        $processurunids = DB::select("select * from urun where urun_ID = '$stokid2'");
        foreach ($processurunids as $processurunid){
            $processurunkod = $processurunid->urun_Kod;
        }
        $process = DB::select("select * from urunprocess where urunprocess_urunKOD = '$processurunkod'");
        foreach ($process as $proces){
            $proces1=$proces->urunprocess_processID;
            $data2 = array("isemri_process"=>$proces1,"isemri_girenurunKOD"=>$processurunkod,"isemri_siparisno"=>$spno,"isemri_miktar"=>$stokmiktar2 );
            

            array_push($exitisemris,$proces1);
            
            array_push($exitstokmiktars,$stokmiktar2);
          
            array_push($exiturunkods,$processurunkod);
         
            $stokmiktar=$stokmiktar2;
            }
            }
            if($rstokmiktar<=0){  

                
                $processurunids = DB::select("select * from urun where urun_ID = '$stokid2'");
        foreach ($processurunids as $processurunid){
            $processurunkod = $processurunid->urun_Kod;
        }
        $process = DB::select("select * from urunprocess where urunprocess_urunKOD = '$processurunkod'");
        foreach ($process as $proces){
            $proces1=$proces->urunprocess_processID;
            $data2 = array("isemri_process"=>$proces1,"isemri_girenurunKOD"=>$processurunkod,"isemri_siparisno"=>$spno,"isemri_miktar"=>$stokmiktar );

    
           
            array_push($exitisemris,$proces1);
            
            array_push($exitstokmiktars,$stokmiktar);
          
            array_push($exiturunkods,$processurunkod);
            
            



            }
                
                
               

            }
         
        
        $stokid2=$stokid3;
       
        }
    }
}



        return response()->json(['exitisemris'=>$exitisemris,'exitstokmiktars'=>$exitstokmiktars,'exiturunkods'=>$exiturunkods]);
    }
    function SiparisPlanla2(Request $request){
        $siparisid = $request->input('siparisid');
        $siparisinfos = DB::select("select * from siparis where siparis_ID = '$siparisid'");
       
            
       
        $lotmiktararray = array();
   

        foreach($siparisinfos as $siparisinfo)
        {
            $urun = $siparisinfo->siparis_urunkod;
            $firma = $siparisinfo->siparis_firmaID;
            $miktar = $siparisinfo->siparis_miktar;
            
            $sevkiyat = $siparisinfo->siparis_sevkiyat;
            $tarih = $siparisinfo->siparis_tarih;
            $spno = $siparisinfo->siparis_no;
            
        }
        $uruninfos = DB::select("select * from urun where urun_Kod = '$urun'");
        foreach ($uruninfos as $uruninfo)
        {
         $urunid=$uruninfo->urun_ID;
        }
        $stoktaurunids = DB::select("select * from urunhareket where urunhareket_urunID = '$urunid' ORDER BY urunhareket_urttarih ASC");
        $toplamurunidmiktar = 0;
        foreach ($stoktaurunids as $stoktaurunid)
        {
            if($stokla->urunhareket_girdi==1&&$stokla->urunhareket_durum==""&&$stokla->urunhareket_kalanmiktar!=0){
            $toplamurunidmiktar += $stoktaurunid->urunhareket_kalanmiktar;
        }}
        if($toplamurunidmiktar>=$miktar){
            foreach ($stoktaurunids as $stoktaurunid) {
                if($stokla->urunhareket_girdi==1&&$stokla->urunhareket_durum==""&&$stokla->urunhareket_kalanmiktar!=0&&$miktar>0){
                   
                    
                    $miktar = $miktar - $stoktaurunid->urunhareket_kalanmiktar;
                    $stoktadata = array("urunhareket_aciklama"=>$spno,"urunhareket_kalanmiktar"=>$miktar,"urunhareket_durum"=>'Sipariste');
                    
                    $lotmiktararrayx = array("Lotno"=>$stoktaurunid->urunhareket_lotno,"Miktar"=>$miktar);
                    array_push($lotmiktararray,$lotmiktararrayx);
                    
                }

            }
        }
        else
        {
            foreach ($stoktaurunids as $stoktaurunid) {
                if($stokla->urunhareket_girdi==1&&$stokla->urunhareket_durum==""&&$stokla->urunhareket_kalanmiktar!=0&&$toplamurunidmiktar>0){
                    
                    
                    $miktar = $miktar - $stoktaurunid->urunhareket_kalanmiktar;
                  
                    $toplamurunidmiktar = $toplamurunidmiktar - $stoktaurunid->urunhareket_kalanmiktar;
                    $stoktadata = array("urunhareket_aciklama"=>$spno,"urunhareket_kalanmiktar"=>$miktar,"urunhareket_durum"=>'Sipariste');
                    
                    $lotmiktararray = array("Lot no :"=>$stoktaurunid->urunhareket_lotno,"Miktar:"=>$miktar);
                    
                    
                }
            }
            $recetes=1;
            
            while($recetes)
            {
                if($miktar>0)
                {
                    $recetes = DB::select("select * from recete where recete_Urun1ID = '$urunid' ");
                    foreach ($recetes as $recete)
                    {   
                        $receteurunreceteid = $recete->recete_ID;
                        $receteurunlers = DB::select("select * from receteurun where receteurun_receteID = '$receteurunreceteid'");
                        foreach ($receteurunlers as $receteurunler)
                        {
                            $receteurunurunid = $receteurunler->receteurun_ID;
                            $receteurunmiktar = $miktar*$receteurunler->receteurun_oran;

                            $stoktarecetes = DB::select("select * from urunhareket where urunhareket_urunID = '$receteurunurunid' ORDER BY urunhareket_urttarih ASC");
                            foreach($stoktarecetes as $stoktarecete)
                            {
                                if($stoktarecete->urunhareket_girdi==1&&$stoktarecete->urunhareket_durum==""&&$stoktarecete->urunhareket_kalanmiktar!=0)
                                {
                            
                                    $stoktarecetemiktar += $stoktarecete->urunhareket_kalanmiktar;
                                
                                    
                                }
                            }
                            if($stoktarecetemiktar>=$receteurunmiktar)
                            {
                                foreach($stoktarecetes as $stoktarecete)
                                {
                                    if($stoktarecete->urunhareket_girdi==1&&$stoktarecete->urunhareket_durum==""&&$stoktarecete->urunhareket_kalanmiktar!=0&&$receteurunmiktar>0)
                                    {
                                       
                                        $receteurunmiktar = $receteurunmiktar - $stoktarecete->urunhareket_kalanmiktar;
                                        $receteurunmiktarmutlak=abs($receteurunmiktar);

                                
                                        $stoktadata = array("urunhareket_aciklama"=>$spno,"urunhareket_kalanmiktar"=>$receteurunmiktarmutlak,"urunhareket_durum"=>'Sipariste');
                                        
                                        $lotmiktararrayx = array("Lotno"=>$stoktarecete->urunhareket_lotno,"Miktar"=>$receteurunmiktarmutlak);
                                        array_push($lotmiktararray,$lotmiktararrayx);
                                        
                                    }
                                }
                            }
                            else
                            {
                                foreach($stoktarecetes as $stoktarecete)
                                {
                                    if($stoktarecete->urunhareket_girdi==1&&$stoktarecete->urunhareket_durum==""&&$stoktarecete->urunhareket_kalanmiktar!=0)
                                    {
                                        while($stoktarecetemiktar>0)
                                        {
                                        $stoktarecetemiktar = $stoktarecetemiktar - $stoktarecete->urunhareket_kalanmiktar;
                                        $stoktadata = array("urunhareket_aciklama"=>$spno,"urunhareket_kalanmiktar"=>$miktar,"urunhareket_durum"=>'Sipariste');
                                        
                                        $lotmiktararrayx = array("Lotno"=>$stoktarecete->urunhareket_lotno,"Miktar"=>$miktar);
                                        array_push($lotmiktararray,$lotmiktararrayx);
                                        }
                                    }
                                }
                            }
                            
                        
                        }
                        
                    }
                }
            }
        }


    }
    function SiparisPlanla3(Request $request)
    {
        $siparisid = $request->input('siparisid');
        $siparisinfos = DB::select("select * from siparis where siparis_ID = '$siparisid'");
        $lotmiktararray = array();
        $isemrimiktararray = array();
        $processarray = array();
        $toplamurunidmiktar = 0;
        $stoktarecetemiktar = 0;
        $urunid=$request->input('urunid');
        $miktar = $request->input('miktar');
        $receteprocess = 0;
   
        foreach($siparisinfos as $siparisinfo)
        {
          
            $firma = $siparisinfo->siparis_firmaID;
        
            
            $sevkiyat = $siparisinfo->siparis_sevkiyat;
            $tarih = $siparisinfo->siparis_tarih;
            $spno = $siparisinfo->siparis_no;
            
        }
        $stoktaurunids = DB::select("select * from urunhareket where urunhareket_urunID = '$urunid' ORDER BY urunhareket_urttarih ASC");
        foreach ($stoktaurunids as $stoktaurunid)
        {
            if($stoktaurunid->urunhareket_girdi==1&&$stoktaurunid->urunhareket_durum==""&&$stoktaurunid->urunhareket_kalanmiktar!=0){
            $toplamurunidmiktar += $stoktaurunid->urunhareket_kalanmiktar;
        }}
        if($toplamurunidmiktar>=$miktar){
            foreach ($stoktaurunids as $stoktaurunid) {
                if($stoktaurunid->urunhareket_girdi==1&&$stoktaurunid->urunhareket_durum==""&&$stoktaurunid->urunhareket_kalanmiktar!=0&&$miktar>0){
                   
                    
                    if($miktar>=$stoktaurunid->urunhareket_kalanmiktar)
                    {
                        $miktar = $miktar - $stoktaurunid->urunhareket_kalanmiktar;
                        $lotmiktar = $stoktaurunid->urunhareket_kalanmiktar;
                    }
                    else
                    {
                        $kalanmiktar = $stoktaurunid->urunhareket_kalanmiktar - $miktar;
                        $lotmiktar = $miktar;
                        $miktar= 0;
                    }

                  
                    $stoktadata = array("urunhareket_aciklama"=>$spno,"urunhareket_kalanmiktar"=>$kalanmiktar,"urunhareket_durum"=>'Sipariste');
                    
                    $receteurunurunads = DB::select("select * from urun where urun_ID = '$urunid'");
                    foreach ($receteurunurunads as $receteurunurunad)
                                        {
                                            $urunadstok = $receteurunurunad->urun_Ad;
                                        }
                                        
                    $lotmiktararrayx = array("urunad"=>$urunadstok,"Lotno"=>$stoktaurunid->urunhareket_lotno,"Miktar"=>$lotmiktar,"urunid"=>$urunid,"siparisid"=>$siparisid);
                    array_push($lotmiktararray,$lotmiktararrayx);
                    
                }

            }
        }
        else
        {
            foreach ($stoktaurunids as $stoktaurunid) {
                if($stoktaurunid->urunhareket_girdi==1&&$stoktaurunid->urunhareket_durum==""&&$stoktaurunid->urunhareket_kalanmiktar!=0&&$toplamurunidmiktar>0){
                    
                    
                    $miktar = $miktar - $stoktaurunid->urunhareket_kalanmiktar;
                  
                    $toplamurunidmiktar = $toplamurunidmiktar - $stoktaurunid->urunhareket_kalanmiktar;
                    $stoktadata = array("urunhareket_aciklama"=>$spno,"urunhareket_kalanmiktar"=>$miktar,"urunhareket_durum"=>'Sipariste');
                    $receteurunurunads = DB::select("select * from urun where urun_ID = '$urunid'");
                    foreach ($receteurunurunads as $receteurunurunad)
                                        {
                                            $urunadstok = $receteurunurunad->urun_Ad;
                                        }
                                        
                    $lotmiktararrayx = array("urunad"=>$urunadstok,"Lotno"=>$stoktaurunid->urunhareket_lotno,"Miktar"=>$stoktaurunid->urunhareket_kalanmiktar,"urunid"=>$urunid,"siparisid"=>$siparisid);
                    array_push($lotmiktararray,$lotmiktararrayx);
                    
                    
                }
            }
         
            
           
            
                if($miktar>0)
                {
                    $recetes = DB::select("select * from recete where recete_Urun1ID = '$urunid' ");
                    foreach ($recetes as $recete)
                    {   
                        $receteurunreceteid = $recete->recete_ID;
                        $receteprocess = $recete->recete_process;
                        $receteurunlers = DB::select("select * from receteurun where receteurun_receteID = '$receteurunreceteid'");
                        foreach ($receteurunlers as $receteurunler)
                        {   
                            $stoktarecetemiktar = 0;
                            $receteurunurunid = $receteurunler->receteurun_urunID;
                            $receteurunmiktar = $miktar*$receteurunler->receteurun_oran;

                            $stoktarecetes = DB::select("select * from urunhareket where urunhareket_urunID = '$receteurunurunid' ORDER BY urunhareket_urttarih ASC");
                            foreach($stoktarecetes as $stoktarecete)
                            {
                                if($stoktarecete->urunhareket_girdi==1&&$stoktarecete->urunhareket_durum==""&&$stoktarecete->urunhareket_kalanmiktar!=0)
                                {
                            
                                    $stoktarecetemiktar += $stoktarecete->urunhareket_kalanmiktar;
                                
                                    
                                }
                            }
                            if($stoktarecetemiktar>=$receteurunmiktar)
                            {
                                foreach($stoktarecetes as $stoktarecete)
                                {
                                    if($stoktarecete->urunhareket_girdi==1&&$stoktarecete->urunhareket_durum==""&&$stoktarecete->urunhareket_kalanmiktar!=0&&$receteurunmiktar>0)
                                    {
                                        if($stoktarecete->urunhareket_kalanmiktar>=$receteurunmiktar)
                                        {
                                        $kalanmiktar = $stoktarecete->urunhareket_kalanmiktar - $receteurunmiktar;
                                        $lotmiktar = $receteurunmiktar;
                                        $receteurunmiktar = 0 ;
                                       
                                        }
                                        else
                                        {
                                            $receteurunmiktar = $receteurunmiktar - $stoktarecete->urunhareket_kalanmiktar;
                                            $kalanmiktar = 0;
                                            $lotmiktar = $stoktarecete->urunhareket_kalanmiktar;
                                        }
                                
                                        $stoktadata = array("urunhareket_aciklama"=>$spno,"urunhareket_kalanmiktar"=>$kalanmiktar,"urunhareket_durum"=>'Sipariste');
                                        $receteurunurunads = DB::select("select * from urun where urun_ID = '$receteurunurunid'");
                                        foreach ($receteurunurunads as $receteurunurunad)
                                        {
                                            $urunadstok = $receteurunurunad->urun_Ad;
                                        }
                                        
                                        $lotmiktararrayx = array("urunad"=>$urunadstok,"Lotno"=>$stoktarecete->urunhareket_lotno,"Miktar"=>$lotmiktar,"urunid"=>$receteurunurunid,"siparisid"=>$siparisid);
                                        array_push($lotmiktararray,$lotmiktararrayx);
                                        
                                    }
                                }
                            }
                            else
                            {
                                foreach($stoktarecetes as $stoktarecete)
                                {
                                    if($stoktarecete->urunhareket_girdi==1&&$stoktarecete->urunhareket_durum==""&&$stoktarecete->urunhareket_kalanmiktar!=0&&$stoktarecetemiktar>0)
                                    {   
                                        if($receteurunmiktar>=$stoktarecete->urunhareket_miktar)
                                        {
                                            $receteurunmiktar = $receteurunmiktar - $stoktarecete->urunhareket_kalanmiktar;
                                            $lotmiktar = $stoktarecete->urunhareket_kalanmiktar;
                                            $kalanmiktar=0;
                                        }
                                        else
                                        {
                                            $lotmiktar = $receteurunmiktar;
                                          
                                            $kalanmiktar = $stoktarecete->urunhareket_kalanmiktar - $receteurunmiktar;
                                            $receteurunmiktar = 0;
                                        }
                                       
                                        
                                 
                                        $stoktadata = array("urunhareket_aciklama"=>$spno,"urunhareket_kalanmiktar"=>$kalanmiktar,"urunhareket_durum"=>'Sipariste');
                                        $receteurunurunads = DB::select("select * from urun where urun_ID = '$receteurunurunid'");
                                        foreach ($receteurunurunads as $receteurunurunad)
                                        {
                                            $urunadstok = $receteurunurunad->urun_Ad;
                                        }
                                        
                                        $lotmiktararrayx = array("urunad"=>$urunadstok,"Lotno"=>$stoktarecete->urunhareket_lotno,"Miktar"=>$lotmiktar,"urunid"=>$receteurunurunid,"siparisid"=>$siparisid);
                                        array_push($lotmiktararray,$lotmiktararrayx);
                                        
                                    }
                                }
                          
                                $isemriurunad = DB::select("select * from urun where urun_ID = '$receteurunurunid'");
                                foreach ($isemriurunad as $isemriurunad1)
                                {
                                    $isemriurunadi = $isemriurunad1->urun_Ad;
                                    $isemriurunid = $isemriurunad1->urun_ID;
                                    $isemrimiktararrayx = array("urunid"=>$isemriurunid,"urunad"=>$isemriurunadi,"miktar"=>$receteurunmiktar,"siparisid"=>$siparisid);
                                    array_push($isemrimiktararray,$isemrimiktararrayx);
                                }
                          
                                
                               
                                
                               
                            }

                            
                        
                        }
                        
                    }
                }
                if($receteprocess!=0)
                {

               
                $processads = DB::select("select * from process where process_ID = '$receteprocess'");
                foreach ($processads as $processad1)
                {
                    $processad = $processad1->process_ad;
                   
                }
                $processarrayx=array("processad"=>$processad);
                array_push($processarray,$processarrayx);

            }
        }
 
        return response()->json(['lotmiktararray'=>$lotmiktararray,'isemrimiktararray'=>$isemrimiktararray,'processarray'=>$processarray]);
    }
    function AltSiparisOlustur(Request $request)
    {
        $siparisid = $request->input('siparisid');
        $urunid = $request->input('urunid');
        $miktar = $request->input('miktar');

        $siparisinfos = DB::select("select * from siparis where siparis_ID = '$siparisid'");
        $uruninfos = DB::select("select * from urun where urun_ID = '$urunid'");
        foreach ($uruninfos as $uruninfo)
        {
            $urunkod = $uruninfo->urun_Kod;
        }

        foreach ($siparisinfos as $siparisinfo)
        {   
            $firma= $siparisinfo->siparis_firmaID;
            $spno = $siparisinfo->siparis_no;
            $durum = "AltSiparis";
            $sevktarih = $siparisinfo->siparis_sevktarih;
            $tarih = $siparisinfo->siparis_tarih;
            $termin = $siparisinfo->siparis_termintarih;
            $sevkiyat = $siparisinfo->siparis_sevkiyat;
            $ongoruID = $siparisinfo->siparis_ongoruID;

        }
        $data = array("siparis_firmaID"=>$firma,"siparis_no"=>$spno,"siparis_urunkod"=>$urunkod,"siparis_miktar"=>$miktar,"siparis_sevkiyat"=>$sevkiyat
        ,"siparis_termintarih"=>$termin,"siparis_tarih"=>$tarih,"siparis_sevktarih"=>$sevktarih,"siparis_ongoruID"=>$ongoruID,"siparis_durum"=>$durum);
        $check = DB::table('siparis')->insert($data);
        return response()->json(['check'=>$check]);
    }
    function SiparisStokEmri(Request $request)
    {
        $urunid = $request->input('urunid');
        $siparisid = $request->input('siparisid');
        $lotno = $request->input('lotno');
        $miktar = $request->input('lotmiktar');
        $durum = 'Ver';

        $siparisinfos = DB::select("select * from siparis where siparis_ID = '$siparisid'");
        foreach($siparisinfos as $siparisinfo)
        {
            $spno = $siparisinfo->siparis_no;
        }
        $data = array("urunhareket_urunID"=>$urunid,"urunhareket_miktar"=>$miktar,"urunhareket_kalanmiktar"=>$miktar,"urunhareket_lotno"=>$lotno,
        "urunhareket_durum"=>$durum,"urunhareket_aciklama"=>$spno);

        $check = DB::table('urunhareket')->insert($data);
        return response()->json(['check'=>$check]);
    }
    function SiparisPlanTarih(Request $request)
    {
        $siparisid = $request->input('siparisid');
        $tarih = $request->input('tarih');
        $data = array("siparis_plantarih"=>$tarih);
        $check = DB::table('siparis')->where('siparis_ID',$siparisid)->update($data);
        return response()->json(['check'=>$check]);
    }
    function DeleteRecete(Request $request)
    {
        $receteid = $request->input("receteid");
        DB::delete('delete from recete where recete_ID = :receteid' ,['receteid' => $receteid]);
        return response()->json();

        
    }
    function ShowReceteUrun(Request $request){
        $receteurunID = $request->input('receteurun');
        $receteuruns = DB::select("select * from receteurun inner join urun on receteurun.receteurun_urunID = urun.urun_ID HAVING receteurun_receteID = '$receteurunID'");
        
        return response()->json(['receteuruns'=>$receteuruns]);
    }
    function AddReceteUrun(Request $request){
        $receteurunid = $request->input('receteurunid');
        $urunid = $request->input('urunid');
        $oran = $request->input('oran');
        $oranfire = $request->input('fire');
        $data = array("receteurun_receteID"=>$receteurunid,"receteurun_urunID"=>$urunid,"receteurun_oran"=>$oran,"receteurun_oranfire"=>$oranfire);
        $check = DB::table('receteurun')->insert($data);
        return response()->json(['check'=>$check]);

    }
    function OngoruToSiparis(Request $request){
        $ongoruID = $request->input('ongoruID');
        $spno = $request->input('spno');
        $miktar = $request->input('miktar');
        $sevktarih = $request->input('sevktarih');
        $sevksekli = $request->input('sevksekli');
        $uruninfos = DB::select("select * from ongoru where ongoru_ID = '$ongoruID'");
        foreach ($uruninfos as $uruninfo){
            $urunkod = $uruninfo->ongoru_urunkod;
            $firmaID = $uruninfo->ongoru_firmaID;
            $ongorumiktar = $uruninfo->ongoru_miktar;
            $ongorutarih = $uruninfo->ongoru_tarih;
        }
       
       

        $data = array("siparis_no"=>$spno,"siparis_urunkod"=>$urunkod,"siparis_firmaID"=>$firmaID,"siparis_miktar"=>$miktar,"siparis_sevkiyat"=>$sevksekli,"siparis_tarih"=>$sevktarih,
        "siparis_ongoruID"=>$ongoruID);
        $check = DB::table('siparis')->insert($data);

        if($check){
            if($miktar>$ongorumiktar){
                return back()->with('error','Sipariş oluşturuldu.Sipariş Miktarı Öngörü de belirtilenden fazla!!');
            }
            else{
                return back()->with('success','Ongoru başarıyla firmaya eklendi!');
            }
        }
        else
        {
            return back()->with('error','Ongoru eklenemedi!');
        }
    }


    function DilimSave(Request $request){
        $dilim = $request->input('dilimname');
        $dilimmiktar = $request->input('dilimmiktar');
        $hammadde1Ad = $request->input('hammadde1Ad');
        $hammadde1m2 = $request->input('hammadde1m2');
        $process = $request->input('process');
        $makine = $request->input('makine');
        $urunen = $request->input('urunen');
        $fingerliftlength = $request->input('fingerliftlength');
        $urunkod = $request->input('projekod');
        $operasyonID = DB::select("select urun_ID from urun where urun_Kod = '$urunkod'");
        foreach ($operasyonID as $operasyonI){
            $operasyon = $operasyonI->urun_ID;
            }
        $hammadde1Kod = DB::select("select urun_Kod,urun_ID from urun where urun_Ad = '$hammadde1Ad'");
        foreach ($hammadde1Kod as $hammadde1Ko){
        $dilimkod = $hammadde1Ko->urun_Kod.$urunen+$fingerliftlength."D";
        $hammaddeID = $hammadde1Ko->urun_ID;
        }
        $product = Product::where('urun_Kod', '=', $dilimkod)->first();
        if ($product === null) {
            $data=array("urun_Kod"=>$dilimkod,"urun_Ad"=>$dilim);
            $check = DB::table('urun')->insert($data);
            $receteoran = $hammadde1m2 / $dilimmiktar;
            $urunID = DB::select("select urun_ID from urun where urun_Kod = '$dilimkod'");
            foreach ($urunID as $urunI){
                $urun2ID=$urunI->urun_ID;
            }
            $data2=array("recete_Urun1ID"=>$urun2ID,"recete_Urun2ID"=>$hammaddeID,"recete_Oran"=>$receteoran,"recete_operasyonID"=>$operasyon,"recete_process"=>$process,"recete_makine"=>$makine);
            $check2 = DB::table('recete')->insert($data2);
            $check ="Urun tanımlandı";
        }
        else{
            $urunID = DB::select("select urun_ID from urun where urun_Kod = '$dilimkod'");
            foreach ($urunID as $urunI){
                $urun2ID=$urunI->urun_ID;
            }
            $check="Urun zaten tanımlı";
        }
        
        return response()->json(['check'=>$check,'urunID'=>$urun2ID]);
    }
    function FingerliftSave(Request $request){

        
        $fingerlift = $request->input('fingerliftname');
        $fingerliftmiktar = $request->input('fingerliftmiktar');
        $hammadde1Ad = $request->input('hammadde1Ad');
        $hammadde1m2 = $request->input('hammadde1m2');
        $ebatsiraid = $request->input('ebatsiraid');
        $urunen = $request->input('urunen');
        $fingerliftlength = $request->input('fingerliftlength');
        $urunkod = $request->input('projekod');
        $operasyonID = DB::select("select urun_ID from urun where urun_Kod = '$urunkod'");
        $process = $request->input('process');
        $makine = $request->input('makine');
        foreach ($operasyonID as $operasyonI){
            $operasyon = $operasyonI->urun_ID;
            }
        $hammadde1Kod = DB::select("select urun_Kod,urun_ID from urun where urun_Ad = '$hammadde1Ad'");
        foreach ($hammadde1Kod as $hammadde1Ko){
        $fingerliftkod = $hammadde1Ko->urun_Kod.$urunen."+".$fingerliftlength."F";
        $hammaddeID = $hammadde1Ko->urun_ID;
        }
        $product = Product::where('urun_Kod', '=', $fingerliftkod)->first();
        if ($product === null) {
            $data=array("urun_Kod"=>$fingerliftkod,"urun_Ad"=>$fingerlift);
            $check = DB::table('urun')->insert($data);
            $receteoran = "1" ;
            $urunID = DB::select("select urun_ID from urun where urun_Kod = '$fingerliftkod'");
            foreach ($urunID as $urunI){
                $urun2ID=$urunI->urun_ID;
            }
           
            $data2=array("recete_Urun1ID"=>$urun2ID,"recete_Urun2ID"=>$ebatsiraid,"recete_Oran"=>$receteoran,"recete_operasyonID"=>$operasyon,"recete_process"=>$process,"recete_makine"=>$makine);
            $check2 = DB::table('recete')->insert($data2);
            
            $check ="Urun tanımlandı";
        }
        else{
            $urunID = DB::select("select urun_ID from urun where urun_Kod = '$fingerliftkod'");
            foreach ($urunID as $urunI){
                $urun2ID=$urunI->urun_ID;
            }
            $check="Urun zaten tanımlı";
        }
        
        return response()->json(['check'=>$check,'urunID'=>$urun2ID]);
    }
    function SiraliKesimSave(Request $request){
       
        $siralikesim = $request->input('siralikesimname');
        $siralikesimmiktar = $request->input('siralikesimmiktar');
        $hammadde1Ad = $request->input('hammadde1Ad');
        $hammadde1m2 = $request->input('hammadde1m2');
        $ebatsiraid = $request->input('ebatsiraid');
        $cikandilim = $request->input('cikanadet');
        $urunen = $request->input('urunen');
        $urunboy = $request->input('urunboy');
        $urunkod = $request->input('projekod');
        $process = $request->input('process');
        $makine = $request->input('makine');
        $operasyonID = DB::select("select urun_ID from urun where urun_Kod = '$urunkod'");
        foreach ($operasyonID as $operasyonI){
            $operasyon = $operasyonI->urun_ID;
            }
        $hammadde1Kod = DB::select("select urun_Kod,urun_ID from urun where urun_Ad = '$hammadde1Ad'");
        foreach ($hammadde1Kod as $hammadde1Ko){
        $siralikesimkod = $hammadde1Ko->urun_Kod.$urunen."x".$urunboy."SK";
        $hammaddeID = $hammadde1Ko->urun_ID;
        }
        $product = Product::where('urun_Kod', '=', $siralikesimkod)->first();
        if ($product === null) {
            $data=array("urun_Kod"=>$siralikesimkod,"urun_Ad"=>$siralikesim);
            $check = DB::table('urun')->insert($data);
            $receteoran =  ($hammadde1m2 / $siralikesimmiktar) / $cikandilim;
            $urunID = DB::select("select urun_ID from urun where urun_Kod = '$siralikesimkod'");
            foreach ($urunID as $urunI){
                $urun2ID=$urunI->urun_ID;
            }
            $data2=array("recete_Urun1ID"=>$urun2ID,"recete_Urun2ID"=>$ebatsiraid,"recete_Oran"=>$receteoran,"recete_operasyonID"=>$operasyon,"recete_process"=>$process,"recete_makine"=>$makine);
            $check2 = DB::table('recete')->insert($data2);
            $check ="Urun tanımlandı";
        }
        else{
            $urunID = DB::select("select urun_ID from urun where urun_Kod = '$siralikesimkod'");
            foreach ($urunID as $urunI){
                $urun2ID=$urunI->urun_ID;
            }
            $check="Urun zaten tanımlı";
        }
        
        return response()->json(['check'=>$check,'urunID'=>$urun2ID]);
    }


    function importmachine() 
    {
        Excel::import(new MakineImport,request()->file('file'));
               
        return back();
    }
    function importprocess() 
    {
        Excel::import(new ProcessImport,request()->file('file'));
               
        return back();
    }
    function importongoru() 
    {

        $firm= request()->input('firmID');
       
        Excel::import(new OngoruImport($firm),request()->file('file'));
               
        return back();
    }
    function importoperasyon() 
    {

        $process= request()->input('processID');
       
        Excel::import(new OperasyonImport($process),request()->file('file'));
               
        return back();
    }
    function importsiparis() 
    {   
        $firm= request()->input('firmID');
        $sevk= request()->input('sevk');
        Excel::import(new SiparisImport($firm,$sevk),request()->file('file'));
               
        return back();
    }
    function ShowAddProcess(){
        return view('dashboards.users.processekle');
    }
    

    function addRecipe(Request $request)
    {   
        $recipe_product1 = $request->input('urun1');
        
        $process = $request->input('process');
        $makine = $request->input('makine');
        $setupadam = $request->input('setupadam');
        $setupsure = $request->input('setupsure');
        $processadam = $request->input('processadam');
        $processsure = $request->input('processsure');
        $maliyet = $request->input('maliyet');
        $data=array('recete_maliyet'=>$maliyet,'recete_Urun1ID'=>$recipe_product1,"recete_makine"=>$makine,"recete_process"=>$process,"recete_setupadam"=>$setupadam,"recete_setupsure"=>$setupsure,"recete_processadam"=>$processadam,
    "recete_processsure"=>$processsure);
        $check = DB::table('recete')->insert($data);
        $products = DB::select('select * from urun');
        $recipeproducts = Recipe::select("*")
                        ->where("recete_Urun1ID", $recipe_product1)
                        ->get();
                        $names = DB::table('urun')
                        ->select('*')
                        ->join('recete', 'recete.recete_Urun2ID', '=', 'urun.urun_ID')
                        ->where('recete_Urun1ID', $recipe_product1)
                        ->get();
                        return back()->with('success','Reçeteye eklendi');
        
}
    function showRecipe(Request $request)
    {   
        $recipeproduct1 = $request->input('urun1ID');
         $names = DB::table('urun')
        ->select('*')
        ->join('recete', 'recete.recete_Urun2ID', '=', 'urun.urun_ID')
        ->where('recete_Urun1ID', $recipeproduct1)
        ->get();
        $products = DB::select('select * from urun');
       
        $recipeproducts = Recipe::select("*")
                        ->where("recete_Urun1ID", $recipeproduct1)
                        ->get();
        return view('dashboards.users.recete',['recipeproducts'=>$recipeproducts,'products'=>$products,'recipeproduct1'=>$recipeproduct1,'names'=>$names]);
        
       
      
        
}

    function getIndex(){
        $view = view('dashboards.users.stokgiris')->render();
        header("Content-type: text/html");
        header("Content-Disposition: attachment; filename=view.html");
        return $view;
    
    }

   function index(){
    $projects = DB::select('select * from proje');
    return view('dashboards.users.index',['projects'=>$projects]);
   }
   function mimport(){
    $sipariss = DB::select('SELECT * FROM siparis INNER JOIN urun ON siparis.siparis_urunkod = urun.urun_Kod INNER JOIN firma ON siparis.siparis_firmaID = firma_ID');
    return view('dashboards.users.3mimport',['sipariss'=>$sipariss]);
   }
   function urunler(){
    $products = DB::select('select * from urun');
    return view('dashboards.users.urunler',['products'=>$products]);
    }   
    function processler(){
        $process = DB::select('select * from process');
        return view('dashboards.users.process',['process'=>$process]);
        }   
    function makineler(){
        $machines = DB::select('select * from makine');
        return view('dashboards.users.makine',['machines'=>$machines]);
        }  
    function isemri(){
            $isemris = DB::select('select * from isemri inner join process on isemri.isemri_process = process.process_ID');
            $kontrols = DB::select("SELECT process.*, operasyon.*, risk.*, kontrol.*, operasyon.operasyon_process
            FROM (process INNER JOIN (operasyon INNER JOIN risk ON
            operasyon.operasyon_ID = risk.risk_operasyonID) ON process.process_ID =
            operasyon.operasyon_process) INNER JOIN kontrol ON risk.risk_ID =
            kontrol.kontrol_riskID;");
          
            return view('dashboards.users.isemri',['isemris'=>$isemris,'kontrols'=>$kontrols]);
            }    
    function firmalar(){
        $firms = DB::select('select * from firma');
        return view('dashboards.users.firmalar',['firms'=>$firms]);
        }   
    
    function teklifler(){
        $teklifs  = DB::select('SELECT firma.firma_Ad,teklif.*,urun.urun_ID,urun.urun_Ad,urun2.urun_ID,urun2.urun_Ad AS S1 FROM (teklif INNER JOIN urun ON teklif.teklif_hammaddeID = urun.urun_ID) 
        inner join urun AS urun2 ON teklif.teklif_hammadde2ID = urun2.urun_ID inner join firma on teklif.teklif_firmaID = firma.firma_ID');
        $dosyas = DB::select('SELECT * FROM teklifdosya');
        return view('dashboards.users.teklifler',['teklifs'=>$teklifs,'dosyas'=>$dosyas]);
    }
   function profile(){
       return view('dashboards.users.profile');
   }
   function settings(){
       return view('dashboards.users.settings');
   }
   function ekle(){
    $producttypes = DB::select('select * from urunturleri');
    return view('dashboards.users.ekle',['types'=>$producttypes]);
    }
    function hareketler(){
        $moves = DB::select('SELECT * FROM urun INNER JOIN urunhareket ON urun.urun_ID = urunhareket_urunID');
       
        $products = DB::select('select * from urun');
        return view('dashboards.users.urunhareket',['moves'=>$moves,'products'=>$products]);
        }
   function proje(){
        $products = DB::select('select * from urun');
        $firms = DB::select('select * from firma');
        return view('dashboards.users.proje',['products'=>$products,'firms'=>$firms]);
        }
    function projeler(){
            $projects = DB::select('select * from proje');
            $products = DB::select('select * from urun');
            return view('dashboards.users.projeler',['projects'=>$projects,'products'=>$products]);
            }
        
    function prototipler(){
        $projects = DB::select('select * from proje');
        return view('dashboards.users.prototip',['projects'=>$projects]);
        }
        function AddProject(Request $request){
            
            $projetur= $request->input('projetur');
            $tanim = $request->input('projectname');
            $po = $request->input('po');
            $projekod = $request->input('projectcode');
            $brcode = $request->input('brcode');
            $sericode = $request->input('sericode');
            $customer = $request->input('customer');
            $hammadde1 = $request->input('hammadde1');
            $hammadde1miktar = $request->input('kullanimmiktar1');
            $hammadde2 = $request->input('hammadde2');
            $hammadde2miktar = $request->input('kullanimmiktar2');
            $hammadde3 = $request->input('hammadde3');
            $hammadde3miktar = $request->input('kullanimmiktar3');
            $adet = $request->input('adet');
            $taleptarih = $request->input('taleptarih');
            $gonderimtarih = $request->input('gonderimtarih');
            $projefiyat = $request->input('projefiyat');
            $fiyatkur = $request->input('fiyatkur');
            $faturafiyat = $request->input('faturafiyat');
            $faturafiyattoplam = $request->input('faturafiyattoplam');
            

            $path = 'users/po/';
            $fileolcum = $request->file('olcum');
            if($fileolcum=="")
            {
                $new_nameolcum = "Yok";
            }
            else
            {
            $typeolcum = $fileolcum->getClientOriginalName();
            $new_nameolcum = $typeolcum.$po;
            $upload = $fileolcum->move(public_path($path), $new_nameolcum);
            }
            $filedokuman = $request->file('dokuman');
            if($filedokuman=="")
            {
                $new_namedokuman = "Yok";
            }
            else{
            $typedokuman = $filedokuman->getClientOriginalName();
            $new_namedokuman = $typedokuman.$po;
            $upload = $filedokuman->move(public_path($path), $new_namedokuman);
            }

            $data=array("proje_tur"=>$projetur,"proje_tanim"=>$tanim,"proje_po"=>$po,"proje_kod"=>$projekod,"proje_br"=>$brcode,"proje_seri"=>$sericode,"proje_musteri"=>$customer,"proje_hammadde1"=>$hammadde1,
            "proje_hammadde1miktar"=>$hammadde1miktar,"proje_hammadde2"=>$hammadde2,"proje_hammadde2miktar"=>$hammadde2miktar,"proje_hammadde3"=>$hammadde3,
            "proje_hammadde3miktar"=>$hammadde3miktar,"proje_adet"=>$adet,"proje_taleptarih"=>$taleptarih,"proje_gonderimtarih"=>$gonderimtarih,"proje_fiyat"=>$projefiyat,
            "proje_fiyatkur"=>$fiyatkur,"proje_faturafiyat"=>$faturafiyat,"proje_toplamfiyat"=>$faturafiyattoplam,"proje_olcum"=>$new_nameolcum,"proje_dokuman"=>$new_namedokuman);
            
            $check=DB::table('proje')->insert($data);

            return back()->with('success','Proje başarıyla eklendi!');


           
            }
    function userShowFirmProduct(Request $request){
        $firmID = $request->input('firmID');
        $products = DB::select('select * from urun');
        $firmproducts = DB::select("SELECT * FROM urun INNER JOIN firmaurun ON urun.urun_ID = firmaurun_urunID HAVING firmaurun.firmaurun_firmaID = '$firmID'");

    return view('dashboards.users.firmaurunekle',['products'=>$products,'firmID'=>$firmID,'firmproducts'=>$firmproducts]);

    }
    function userAddProductToFirm(Request $request){
        $firmID = $request->input('firmID');
        $urunID = $request->input('urunid');
        $fiyat = $request->input('fiyat');
        $kur = $request->input('kur');

        $data=array("firmaurun_Fiyat"=>$fiyat,"firmaurun_Kur"=>$kur,"firmaurun_urunID"=>$urunID,"firmaurun_FirmaID"=>$firmID,"firmaurun_Tarih" => \Carbon\Carbon::now());
        $check=DB::table('firmaurun')->insert($data);

        $firmID2 = $request->input('firmID');
        $products = DB::select('select * from urun');
        $firmproducts = DB::select("SELECT * FROM urun INNER JOIN firmaurun ON urun.urun_ID = firmaurun_urunID HAVING firmaurun.firmaurun_firmaID = '$firmID'");

        if($check){
            return back()->with('success','Urun başarıyla firmaya eklendi!',['products'=>$products,'firmID'=>$firmID2,'firmproducts'=>$firmproducts]);
        }
        else
        {
            return back()->with('error','Urun eklenemedi!',['products'=>$products,'firmID'=>$firmID2,'firmproducts'=>$firmproducts]);
        }

    }
    function GoBack()
    {
        return redirect()->back();
    }
    function StockEntry(Request $request){
        $stokid = $request->input('stokID');
        $entrys = DB::table('urun')
        ->join('firmaurun', 'urun.urun_ID', '=', 'firmaurun.firmaurun_UrunID')
        ->join('firma', 'firma.firma_ID', '=', 'firmaurun.firmaurun_FirmaID')
        ->join('urundetay','urundetay.urundetay_urunID','=','urun.urun_ID')
        ->where('urun.urun_ID', '=', $stokid)
        ->get();

        

        return view('dashboards.users.stokgiris',['entrys'=>$entrys]);

    }
    function StockExit(Request $request){

    }
    function StockVer(Request $request){
        $lotno = $request->input('lotno');
        $miktar = $request->input('miktar');
        $moveid = $request->input('moveid');
        $kalan = 0;
        $bcikan = 0;
        $girdi=1;
        $kalanss = DB::select("select * from urunhareket where urunhareket_lotno = '$lotno' and urunhareket_girdi = '$girdi'");
        foreach($kalanss as $kalans)
        {
            $kalan = $kalans->urunhareket_kalanmiktar;
            $bcikan = $kalans->urunhareket_cikanmiktar;
        }
        $kalan2 = $kalan - $miktar;
        $nmiktar = $bcikan + $miktar;
     
       
        if($miktar>$kalan){
            return back()->with('error','Urun Verilemez Stok Hatası');
        }
        $data = array("urunhareket_cikanmiktar"=>$nmiktar,"urunhareket_kalanmiktar"=>$kalan2);
        $dus = DB::table('urunhareket')->where('urunhareket_lotno',$lotno)->where('urunhareket_girdi',$girdi)->update($data);

        $durum ="Verildi";

        
        $kalanverss = DB::select("select * from urunhareket where urunhareket_ID");
        foreach($kalanverss as $kalanvers){
            $kalanver=$kalanvers->urunhareket_kalanmiktar;
        }
        $emirdekalan = $kalanver-$miktar;
        if($kalanver>$miktar){
        $data2 = array("urunhareket_kalanmiktar"=>$emirdekalan);
        }
        else{
            $data2 = array("urunhareket_durum"=>$durum,"urunhareket_kalanmiktar"=>$emirdekalan);
        }
        $verildi = DB::table('urunhareket')->where('urunhareket_ID',$moveid)->update($data2);
        
        return back()->with('success','Urun Verildi');



    }
    function CheckAddStockEntry(Request $request){
        $stokid = $request->input('urunid');
        $entrys = DB::table('urun')
        ->join('firmaurun', 'urun.urun_ID', '=', 'firmaurun.firmaurun_UrunID')
        ->join('firma', 'firma.firma_ID', '=', 'firmaurun.firmaurun_FirmaID')
        ->join('urundetay','urundetay.urundetay_urunID','=','urun.urun_ID')
        ->where('urun.urun_ID', '=', $stokid)
        ->get();

        $stokirsdate = $request->input('StockIrsalyDate');
        $stokirsno = $request->input('StockIrsalyNo');
        $stoklotno = $request->input('StockLotNo');
        $producedate = $request->input('ProductionDate');
        $productlocation = $request->input('ProductionLocation');
        $controlcheck1 = $request->input('ControlSize');
        $controlcheck2 = $request->input('ControlSize0');
        $controlcheck3 = $request->input('ControlSize1');
        $text1 = $request->input('q1');
        $text2 = $request->input('q2');
        $text3 = $request->input('q3');
        $kolimiktar = $request->input('StockItem');
        $koliadet = $request->input('StockAdet');
        $aciklama = $request->input('aciklama');
      
        

        return view('dashboards.users.stokgirisonay',['entrys'=>$entrys,'urttarih'=>$producedate,'aciklama'=>$aciklama,'irstarih'=>$stokirsdate,'irsno'=>$stokirsno,'depokonum'=>$productlocation,'stokid'=>$stokid,'lotno'=>$stoklotno,'q1'=>$text1,'q2'=>$text2,'q3'=>$text3,'kolimiktar'=>$kolimiktar,'koliadet'=>$koliadet]);
    }

    function AddStockEntry(Request $request){


            $stokid = $request->input('urunid');
            $stokirsdate = $request->input('StockIrsalyDate');
            $stokirsno = $request->input('StockIrsalyNo');
            $stoklotno = $request->input('StockLotNo');
            $producedate = $request->input('ProductionDate');
            $productlocation = $request->input('ProductionLocation');
            $controlcheck1 = $request->input('ControlSize');
            $controlcheck2 = $request->input('ControlSize0');
            $controlcheck3 = $request->input('ControlSize1');
            $text1 = $request->input('q1');
            $text2 = $request->input('q2');
            $text3 = $request->input('q3');
            $miktar = ($request->input('StockItem'))*($request->input('StockAdet'));
            $girdi = $request->input('girdi');
            $kisi = $request->input('StockPersonel');
            $aciklama = $request->input('StockDescription');
            $data=array("urunhareket_irstarih"=>$stokirsdate,"urunhareket_irsno"=>$stokirsno,"urunhareket_lotno"=>$stoklotno,"urunhareket_urttarih"=>$producedate,
            "urunhareket_depokonumu"=>$productlocation,"urunhareket_kisi"=>$kisi,"urunhareket_aciklama"=>$aciklama,"urunhareket_urunID"=>$stokid,"urunhareket_miktar"=>$miktar,"urunhareket_kalanmiktar"=>$miktar,"urunhareket_tarih" => \Carbon\Carbon::now(),"urunhareket_girdi"=>$girdi);
            $check=DB::table('urunhareket')->insert($data);
            $products = DB::select('select * from urun');
            $moves = DB::select('SELECT * FROM urun INNER JOIN urunhareket ON urun.urun_ID = urunhareket_urunID');
        
           
            
            if($check){
                return redirect()->route('user.urunhareket')->with('success','Stok başarıyla eklendi!',['products'=>$products,'moves'=>$moves]);
            }
            else
            {
                return redirect()->route('user.urunhareket')->with('error','Stok eklenemedi!',['products'=>$products,'moves'=>$moves]);
            }



    }

    function AddStockExit(Request $request){
        $stokid = $request->input('stokID');
        $miktar = $request->input('ciktimiktar');
        $cikti = $request->input('cikti');
        $data=array("urunhareket_urunID"=>$stokid,"urunhareket_miktar"=>$miktar,"urunhareket_tarih" => \Carbon\Carbon::now(),"urunhareket_cikti"=>$cikti);
        $check=DB::table('urunhareket')->insert($data);
        $products = DB::select('select * from urun');
        $moves = DB::select('SELECT * FROM urun INNER JOIN urunhareket ON urun.urun_ID = urunhareket_urunID');

        if($check){
            return back()->with('success','Stok başarıyla eklendi!',['products'=>$products,'moves'=>$moves]);
        }
        else
        {
            return back()->with('error','Stok eklenemedi!',['products'=>$products,'moves'=>$moves]);
        }



}

    function AddDetail(Request $request){
        $product1 = $request->input('urunID');
        $product_width = $request->input('urunEn');
        $product_length = $request->input('urunBoy');
        $product_fingerlength = $request->input('uruntirnak');
        $product_hight = $request->input('urunYukseklik');
        $product_color = $request->input('urunRenk');
        $product_weight = $request->input('urunAgirliknet');
        $product_totalweight = $request->input('urunAgirlikbrut');
        $product_class = $request->input('urunOnemsinif');
        $product_manyforpack = $request->input('urunKolimiktar');
        $data=array("urundetay_tirnak"=>$product_fingerlength,"urundetay_En"=>$product_width,"urundetay_kolimiktar"=>$product_manyforpack,"urundetay_onemsinif"=>$product_class,"urundetay_Boy"=>$product_length,"urundetay_Yukseklik"=>$product_hight,"urundetay_renk"=>$product_color,'urundetay_agirliknet'=>$product_weight,'urundetay_agirlikbrut'=>$product_totalweight);
        
        $checkfirst = DB::select("select * from urundetay where urundetay_urunID = '$product1'");
        if($checkfirst){
            $check = DB::table('urundetay')->where('urundetay_urunID',$product1)->update($data);
        }
        else {
            $data=array("urundetay_urunID"=>$product1,"urundetay_En"=>$product_width,"urundetay_kolimiktar"=>$product_manyforpack,"urundetay_onemsinif"=>$product_class,"urundetay_Boy"=>$product_length,"urundetay_Yukseklik"=>$product_hight,"urundetay_renk"=>$product_color,'urundetay_agirliknet'=>$product_weight,'urundetay_agirlikbrut'=>$product_totalweight);
            $check = DB::table('urundetay')->insert($data);
        }
        
        
        $details = DB::table('urun')
        ->select('*')
        ->join('urundetay', 'urundetay.urundetay_UrunID', '=', 'urun.urun_ID')
        ->where('urundetay_urunID', $product1)
        ->get();

        $products = Product::select("*")
        ->where("urun_ID", $product1)  
        ->get();

         return back()->with('success','Duzenlendi');
    }
   function ShowUpdateUrun(Request $request){
    $productID = $request->input('urunID');
    $details = DB::table('urun')
    ->select('*')
    ->join('urundetay', 'urundetay.urundetay_urunID', '=', 'urun.urun_ID')
    ->where('urundetay_urunID', $productID)
    ->get();
            
    $products2 = Product::select("*")
    ->where("urun_ID", $productID)  
    ->get();
    $recipeproduct1 = $productID ;
        $names = DB::select("select * from recete inner join process on recete.recete_process = process.process_ID HAVING recete_urun1ID = '$recipeproduct1'");
        $products = DB::select('select * from urun');
        $process = DB::select('select * from process');
        $makines = DB::select('select * from makine');
       
        $recipeproducts = Recipe::select("*")
                        ->where("recete_Urun1ID", $recipeproduct1)
                        ->get();

    return view('dashboards.users.duzenle',['productID'=>$productID,'makines'=>$makines,'process'=>$process,'products2'=>$products2,'details'=>$details,'recipeproducts'=>$recipeproducts,'products'=>$products,'recipeproduct1'=>$recipeproduct1,'names'=>$names]);
            }
     function userUpdateProject(Request $request){

      

        $projectID=$request->input('projectID');
        
        $projetur= $request->input('projetur');
        $tanim = $request->input('projectname');
        $po = $request->input('po');
        $projekod = $request->input('projectcode');
        $brcode = $request->input('brcode');
        $sericode = $request->input('sericode');
        $customer = $request->input('customer');
        $hammadde1 = $request->input('hammadde1');
        $hammadde1miktar = $request->input('kullanimmiktar1');
        $hammadde2 = $request->input('hammadde2');
        $hammadde2miktar = $request->input('kullanimmiktar2');
        $hammadde3 = $request->input('hammadde3');
        $hammadde3miktar = $request->input('kullanimmiktar3');
        $adet = $request->input('adet');
        $taleptarih = $request->input('taleptarih');
        $gonderimtarih = $request->input('gonderimtarih');
        $projefiyat = $request->input('projefiyat');
        $fiyatkur = $request->input('fiyatkur');
        $faturafiyat = $request->input('faturafiyat');
        $faturafiyattoplam = $request->input('faturafiyattoplam');

        $yeni=$request->input('yeni');
        


        $data=array("proje_tur"=>$projetur,"proje_tanim"=>$tanim,"proje_po"=>$po,"proje_kod"=>$projekod,"proje_br"=>$brcode,"proje_seri"=>$sericode,"proje_musteri"=>$customer,"proje_hammadde1"=>$hammadde1,
        "proje_hammadde1miktar"=>$hammadde1miktar,"proje_hammadde2"=>$hammadde2,"proje_hammadde2miktar"=>$hammadde2miktar,"proje_hammadde3"=>$hammadde3,
        "proje_hammadde3miktar"=>$hammadde3miktar,"proje_adet"=>$adet,"proje_taleptarih"=>$taleptarih,"proje_gonderimtarih"=>$gonderimtarih,"proje_fiyat"=>$projefiyat,
        "proje_fiyatkur"=>$fiyatkur,"proje_faturafiyat"=>$faturafiyat,"proje_toplamfiyat"=>$faturafiyattoplam);

        if($yeni==1)
        {
            $check=DB::table('proje')->insert($data);
            return back()->with('success','Proje başarıyla yeni bir proje olarak kaydedildi!');
        }
        else
        {
            $check=DB::table('proje')->where('proje_ID',$projectID)->update($data);
            return back()->with('success','Proje başarıyla guncellendi!');
        }

       

        return back()->with('success','Proje başarıyla guncellendi!');
    
    }

        function userShowWorkTeklif(Request $request){
            $products = DB::select("SELECT * from urun");
            $machines = DB::select("SELECT * from makine");
            $processs = DB::select("SELECT * from process");
            $teklifID = $request->input('teklifID');
            $teklifs = DB::select("SELECT firma.firma_Ad,firma.firma_ID,teklif.*,urun.urun_ID,urun.urun_Ad,urun2.urun_ID AS S1_ID,urun2.urun_Ad AS S1 FROM (teklif INNER JOIN urun ON teklif.teklif_hammaddeID = urun.urun_ID) 
            inner join urun AS urun2 ON teklif.teklif_hammadde2ID = urun2.urun_ID inner join firma on teklif.teklif_firmaID = firma.firma_ID HAVING teklif.teklif_ID = '$teklifID'");
            $singleorcombine = $request->input('singleorcombine');
           foreach($teklifs as $teklif){
              $hammadde1ID=$teklif->teklif_hammaddeID ;
         
           }
           $hammadde1s = DB::select("SELECT urundetay_en,urundetay_boy from urundetay where urundetay_urunID = '$hammadde1ID'");
         
         
                     
            if($singleorcombine=='Combine'){
            return view('dashboards.users.fiyatcalis',['teklifs'=>$teklifs,'products'=>$products,'machines'=>$machines]);
            }
            else{
                return view('dashboards.users.fiyatcalissingle',['processs'=>$processs,'teklifs'=>$teklifs,'products'=>$products,'machines'=>$machines,'hammadde1s'=>$hammadde1s]);
            }
        }

        function userUpdateTeklif(Request $request){


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
            return redirect('dashboards.users.teklifduzenle',['teklifs'=>$teklifs,'firms'=>$firms,'products'=>$products])->with('success','Teklif başarıyla guncellendi!');
        }
        else
        {   
         
            return view('dashboards.users.teklifduzenle',['teklifs'=>$teklifs,'firms'=>$firms,'products'=>$products])->with('error','Error');
           
                        } }
    function ShowUpdateProject(Request $request){
        $products = DB::select("select * from urun");
                $projectID = $request->input('projectID');
                $tip = $request->input('tip');
                $projects = DB::table('proje')
                ->select('*')
                ->where('proje_ID', $projectID)
                ->get();
                        
             
                if($tip=="duzenle")
                {
                return view('dashboards.users.projeduzenle',['projects'=>$projects,'products'=>$products]);
                }     
                else
                {
                    return view('dashboards.users.projeyinele',['projects'=>$projects,'products'=>$products]);
                }
        
        
        }
    function workurunekle(Request $request)
    {
        $products = DB::select("select * from urun");
        return response()->json(['products'=>$products]);
      

    }
    function saveworkproduct(Request $request)
    {
        $process = $request->input('wprocess');
        $makine = $request->input('wmakine');
        $setupadam = $request->input('wsetupadam');
        $setupsure = $request->input('wsetupsure');
        $processadam = $request->input('wprocessadam');
        $processsure = $request->input('wprocesssure');
        $girenuruns = $request->input('wgirenurun');
        $cikanurun = $request->input('wcikanurun');
        $data=array('urun_Ad'=>$cikanurun);
        $checkinsert = DB::table('urun')->insert($data);
        $productid = DB::select("select * from urun where urun_Ad = '$cikanurun'");
        foreach ($productid as $producti)
        {
            $id=$producti->urun_ID;
        }
        $data2=array('recete_Urun1ID'=>$id,'recete_process'=>$process,'recete_makine'=>$makine,'recete_setupadam'=>$setupadam,'recete_setupsure'=>$setupsure,
    'recete_processadam'=>$processadam,'recete_processsure'=>$processsure);
    $checkinsert2=DB::table('recete')->insert($data2);
    $receteids = DB::select("select * from recete where recete_process = '$process' and recete_Urun1ID = '$id'");
    foreach($receteids as $receteid)
    {
        $receteidx = $receteid->recete_ID;
    }
        foreach($girenuruns as $girenurun)
        {
           $data3=array('receteurun_receteID'=>$receteidx,'receteurun_urunID'=>$girenurun);
            $checkinsert3=DB::table('receteurun')->insert($data3);
        }
        return response()->json([$id]);
        
        
        
        
        

    }
    function userShowUpdateTeklif(Request $request){

        $teklifID = $request->input('teklifID');
        $teklifs = DB::select("SELECT firma.firma_Ad,firma.firma_ID,teklif.*,urun.urun_ID,urun.urun_Ad,urun2.urun_ID AS S1_ID,urun2.urun_Ad AS S1 FROM (teklif INNER JOIN urun ON teklif.teklif_hammaddeID = urun.urun_ID) 
        inner join urun AS urun2 ON teklif.teklif_hammadde2ID = urun2.urun_ID inner join firma on teklif.teklif_firmaID = firma.firma_ID HAVING teklif.teklif_ID = '$teklifID'");

        $firms = DB::select('select * from firma');

        $products = DB::select('select * from urun');
                 
    
        return view('dashboards.users.teklifduzenle',['teklifs'=>$teklifs,'firms'=>$firms,'products'=>$products]);

    }
    function addProduct(Request $request)
        {

            $product_name = $request->input('urunAd');
            $product_code = $request->input('urunKod');
            $product_type = $request->input('urunOlcut');
            $product_type2 = $request->input('urunTur');
            $product_buy = $request->input('urunAlis');
            $product_sell = $request->input('urunSatis');
            $product_active = $request->input('urunAktif');
           
            $data=array('urun_Tur'=>$product_type2,'urun_Ad'=>$product_name,"urun_Kod"=>$product_code,"urun_Olcut"=>$product_type,"urun_Alis"=>$product_buy,"urun_Satis"=>$product_sell,"urun_Aktif"=>$product_active);
            $check = DB::table('urun')->insert($data);
            $productIDdetail = Product::select("urun_ID")
            ->where("urun_Kod", $product_code)  
            ->get();
            $data2=array('urundetay_urunID'=>$productIDdetail[0]['urun_ID']);
            $check2= DB::table('urundetay')->insert($data2);
        
            if($check){
                return back()->with('success','Urun başarıyla eklendi!');
            }
            else
            {
                return back()->with('error','Urun eklenemedi!');
            }
            
    }
    function addFirm(Request $request)
    {
        
        $firm_name = $request->input('firmaAd');
        $firm_code = $request->input('firmaKod');
        $firm_taxno = $request->input('firmaVno');
        $firm_address = $request->input('firmaAdres');
        $firm_supply = $request->input('firmaTedarik');
        $firm_client = $request->input('firmaMusteri');
        $firm_active = $request->input('firmaAktif');
        $firm_charge = $request->input('firmayetkili');
        $firm_contact = $request->input('firmailetisim');
        $data=array('firma_yetkiliad'=>$firm_charge,'firma_iletisim'=>$firm_contact,'firma_Ad'=>$firm_name,"firma_Kod"=>$firm_code,"firma_Vno"=>$firm_taxno,"firma_Adres"=>$firm_address,"firma_Tedarik"=>$firm_supply,"firma_Musteri"=>$firm_client,"firma_Aktif"=>$firm_active);
        $check = DB::table('firma')->insert($data);
        if($check){
            return back()->with('success','Firma başarıyla eklendi!');
        }
        else
        {
            return back()->with('error','Firma eklenemedi!');
        }
}
function ShowUpdateFirm(Request $request){
    $firmID = $request->input('firmID');
    $firminfos = DB::select("select * from firma where firma_ID = '$firmID'");

    return view('dashboards.users.firmaduzenle',['firminfos'=>$firminfos]);
}
function UpdateFirm(Request $request)
{
    $firmID = $request->input('firmID');
    $firm_name = $request->input('firmaAd');
    $firm_code = $request->input('firmaKod');
    $firm_taxno = $request->input('firmaVno');
    $firm_address = $request->input('firmaAdres');
    $firm_supply = $request->input('firmaTedarik');
    $firm_client = $request->input('firmaMusteri');
    $firm_active = $request->input('firmaAktif');
    $firm_charge = $request->input('firmayetkili');
    $firm_contact = $request->input('firmailetisim');
    $data=array('firma_yetkiliad'=>$firm_charge,'firma_iletisim'=>$firm_contact,'firma_Ad'=>$firm_name,"firma_Kod"=>$firm_code,"firma_Vno"=>$firm_taxno,"firma_Adres"=>$firm_address,"firma_Tedarik"=>$firm_supply,"firma_Musteri"=>$firm_client,"firma_Aktif"=>$firm_active);
    $check = DB::table('firma')->where('firma_ID',$firmID)->update($data);
    if($check){
        return back()->with('success','Firma başarıyla guncellendi!');
    }
    else
    {
        return back()->with('error','Firma guncellenemedi!');
    }
}
function userAddTeklif(Request $request)
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

    $data=array('teklif_figur'=>$figur,'teklif_singleorcombine'=>$singleorcombine,'teklif_uruntip'=>$uruntip,'teklif_pakettip'=>$pakettip,'teklif_soptarih'=>$soptarih,
    'teklif_eoptarih'=>$eoptarih,'teklif_hacim'=>$hacim,'teklif_firmaID'=>$firmid,'teklif_projead'=>$projead,'teklif_projekod'=>$projekod,'teklif_fingerlift'=>$fingerlift,
    'teklif_linerchange'=>$linerchange,'teklif_sandwich'=>$sandwich,'teklif_hottrim'=>$hottrim,'teklif_plaincut'=>$plaincut,'teklif_edgeseal'=>$edgeseal,'teklif_urunen'=>$urunen,
    'teklif_urunboy'=>$urunboy,'teklif_fingerliftlength'=>$fingerliftlength,'teklif_sheeten'=>$sheetwidth,'teklif_sheetboy'=>$sheetlength,'teklif_sheetspace'=>$sheetspace,
    'teklif_hammaddeID'=>$hammadde,'teklif_hammadde2ID'=>$hammadde2);
    $check = DB::table('teklif')->insert($data);

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
function SaveProjectFile(Request $request){
    $path = 'users/projects/';
    $file = $request->file('file');
    $type = $file->getClientOriginalName();
    $extension = $request->file->getClientOriginalExtension();
    $new_name = Auth::user()->firm_ID.date('Ymd').$type;
    $upload = $file->move(public_path($path), $new_name);
    $data=array('teklifdosya_ad'=>$new_name,'teklifdosya_tur'=>$extension);
    $update = DB::table('teklifdosya')->insert($data);

    return back()->with('success','Dosya başarıyla eklendi!');
}
function DownloadProjectFile(Request $request){
    $pathlocation=$request->input('dosyaad');
    
    
    $path = public_path('users/projects/'.$pathlocation.'');

        return response()->download($path,null,[],null);
}
function DownloadPOFile(Request $request){
    $pathlocation=$request->input('dosyaad');
    
    
    $path = public_path('users/po/'.$pathlocation.'');

        return response()->download($path,null,[],null);
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
function updateUrun(Request $request){
    $urunid = $request->input('urunID');
$query = DB::table('urun')
        ->where('urun_ID',$urunid) 
        ->update([
    'urun_Ad'=>$request->input('urunAd'),
    'urun_Kod'=>$request->input('urunKod'),
    'urun_Olcut'=>$request->input('urunOlcut'),
    'urun_Alis'=>$request->input('urunAlis'),
    'urun_Satis'=>$request->input('urunSatis'),
    'urun_Aktif'=>$request->input('urunAktif'),
  
]);
$products = Product::select("*")
->where("urun_ID", $urunid)  
->get();
if($query){
    return back()->with('success','Urun guncellendi');
}
else
{
    return back()->with('error','Urun guncellenemedi!');
}


}
function deleteUrun(Request $request){
    $urunid = $request->input('urunID');
$query = DB::table('urun')
        ->where('urun_ID',$urunid) 
        ->update([
    'urun_Silindi'=>1,
   
  
]);
if($query){
    return back()->with('success','Urun Silindi');
}
else
{
    return back()->with('error','Urun silinemedi');
}


}
    
}
