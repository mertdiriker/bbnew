@extends('dashboards.clients.layouts.client-dash-layout')
@section('title','TeklifDuzenle')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Hizli Teklif</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">AnaSayfa</a></li>
                <li class="breadcrumb-item active">Hizli Teklif</li>
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
                 
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="duzenle">
                      <form class="form-horizontal" method="POST" action="{{ route('clientTeklifHizli') }}" onsubmit="return validateForm()" name="hizliteklifform"id="teklifduzenleuserForm" enctype="multipart/form-data">
                      @csrf <!-- {{ csrf_field() }} -->
                    <input type="hidden" value="Hızlı" name="tekliftip">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Firma</label>
                          <div class="col-sm-10">
                       <select name="firma" id="firma" class="form-control">
                   
                         @foreach ($firms as $firm)
                         <option value="{{ $firm->firma_ID }}">{{ $firm->firma_Ad }}</option>
                         @endforeach
                       
                       </select>
                           

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Figur</label>
                          <div class="col-sm-10">
                           <select name="figur" id="figur" class="form-control" onchange="figur1()">
                               <option value=""></option>
                               <option value="Drawing">Drawing</option>
                               <option value="Logo">Logo</option>
                               <option value="Square">Square</option>
                           </select>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Tip</label>
                          <div class="col-sm-10">
                           <select name="tip" id="tip" class="form-control" onchange="figur1()">
                               <option value=""></option>
                               <option value="AFT">AFT</option>
                               <option value="Thinsulate">Thinsulate</option>
                               <option value="Duallock">Duallock</option>
                               <option value="Transfer Tape">Transfer Tape</option>
                               <option value="One Sided Tape">One Sided Tape</option>
                               <option value="AFT+AFT">AFT+AFT</option>
                               <option value="Thinsulate+TransferTape">Thinsulate+TransferTape</option>
                               <option value="Duallock+Duallock">Duallock+Duallock</option>
                           </select>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Hammadde</label>
                          <div class="col-sm-10">
                           <select name="hammadde" id="hammadde"  class="form-control">
                             <option value=""></option>
                             @foreach ($products as $product)
                             <option value="{{ $product->urun_ID }}">{{ $product->urun_Ad }}</option>
                             @endforeach
                           </select>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                      
                        <div class="form-group row" >
                       
                          <label for="inputName2" class="col-sm-2 col-form-label">Hammadde 2</label>
                          <div class="col-sm-10" id="hammadde2div">
                          <select name="hammadde2" id="hammadde2"  class="form-control">
                             <option value="119"></option>
                             <option value="119">YOK</option>
                             @foreach ($products as $product)
                             <option value="{{ $product->urun_ID }}">{{ $product->urun_Ad }}</option>
                             @endforeach
                           </select>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        
                        </div>
                        
                        <div class="form-group row" style="display:none">
                          <label for="inputName2" class="col-sm-2 col-form-label">Single Or Combine</label>
                          <div class="col-sm-10" >
                           <select name="singleorcombine" id="singleorcombine" class="form-control">
                               <option value=""></option>
                               <option value="Single">Single</option>
                               <option value="Combine">Combine</option>
                           </select>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
              
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Paket Tip</label>
                          <div class="col-sm-10">
                           <select name="pakettip" id="pakettip" class="form-control" onchange="figur1()">
                               <option value=""></option>
                               <option value="Single Part">Single Part</option>
                               <option value="Part On Sheet">Part On Sheet</option>
                               <option value="Part On Roll">Part On Roll</option>
                           </select>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">SOP Tarih</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="soptarih" value="" name="soptarih" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">EOP Tarih</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="eoptarih" value="" name="eoptarih" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Hacim</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="hacim" placeholder="Hacim" value="" name="hacim" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Proje Ad</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="projead" placeholder="Proje Ad" value="" name="projead" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Proje Kod</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="projekod" placeholder="Proje Kod" value="" name="projekod" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div id="normalshow">
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">FingerLift</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='fingerlift'>
                          
                            
                             <input type="checkbox" class="form-control" id="fingerlift" value="1"  name="fingerlift">
                              
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                     
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">LinerChange</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='linerchange'>
                           
                               
                           
                                    <input type="checkbox" class="form-control" id="linerchange" value="1"  name="linerchange">
                          
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          </div>
                          <div id="sandwichshow" style="display:none">
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Sandwich</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='sandwich'>
                           
                              
                          
                              <input type="checkbox" class="form-control" id="sandwich" value="1"  name="sandwich">
                            
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                            </div>
                          </div>
                          <div id="thinsulateshow" style="display:none">
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Hottrim</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='hottrim'>
                   
                    
                                    <input type="checkbox" class="form-control" id="hottrim" value="1"  name="hottrim">
                 
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Plaincut</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='plaincut'>
                  
                                    <input type="checkbox" class="form-control" id="plaincut" value="1"  name="plaincut">
                        
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">EdgeSeal</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='edgeseal'>
                         
                                    <input type="checkbox" class="form-control" id="edgeseal" value="1"  name="edgeseal">
                            
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Urun En</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="urunen" placeholder="Urun En" value="" name="urunen" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Urun Boy</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="urunboy" placeholder="Urun Boy" value="" name="urunboy" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">FingerLiftLength</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="fingerliftlength" placeholder="Finger Lift Length" value="" name="fingerliftlength" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div id="sheetshow" style="display:none">
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Sheet En</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="sheeten" placeholder="Sheet En" value="" name="sheeten" >
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Sheet Boy</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="sheetboy" placeholder="Sheet Boy" value="" name="sheetboy" >
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Sheet Space</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="sheetspace" placeholder="Sheet Space" value="" name="sheetspace" >
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">File</label>
                          <div class="offset-sm-2 col-sm-10">
                 
                        <input type="file" name="file" class="form-control" style="width:250px;">
                        <br>
              <br>
                        <button type="submit" class="btn btn-success">Oluştur</button>&emsp;&emsp;&emsp;
                      </div></div>
						 
                    
                            
                            
                          </div>
                        
                        </div>
                        
                      </form>
                    </div>
                    
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

@endsection