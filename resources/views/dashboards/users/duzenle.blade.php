@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Duzenle')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Duzenle</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">AnaSayfa</a></li>
                <li class="breadcrumb-item active">Duzenle</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
       
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#duzenle" data-toggle="tab">Duzenle</a></li>
                    <li class="nav-item"><a class="nav-link" href="#detay" data-toggle="tab">Detay</a></li>
                    <li class="nav-item"><a class="nav-link" href="#recete" data-toggle="tab">Reçete</a></li>
                   
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="duzenle">
                      <form class="form-horizontal" method="POST" action="{{ route('userUrunUpdate') }}" id="urunduzenleuserForm">
                      @csrf <!-- {{ csrf_field() }} -->
                      
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Urun Adı</label>
                          <div class="col-sm-10">
                            <input type='hidden' value='@foreach ($products2 as $product2) {{ $product2->urun_ID }} @endforeach' name="urunID">
                            <input type="text" class="form-control" id="inputName" placeholder="Urun Adı"  name="urunAd" value="@foreach ($products2 as $product2) {{ $product2->urun_Ad }} @endforeach" required>

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Urun Kodu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Urun Kodu" value="@foreach ($products2 as $product2) {{ $product2->urun_Kod }} @endforeach" name="urunKod" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Urun Olcut</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Urun Olcut" value="@foreach ($products2 as $product2) {{ $product2->urun_Olcut }} @endforeach" name="urunOlcut" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Alis</label>
                            <input type='hidden' value='0' name='urunAlis'>
                            <div class="col-sm-1"> @foreach ($products2 as $product2) <?php   if(($product2->urun_Alis)==1){ ?>
                                <input type="checkbox" class="form-control" id="urunalis" value="1"  name="urunAlis" checked> <?php  }else{ ?>
                                    <input type="checkbox" class="form-control" id="urunalis" value="1"  name="urunAlis">
                               <?php } ?> @endforeach
                              
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>  
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Satis</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='urunSatis'>
                            @foreach ($products2 as $product2) <?php   if(($product2->urun_Satis)==1){ ?>
                                <input type="checkbox" class="form-control" id="urunsatis" value="1"  name="urunSatis" checked> <?php  }else{ ?>
                                    <input type="checkbox" class="form-control" id="urunsatis" value="1"  name="urunSatis">
                               <?php } ?> @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Aktif</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='urunAktif'>
                            @foreach ($products2 as $product2) <?php   if(($product2->urun_Aktif)==1){ ?>
                                <input type="checkbox" class="form-control" id="urunaktif" value="1"  name="urunAktif" checked> <?php  }else{ ?>
                                    <input type="checkbox" class="form-control" id="urunaktif" value="1"  name="urunAktif">
                               <?php } ?> @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Guncelle</button>&emsp;&emsp;&emsp;
                            
                          </div>
                        
                        </div>
                        
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="detay">
                        <form class="form-horizontal" action="{{ route('userAddDetail') }}" method="POST" id="detayUserform">
                        @csrf <!-- {{ csrf_field() }} -->
                        <input type='hidden' value='{{$productID}}' name="urunID">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Urun En</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="urunen" placeholder="En" name="urunEn" value="@foreach ($details as $detail) {{ $detail->urundetay_en }} @endforeach" required>
                              <span class="text-danger error-text oldpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Boy</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="urunboy" placeholder="Boy" value="@foreach ($details as $detail) {{ $detail->urundetay_boy }} @endforeach" name="urunBoy" required>
                              <span class="text-danger error-text newpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Tırnak</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="uruntirnak" placeholder="Tirnak Boyu" value="@foreach ($details as $detail) {{ $detail->urundetay_tirnak }} @endforeach" name="uruntirnak" required>
                              <span class="text-danger error-text newpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Yukseklik</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="urunyukseklik" value="@foreach ($details as $detail) {{ $detail->urundetay_yukseklik }} @endforeach" placeholder="Yukseklik" name="urunYukseklik" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Renk</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="urunrenk" value="@foreach ($details as $detail) {{ $detail->urundetay_renk }} @endforeach" placeholder="Renk" name="urunRenk" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                            
                          </div>
                          
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Koli Miktar</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="urunkolimiktar" placeholder="" value="@foreach ($details as $detail) {{ $detail->urundetay_kolimiktar }} @endforeach" name="urunKolimiktar" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Önem Sınıfı</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="urunonemsinif" placeholder="" value="@foreach ($details as $detail) {{ $detail->urundetay_onemsinif }} @endforeach" name="urunOnemsinif" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Ağırlık Net</label>
                            <div class="col-sm-1">
                              <input type="text" class="form-control" id="urunagirliknet" value="@foreach ($details as $detail) {{ $detail->urundetay_agirliknet }} @endforeach" placeholder="Net" name="urunAgirliknet"  required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Ağırlık Brut</label>
                            <div class="col-sm-1">
                              <input type="text" class="form-control" id="urunagirlikbrut" placeholder="Brut" value="@foreach ($details as $detail) {{ $detail->urundetay_agirlikbrut }} @endforeach" name="urunAgirlikbrut" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                       
                         
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-info">Tamam</button>
                            </div>
                          </div>
                        </form>
                      </div>
       

                      <div class="tab-pane" id="recete">
                      <form class="form-horizontal" method="POST" action="{{ route('userAddRecipe') }}" id="receteForm">
                      @csrf <!-- {{ csrf_field() }} -->
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Urun 1</label>
                          <div class="col-sm-10">
                          
                          
                              <label for="">{{($recipeproduct1)}}</label>
                              <input type="hidden" value="{{($recipeproduct1)}}" name="urun1">
                                
                        

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Process</label>
                          <div class="col-sm-10">
                          <select name="process" id="process"  class="form-control">
                            @foreach ($process as $proces)
                                <option value="{{ $proces->process_ID }}">{{ $proces->process_ad }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Makine</label>
                          <div class="col-sm-10">
                          <select name="makine" id="makine"  class="form-control">
                            @foreach ($makines as $makine)
                                <option value="{{ $makine->makine_tip }}">{{ $makine->makine_ad }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Setup Adam</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputName2" placeholder="Setup Adam Sayısı"  name="setupadam" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Setup Sure (dk)</label>
                            <div class="col-sm-10">
                            <input type="float" class="form-control" id="inputName2" placeholder="Setup Suresi"  name="setupsure" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Process Adam</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputName2" placeholder="Process Adam Sayisi"  name="processadam" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Process Sure (dk)</label>
                            <div class="col-sm-10">
                            <input type="float" class="form-control" id="inputName2" placeholder="Process Suresi"  name="processsure" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Maliyet</label>
                            <div class="col-sm-10">
                            <input type="float" class="form-control" id="inputName2" placeholder="Maliyet"  name="maliyet" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                          </div>
                     
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Ekle</button>
                          </div>
                        </div>
                        
                      </form>
                      <div class="card">
          <table><thead>
              <tr>   
                  <th>Process</th>
                  <th>Makine</th>
                  <th>Setup Adam</th>
                  <th>Setup Sure</th>
                  <th>Process Adam</th>
                  <th>Process Sure</th>
                  <th>Maliyet</th>
                  
                  <th>Giren Urunler</th>
                  <th>Sil</th>
              </tr>
          </thead>
          <tbody>
          
          @foreach ($names as $name)
        
              <tr>
      
           
                <th>{{ $name->process_ad }}</th>
                <th>{{ $name->recete_makine }}</th>
                <th>{{ $name->recete_setupadam }}</th>
                <th>{{ $name->recete_setupsure }}</th>
                <th>{{ $name->recete_processadam }}</th>
                <th>{{ $name->recete_processsure }}</th>
                <th>{{ $name->recete_maliyet}}</th>
                <td><button  data-toggle="modal" 
    data-target="#receteurunModal" class="btn btn-info" onclick ="receteurungoster({{$name->recete_ID}})">Göster</button></td>
                <td><button class="btn btn-danger" onclick="recetesil({{$name->recete_ID}})">Sil</button></td>
                    
              </tr>
              @endforeach
          </tbody>
             
          </table>

                    </div>
                    
                   
                </div><!-- /.card-body -->
                </div>
              <!-- /.card -->
              
      </div>
                                  
                  </div>
                  </div>
            
                  
             </div>     <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  
 
 
      <div class="modal fade" id="receteurunModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              
                                  
                    <div class="form-group row">
                          
                            <select name="inputreceteurunurunid" id="inputreceteurunurunid" class="form-control" required>
                              <option value="">Giren Urun Seç</option>
                              @foreach ($products as $product)
                              <option value="{{$product->urun_ID}}">{{$product->urun_Ad}}</option>
                              @endforeach
                            </select>
                            <input type="number" id="inputoranid" placeholder="Oran" class="form-control">
                            <input type="number" id="inputfireid" placeholder="Fire" class="form-control">
                         
                      </div> 
                    <div class="form-group row">
                      <input type="hidden" id="inputreceteurunreceteid">
                        
                     <table>
                       <thead>
                         <th>Giren Urunler</th>
                         <th>Oran</th>
                         <th>Fire</th>
                       </thead>
                       <tbody id ="receteuruntable">

                       </tbody>
                         
                       
                     </table>
                    </div>   
                     

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button  id="receteurunbutton" onclick="receteurunekle()" class="btn btn-primary">
                               Ekle
                            </button>

                        </div>
                    </div>
              
            </div>
        </div>
    </div>
</div>

      

@endsection