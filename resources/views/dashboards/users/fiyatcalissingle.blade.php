@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Fiyat Çalış')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">AnaSayfa</a></li>
                <li class="breadcrumb-item active">Fiyat Çalış</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
   
      <section class="content">

<!-- Default box -->
<div class="card">
  
       
  <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#hammadde" data-toggle="tab">Hammadde</a></li>
                    <li class="nav-item"><a class="nav-link" href="#processes" data-toggle="tab">Yan Ürün ve Processler</a></li>
                    <li class="nav-item"><a class="nav-link" href="#recete" data-toggle="tab">Recete</a></li>
                    <li class="nav-item"><a class="nav-link" href="#calis" data-toggle="tab">calis</a></li>
          

             
                   
                  </ul>
             
  </div>
  <div class="card-body">
  <div class="tab-content">
    <div class="active tab-pane" id="hammadde">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
        <div class="row">
        <div class="col-12 col-sm-4">

            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Hammadde Ölçüleri</span>
                <span class="info-box-number text-center text-muted mb-0">
                <div>
                <input type="hidden" value="@foreach($hammadde1s as $hammadde1){{ $hammadde1->urundetay_en }} @endforeach" id="hammadde1en" name="hammadde1en"> <input type="hidden" value="@foreach($hammadde1s as $hammadde1){{ $hammadde1->urundetay_boy }} @endforeach" id="hammadde1boy" name="hammadde1boy"> 
                  Urun 1 : @foreach($hammadde1s as $hammadde1en){{ $hammadde1->urundetay_en }} @endforeach mm x @foreach($hammadde1s as $hammadde1){{ $hammadde1->urundetay_boy }} @endforeach mm
                  </div>
             
                </span>
 
        
              </div>
            </div>
          </div>
        <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Çıkan Adet 1.Ürün</span>
                <span class="info-box-number text-center text-muted mb-0">  
                  <div id="cikanadetdiv" name="cikanadetdiv"> </div> <input type="hidden" value="" id="cikanadet">
                  <div id="cikantabakadiv" name="cikantabakadiv"></div> <input type="hidden" value="" id="cikantabaka">
                  <div id="cikanurundiv" name="cikanurundiv"></div> </span> <input type="hidden" value="" id="cikanurun">
        
              </div>
            </div>
          </div>
          
          

        
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">1. Ürün(m2)</span>
                <span class="info-box-number text-center text-muted mb-0">
                <div id="hammadde1m2div" name="hammadde1m2div"> </div> <input type="hidden" value="" id="hammadde1m2">
                <div id="urun1m2div" name="urun1m2div"> </div> <input type="hidden" value="" id="urun1m2">
             
                </span>
              </div>
            </div>
          </div>

          
        

          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content" style="background-color:lightgreen;">
                <span class="info-box-text text-center text-muted" >Verimlilik 1.Ürün(%)</span>
                <span class="info-box-number text-center text-muted mb-0">
                <div id="toplamurun1div" name="toplamurun1div"> </div> <input type="hidden" value="" id="toplamurun1">
                <div id="toplamfire1div" name="toplamfire1div"> </div> <input type="hidden" value="" id="toplamfire1">
                <div id="urun1verimlilikdiv" name="urun1verimlilikdiv"> </div> <input type="hidden" value="" id="urun1verimlilik">
                </span>
              
              </div>
            </div>
          </div>
        </div>

       

        <div class="row">
          <div class="col-12">
            <form action=""><label for="">1. Ürün</label>
              <div class="row"> <br>
              <div class="col-2">
              <label for="">Kesim En</label>
            <input type="text" class="form-control" id="kalip1en" value=" @foreach ($teklifs as $teklif){{ $teklif->teklif_urunen+$teklif->teklif_fingerliftlength }} @endforeach" onchange="fiyatcalissingle()">
            </div>
            <div class="col-2">
            <label for="">Kesim Boy</label>
            <input type="text" class="form-control" id="kalip1boy" value="@foreach ($teklifs as $teklif){{ $teklif->teklif_urunboy }} @endforeach" onchange="fiyatcalissingle()">
            </div>       
            <div class="col-2">
            <label for="">Kesim Fire</label>
            <input type="text" class="form-control" id="kalip1fire" value="0"  onchange="fiyatcalissingle()">
            </div> 
            <div class="col-2">
            <label for="">1 Kesimde Çıkan Adet </label>
            <input type="text" class="form-control" id="kalip1gozsayisi" value=""  onchange="fiyatcalissingle()" >
            </div> 
            </div><br>
            <label for="">Kesim</label> <br>
            <div class="row">
              
              <div class="col-2">
              <label for="">Ayar Fire</label>
              <input type="text" class="form-control" id="urunayarfire1" value="10" onchange="fiyatcalissingle()">
              </div> 
              <div class="col-2">
              <label for="">Kontrol Fire</label>
              <input type="text" class="form-control" id="urunkontrolfire1" value="50" onchange="fiyatcalissingle()">
              </div> 
            </div> 
            <br>
            <label for="">Tabakalama</label> <br>
            <div class="row">
              
              <div class="col-2">
              <label for="">Tabaka İlk Fire</label>
              <input type="text" class="form-control" id="tabakailkfire1" value="100" onchange="fiyatcalissingle()">
              </div> 
              <div class="col-2">
              <label for="">Tabaka Son Fire</label>
              <input type="text" class="form-control" id="tabakasonfire1" value="100"  onchange="fiyatcalissingle()">
              </div> 
        
            </div> <br>
          
            <label for="">Dilimleme</label> <br>
            <div class="row">
              
              <div class="col-2">
              <label for="">Dilim İlk Fire</label>
              <input type="text" class="form-control" id="dilimilkfire1" value="5"  onchange="fiyatcalissingle()">
              </div> 
              <div class="col-2">
              <label for="">Dilim Son Fire</label>
              <input type="text" class="form-control" id="dilimsonfire1" value="20"  onchange="fiyatcalissingle()">
              </div> 
            </div> <br>
            <div style="position: absolute;width: 100%;text-align: center;font-size: 18px;">
            <button  class="btn btn-danger" >Çalışmayı bitir</button>
            </div>
     
         
            
           
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
        <h3 class="text-primary"></i> Teklif Bilgileri</h3>
        <p class="text-muted">
                  <thead>
                  <tr>   @foreach ($teklifs as $teklif)
                   
                    <th>Hammadde</th> :      <td>{{ $teklif->urun_Ad }}</td> <input type="hidden" id="hammadde1ID" value="{{ $teklif->urun_ID }}"><input type="hidden" id="hammadde1Ad" value="{{ $teklif->urun_Ad }}"> <br>
                     <th>Hammadde 2</th> :      <td>{{ $teklif->S1 }}</td> <br>
                    <th>Figur</th>    <td> :{{ $teklif->teklif_figur }}</td> <br>
                    <th>Single/Combine</th> :         <td>{{ $teklif->teklif_singleorcombine }}</td> <br>
                    <th>Tip</th> :  <td>{{ $teklif->teklif_uruntip }} <input type="hidden" value="{{$teklif->teklif_uruntip}}" name="teklifuruntip" id="teklifuruntip"></td> <br>
                    <th>Paket Tip</th> :  <td>{{ $teklif->teklif_pakettip }}</td> <br>
                    <th>SOP Tarih</th> :           <td>{{ $teklif->teklif_soptarih }}</td> <br>
                    <th>EOP Tarih</th> :      <td>{{ $teklif->teklif_eoptarih }}</td> <br>
                    <th>Hacim</th> : <td>{{ $teklif->teklif_hacim }}</td> <br>
                    <th>Proje Ad</th>   : <td>{{ $teklif->teklif_projead }}</td> <br>
                    <th>Proje Kod</th> :   <td>{{ $teklif->teklif_projekod  }}</td> <br>
                    <th>Finger Lift</th> :      <td>{{ $teklif->teklif_fingerlift }} <input type="hidden" value="{{$teklif->teklif_fingerlift}}" name="tekliffingerlift" id="tekliffingerlift"></td> <br>
                    <th>Finger Lift Uzunluğu</th> :   <td>{{ $teklif->teklif_fingerliftlength }}<input type="hidden" value="{{$teklif->teklif_fingerliftlength}}" name="tekliffingerliftlength" id="tekliffingerliftlength"></td> <br>
                    <th>Liner Change</th> :   <td>{{ $teklif->teklif_linerchange }}</td> <br> 
                    <th>Sandwich</th> :     <td>{{ $teklif->teklif_sandwich }}</td> <br>
                    <th>Urun En</th> :     <td>{{ $teklif->teklif_urunen }} <input type="hidden" id="teklifurunen" name="teklifurunen" value="{{$teklif->teklif_urunen}}"></td> <br>
                    <th>Urun Boy</th> :    <td>{{ $teklif->teklif_urunboy }} <input type="hidden" id="teklifurunboy" name="teklifurunboy" value="{{$teklif->teklif_urunboy}}"></td> <br>
                    <th>Sheet En</th> :    <td>{{ $teklif->teklif_sheeten }}</td> <br>
                    <th>Sheet Boy</th> :   <td>{{ $teklif->teklif_sheetboy }}</td> <br>
               
                  </tr>
                
                
               </p>
        <br>
        <div class="text-muted">
          <p class="text-sm">Firma
            <b class="d-block"><td>{{ $teklif->firma_Ad }}</td></b>
          </p>
          <p class="text-sm">Kişi
            <b class="d-block">{{ $teklif->teklif_kisi }}</b>
          </p>
        </div>

        <h5 class="mt-5 text-muted">Teklif Dosyaları</h5>
        <ul class="list-unstyled">
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>{{ $teklif->teklif_dosya }} </a>
          </li>
        
        </ul>
        @endforeach
      </div>
   
    </div>
    
    </div>
   
    <div class="tab-pane" id="recete">
        <div class="card-header">
        @foreach ($teklifs as $teklif)
                Urun Adı : {{ $teklif->teklif_projead }} <br>
                Urun Kodu : {{ $teklif->teklif_projekod  }} <input type="hidden" value="{{ $teklif->teklif_projekod  }}" id="teklifprojekod">
                
        @endforeach

        </div>
        <div id="receteplus">
            <input type="hidden" name="recetesayi" id="recetesayi" value="1">
                    <div class="row">
                        <div class="col-2">
                            Tur
                        </div>
                        <div class="col-2">
                            Makine
                        </div>
                        <div class="col-2">
                            Urun
                        </div>
                        <div class="col-2">
                            Oran
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                             <div id="recetehammadde1turdiv"></div>   
                        </div>
                        <div class="col-2">
                            <div id="recetehammadde1makinediv"></div>
                        </div>
                        <div class="col-2">
                            <div id="recetehammadde1urundiv"></div>
                        </div>
                        <div class="col-2">
                            <div id="recetehammadde1orandiv"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                             <div id="recetedilimturdiv"></div>   
                        </div>
                        <div class="col-2">
                            <div id="recetedilimmakinediv"></div>
                        </div>
                        <div class="col-2">
                            <div id="recetedilimurundiv"></div>
                        </div>
                        <div class="col-2">
                            <div id="recetedilimorandiv"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                             <div id="recetefingerliftturdiv"></div>   
                        </div>
                        <div class="col-2">
                            <div id="recetefingerliftmakinediv"></div>
                        </div>
                        <div class="col-2">
                            <div id="recetefingerlifturundiv"></div>
                        </div>
                        <div class="col-2">
                            <div id="recetefingerliftorandiv"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                             <div id="recetesiralikesimturdiv"></div>   
                        </div>
                        <div class="col-2">
                            <div id="recetesiralikesimmakinediv"></div>
                        </div>
                        <div class="col-2">
                            <div id="recetesiralikesimurundiv"></div>
                        </div>
                        <div class="col-2">
                            <div id="recetesiralikesimorandiv"></div>
                        </div>
                    </div>
                  
        
                    </div>
          
             
       
    </div>
    <div class="tab-pane" id="processes">
       
        <input type="hidden" value="0" id="processsayi" name="processsayi">
       
       
            <div id="processler" >
                <div class="row">
                    
                <div class="col-2">
                <label for="">Process</label>
                            <select name="processname" id="processname" class="form-control">
                          
                                <option value="">Process Seç</option>
                                <option value="Dilimleme">Dilimleme</option>
                                <option value="Aktarma">Aktarma</option>
                                <option value="Laminasyon">Laminasyon</option>
                                <option value="Pres">Pres</option>
                                <option value="Lazer">Lazer</option>
                                <option value="Otomotik Pres">Otomotik Pres</option>
                                <option value="Sıralı Kesim">Sıralı Kesim</option>
                                <option value="Vargel">Vargel</option>
                                <option value="Rotari">Rotari</option>
                                <option value="Sıcak Pres">Sıcak Pres</option>
                                <option value="Paketleme">Paketleme</option>                                
                             </select>
                             </div>
                        
                             <div class="col-2">
                             <label for="">Makine</label>
                            <select name="processmakine" id="processmakine" class="form-control">
                          
                                 <option value="">Makine Seç</option>
                                 @foreach ($machines as $machine)
                                 <option value="{{ $machine->makine_ad }}">{{ $machine->makine_ad }} </option>
                                 @endforeach
                            
                             </select>
                             </div>
                            
                             <div class="col-1">
                             <label for="">Setup Adam</label>
                                     <input type="number" class="form-control" name="processadamsetup" id="processadamsetup" >    </div>
                                     <div class="col-1">
                             <label for="">Setup Sure(dk)</label>
                                     <input type="number" class="form-control" name="processadamsetup" id="processsuresetup" >    </div>
                             
                             <div class="col-1">
                             <label for="">Adam</label>
                                     <input type="number" class="form-control" name="processadam" id="processadam" >    </div>
                                    
                             <div class="col-1">
                             <label for="">Sure(dk)</label>
                                     <input type="number" class="form-control" name="processsure" id="processsure" >    </div>
                                   
                                    
                                     <div class="col-2">
                                     <label for="">Urun</label>
                                     <select name="processurun" id="processurun" class="form-control">
                          
                          <option value="">Urun Seç</option>
                          @foreach ($products as $product)
                          <option value="{{ $product->urun_Ad }}">{{ $product->urun_Ad }} </option>
                          @endforeach
                     
                      </select>
                                     
                                     </div>
                                    
                                     <div class="col-1">
                                     <label for="">Urun Miktar</label>
                             
                                     <input type="number" class="form-control" name="processurunmiktar" id="processurunmiktar">
                                     
                                     </div>
                                     <div class="col-1">
                                       
                                     <button class="btn btn-success" onclick="ADDprocess()">+</button>
                                     </div>
                                     </div>
                                     
                                     <br>
                                     <br>
                                <div id="ebatlamadiv">
                                    <label for="">Ebatlama Processleri</label>
                                    <input type="hidden" value="1" name="ebatsiraid" id="ebatsiraid">
                                    <button id="ebatlabtn" onclick="ebatla()">Ebatla</button>
                                    <div class="row">
                                    <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>
                                        <div class="col-2">
                                            Process
                                        </div>
                                        <div class="col-2">
                                            Makine
                                        </div>
                                        <div class="col-1">
                                            Setup Adam
                                        </div>
                                        <div class="col-1">
                                           Setup Sure(dk)
                                        </div>
                                        <div class="col-1">
                                            Adam
                                        </div>
                                        <div class="col-1">
                                            Sure(dk)
                                        </div>
                                        <div class="col-2">
                                            Çıkan Ürün
                                        </div>
                                        <div class="col-1">
                                      
                                        </div>
                                    </div>
                                  
                                 
                                </div>
                                
                                <br>
                                <br>
                                <div id="processplus">

                                    <div class="row">
                                        <div class="col-2">
                                                Process
                                        </div>
                                        <div class="col-2">
                                            Makine
                                        </div>
                                        <div class="col-1">
                                            Setup Adam
                                        </div>
                                        <div class="col-1">
                                           Setup Sure(dk)
                                        </div>
                                        <div class="col-1">
                                            Adam
                                        </div>
                                        <div class="col-1">
                                            Sure(dk)
                                        </div>
                                        <div class="col-2">
                                            Urun
                                        </div>
                                        <div class="col-1">
                                            Urun Miktar
                                        </div>

                                    </div>
                                

                                </div>
                            
              
            </div>
  

        </div>
        <div class="tab-pane" id="calis">
          <div class="row">
            <input type="hidden" id="processworksayi" name="processworksayi" value="0">
            <div class="col-2">
              <label for="">Process</label>
              <select name="processwork" id="processwork" class="form-control">
                <option value="">Prosses Seç</option>
                @foreach($processs as $process)
                <option value="{{$process->process_ID}}">{{$process->process_ad}}</option>
                @endforeach
              </select>
            </div>

            <div class="col-2">
              <label for="">Makine</label>
              <select name="makinework" id="makinework" class="form-control">
                <option value="">Makine Seç</option>
                @foreach($machines as $makine)
                <option value="{{$makine->makine_tip}}">{{$makine->makine_tip}}</option>
                @endforeach
              </select>
            </div>

            <div class="col" >
              <label for="">Setup Adam</label>
            <input type="number" name="setupadamwork" class="form-control" id="setupadamwork" >  
            </div>

            
            <div class="col">
            <label for="">Setup Sure</label>
            <input type="number" name="setupsurework" class="form-control" id="setupsurework">  
            </div>

            <div class="col">
              <label for="">Process Adam</label>
            <input type="number" name="processadamwork" class="form-control" id="processadamwork">  
            </div>

            <div class="col" >
              <label for="">Process Sure</label>
            <input type="number" name="processsurework" class="form-control" id="processsurework">  
            </div>

            <div class="col-2">
              <input type="hidden" id="processgirenurunworksayi" name="processgirenurunworksayi" value="0">
              <label for="">Giren Ürünler</label>
              <div id="girenurunlerworks">
                <select name="processgirenurunwork0" id="processgirenurunwork0" class="form-control">
                  <option value="">Urun Seç</option>
                  @foreach($products as $product)
                  <option value="{{$product->urun_ID}}">{{$product->urun_Ad}}</option>
                  @endforeach
                </select>
              </div>
              <button class="btn btn-success" onclick="workurunekle()">+</button>
            </div>

            <div class="col-1">
              <div id="miktarworks">
              <label for="">Miktar</label>
              <input type="float" class="form-control" name="miktarwork0" id="miktarwork0">
              </div>
            </div>

            &emsp;&emsp;&emsp;

            <div class="col-1">
              <label for="">Ekle</label>
              <br>
              <button class="btn btn-success" onclick="workekle()">+</button>
            </div>

           

            

          </div>
          <div class="row" id="works">




          </div>
        </div>
          
    </div>
  
 



</div>

  <!-- /.card-body -->

</div>

<!-- /.card -->

</section>

@endsection