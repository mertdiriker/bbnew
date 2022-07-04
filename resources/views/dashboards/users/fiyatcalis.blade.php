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
                    <li class="nav-item"><a class="nav-link" href="#recete" data-toggle="tab">Recete</a></li>
                   
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
                <input type="hidden" value="600" id="hammadde1en" name="hammadde1en"> <input type="hidden" value="66000" id="hammadde1boy" name="hammadde1boy"> 
                  Urun 1 : 600mm x 66000mm
                  </div>
                  <div>
                <input type="hidden" value="600" id="hammadde2en" name="hammadde2en"> <input type="hidden" value="66000" id="hammadde2boy" name="hammadde2boy"> 
                  Urun 2 : 600mm x 66000mm
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
                <span class="info-box-text text-center text-muted">Çıkan Adet 2.Ürün</span>
                <span class="info-box-number text-center text-muted mb-0">  
                  <div id="cikanadet2div" name="cikanadet2div"> </div> <input type="hidden" value="" id="cikanadet2">
                  <div id="cikantabaka2div" name="cikantabaka2div"></div> <input type="hidden" value="" id="cikantabaka2">
                  <div id="cikanurun2div" name="cikanurun2div"></div>  <input type="hidden" value="" id="cikanurun2">
                  </span>
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
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">2. Ürün(m2)</span>
                <span class="info-box-number text-center text-muted mb-0">
                <div id="hammadde2m2div" name="hammadde2m2div"> </div> <input type="hidden" value="" id="hammadde2m2">
                <div id="urun2m2div" name="urun2m2div"> </div> <input type="hidden" value="" id="urun2m2">
             
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
                <span class="info-box-text text-center text-muted" >Verimlilik 2.Ürün(%)</span>
                <span class="info-box-number text-center text-muted mb-0">
                <div id="toplamurun2div" name="toplamurun2div"> </div> <input type="hidden" value="" id="toplamurun2">
                <div id="toplamfire2div" name="toplamfire2div"> </div> <input type="hidden" value="" id="toplamfire2">
                <div id="urun2verimlilikdiv" name="urun2verimlilikdiv"> </div> <input type="hidden" value="" id="urun2verimlilik">
                </span>
              </div>
            </div>
          </div>
        </div>

       

        <div class="row">
          <div class="col-12">
            <form action=""><label for="">Kalıp 1</label>
              <div class="row"> <br>
              <div class="col-2">
              <label for="">Kalıp En</label>
            <input type="text" class="form-control" id="kalip1en" value="50" onchange="fiyatcalis()">
            </div>
            <div class="col-2">
            <label for="">Kalıp Boy</label>
            <input type="text" class="form-control" id="kalip1boy" value="10" onchange="fiyatcalis()">
            </div>       
            <div class="col-2">
            <label for="">Kalıp Fire</label>
            <input type="text" class="form-control" id="kalip1fire" value="22"  onchange="fiyatcalis()">
            </div> 
            <div class="col-2">
            <label for="">Göz Sayısı</label>
            <input type="text" class="form-control" id="kalip1gozsayisi" value=""  onchange="fiyatcalis()" >
            </div> 
            </div><br>
            <label for="">Kalıp 2</label>
              <div class="row"> <br>
              <div class="col-2">
              <label for="">Kalıp En</label>
            <input type="text" class="form-control" id="kalip2en" value="50" onchange="fiyatcalis()" >
            </div>
            <div class="col-2">
            <label for="">Kalıp Boy</label>
            <input type="text" class="form-control" id="kalip2boy" value="10"  onchange="fiyatcalis()" >
            </div>       
            <div class="col-2">
            <label for="">Kalıp Fire</label>
            <input type="text" class="form-control" id="kalip2fire" value="22"  onchange="fiyatcalis()">
            </div> 
            <div class="col-2">
            <label for="">Göz Sayısı</label>
            <input type="text" class="form-control" id="kalip2gozsayisi" value=""  onchange="fiyatcalis()" >
            </div> 
            </div><br>
            <label for="">Dilim 1.Ürün</label> <br>
            <div class="row">
              
              <div class="col-2">
              <label for="">İlk Fire</label>
              <input type="text" class="form-control" id="dilimilkfire1" value="10"  onchange="fiyatcalis()">
              </div> 
              <div class="col-2">
              <label for="">Son Fire</label>
              <input type="text" class="form-control" id="dilimsonfire1" value="30"  onchange="fiyatcalis()">
              </div> 
            </div> <br>
            <label for="">Dilim 2.Ürün</label> <br>
            <div class="row">
              
              <div class="col-2">
              <label for="">İlk Fire</label>
              <input type="text" class="form-control" id="dilimilkfire2" value="10"  onchange="fiyatcalis()" >
              </div> 
              <div class="col-2">
              <label for="">Son Fire</label>
              <input type="text" class="form-control" id="dilimsonfire2" value="30" onchange="fiyatcalis()">
              </div> 
            </div> <br>
            <label for="">Tabaka 1.Ürün</label> <br>
            <div class="row">
              
              <div class="col-2">
              <label for="">İlk Fire</label>
              <input type="text" class="form-control" id="tabakailkfire1" value="1000" onchange="fiyatcalis()">
              </div> 
              <div class="col-2">
              <label for="">Son Fire</label>
              <input type="text" class="form-control" id="tabakasonfire1" value="1000"  onchange="fiyatcalis()">
              </div> 
            </div> <br>
            <label for="">Tabaka 2.Ürün</label> <br>
            <div class="row">
              
              <div class="col-2">
              <label for="">İlk Fire</label>
              <input type="text" class="form-control" id="tabakailkfire2" value="1000" onchange="fiyatcalis()">
              </div> 
              <div class="col-2">
              <label for="">Son Fire</label>
              <input type="text" class="form-control" id="tabakasonfire2" value="1000"  onchange="fiyatcalis()">
              </div> 
            </div> <br>
            <label for="">Urun 1</label> <br>
            <div class="row">
              
              <div class="col-2">
              <label for="">Ayar Fire</label>
              <input type="text" class="form-control" id="urunayarfire1" value="50" onchange="fiyatcalis()">
              </div> 
              <div class="col-2">
              <label for="">Kontrol Fire</label>
              <input type="text" class="form-control" id="urunkontrolfire1" value="50" onchange="fiyatcalis()">
              </div> 
            </div> <br>
            <label for="">Urun 2</label> <br>
            <div class="row">     
              <div class="col-2">
              <label for="">Ayar Fire</label>
              <input type="text" class="form-control" id="urunayarfire2" value="50" onchange="fiyatcalis()">
              </div> 
              <div class="col-2">
              <label for="">Kontrol Fire</label>
              <input type="text" class="form-control" id="urunkontrolfire2" value="50" onchange="fiyatcalis()">
              </div> 
            </div>
            <br><div style="position: absolute;width: 100%;text-align: center;font-size: 18px;">
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
                   
                    <th>Hammadde</th> :      <td>{{ $teklif->urun_Ad }}</td> <br>
                     <th>Hammadde 2</th> :      <td>{{ $teklif->S1 }}</td> <br>
                    <th>Figur</th>    <td> :{{ $teklif->teklif_figur }}</td> <br>
                    <th>Single/Combine</th> :         <td>{{ $teklif->teklif_singleorcombine }}</td> <br>
                    <th>Tip</th> :  <td>{{ $teklif->teklif_uruntip }}</td> <br>
                    <th>Paket Tip</th> :  <td>{{ $teklif->teklif_pakettip }}</td> <br>
                    <th>SOP Tarih</th> :           <td>{{ $teklif->teklif_soptarih }}</td> <br>
                    <th>EOP Tarih</th> :      <td>{{ $teklif->teklif_eoptarih }}</td> <br>
                    <th>Hacim</th> : <td>{{ $teklif->teklif_hacim }}</td> <br>
                    <th>Proje Ad</th>   : <td>{{ $teklif->teklif_projead }}</td> <br>
                    <th>Proje Kod</th> :   <td>{{ $teklif->teklif_projekod  }}</td> <br>
                    <th>Finger Lift</th> :      <td>{{ $teklif->teklif_fingerlift }}</td> <br>
                    <th>Finger Lift Uzunluğu</th> :   <td>{{ $teklif->teklif_fingerliftlength }}</td> <br>
                    <th>Liner Change</th> :   <td>{{ $teklif->teklif_linerchange }}</td> <br> 
                    <th>Sandwich</th> :     <td>{{ $teklif->teklif_sandwich }}</td> <br>
                    <th>Urun En</th> :     <td>{{ $teklif->teklif_urunen }}</td> <br>
                    <th>Urun Boy</th> :    <td>{{ $teklif->teklif_urunboy }}</td> <br>
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
        
        </ul> @endforeach
  
      </div>
    </div>


  


  </div>
  <div class="tab-pane" id="recete">
  <table><thead>
              <tr>  
                 
                  <th>Urun</th>
                  <th>Oran</th>
                  <th>Fire</th>

              </tr>
          </thead>
          <tbody>
       
              <tr>
                
                <th><div id="urundiv"></div><input type="hidden" name="urun"></th>
                <th><div id="orandiv"></div><input type="hidden" name="oran"></th>
                <th><div id="firediv"></div><input type="hidden" name="fire"></th>
              </tr>
  
          </tbody>
             
          </table>
    </div>





</div>
  <!-- /.card-body -->

</div>
<!-- /.card -->

</section>

@endsection