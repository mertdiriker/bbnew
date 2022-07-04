@extends('dashboards.users.layouts.user-dash-layout')
@section('title','TeklifDuzenle')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Teklif Duzenle</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">AnaSayfa</a></li>
                <li class="breadcrumb-item active">TeklifDuzenle</li>
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
                      <form class="form-horizontal" method="POST" action="{{ route('userTeklifUpdate') }}" id="teklifduzenleuserForm">
                      @csrf <!-- {{ csrf_field() }} -->
                      <input type="hidden" name="teklifID" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_ID }} @endforeach">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Firma</label>
                          <div class="col-sm-10">
                       <select name="firma" id="firma" class="form-control">
                         <option value="@foreach ($teklifs as $teklif) {{ $teklif->firma_ID }} @endforeach">@foreach ($teklifs as $teklif) {{ $teklif->firma_Ad }} @endforeach</option>
                         @foreach ($firms as $firm)
                         <option value="{{ $firm->firma_ID }}">{{ $firm->firma_Ad }}</option>
                         @endforeach
                       
                       </select>
                           

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Hammadde</label>
                          <div class="col-sm-10">
                           <select name="hammadde" id="hammadde"  class="form-control">
                             <option value="@foreach ($teklifs as $teklif) {{ $teklif->urun_ID }} @endforeach">@foreach ($teklifs as $teklif) {{ $teklif->urun_Ad }} @endforeach</option>
                             @foreach ($products as $product)
                             <option value="{{ $product->urun_ID }}">{{ $product->urun_Ad }}</option>
                             @endforeach
                           </select>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Hammadde 2</label>
                          <div class="col-sm-10">
                          <select name="hammadde2" id="hammadde2"  class="form-control">
                             <option value="@foreach ($teklifs as $teklif) {{ $teklif->S1_ID }} @endforeach">@foreach ($teklifs as $teklif) {{ $teklif->S1 }} @endforeach</option>
                             <option value="0">YOK</option>
                             @foreach ($products as $product)
                             <option value="{{ $product->urun_ID }}">{{ $product->urun_Ad }}</option>
                             @endforeach
                           </select>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Figur</label>
                          <div class="col-sm-10">
                           <select name="figur" id="figur" class="form-control">
                               <option value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_figur }} @endforeach">@foreach ($teklifs as $teklif) {{ $teklif->teklif_figur }} @endforeach</option>
                               <option value="Drawing">Drawing</option>
                               <option value="Logo">Logo</option>
                               <option value="Square">Square</option>
                           </select>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Single Or Combine</label>
                          <div class="col-sm-10">
                           <select name="singleorcombine" id="singleorcombine" class="form-control">
                               <option value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_singleorcombine }} @endforeach">@foreach ($teklifs as $teklif) {{ $teklif->teklif_singleorcombine }} @endforeach</option>
                               <option value="Single">Single</option>
                               <option value="Combine">Combine</option>
                           </select>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Tip</label>
                          <div class="col-sm-10">
                           <select name="tip" id="tip" class="form-control">
                               <option value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_uruntip }} @endforeach">@foreach ($teklifs as $teklif) {{ $teklif->teklif_uruntip }} @endforeach</option>
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
                          <label for="inputName2" class="col-sm-2 col-form-label">Paket Tip</label>
                          <div class="col-sm-10">
                           <select name="pakettip" id="pakettip" class="form-control">
                               <option value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_pakettip }} @endforeach">@foreach ($teklifs as $teklif) {{ $teklif->teklif_pakettip }} @endforeach</option>
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
                            <input type="text" class="form-control" id="soptarih" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_soptarih }} @endforeach" name="soptarih" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">EOP Tarih</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="eoptarih" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_eoptarih }} @endforeach" name="eoptarih" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Hacim</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="hacim" placeholder="Hacim" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_hacim }} @endforeach" name="hacim" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Proje Ad</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="projead" placeholder="Proje Ad" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_projead }} @endforeach" name="projead" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Proje Kod</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="projekod" placeholder="Proje Kod" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_projekod }} @endforeach" name="projekod" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">FingerLift</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='fingerlift'>
                            @foreach ($teklifs as $teklif)    @if(($teklif->teklif_fingerlift)==1)
                                <input type="checkbox" class="form-control" id="fingerlift" value="1"  name="fingerlift" checked>
                                @else    <input type="checkbox" class="form-control" id="fingerlift" value="1"  name="fingerlift">
                               @endif @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                     
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">LinerChange</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='linerchange'>
                            @foreach ($teklifs as $teklif) @if(($teklif->teklif_linerchange)==1)
                                <input type="checkbox" class="form-control" id="linerchange" value="1"  name="linerchange" checked>
                                @else
                                    <input type="checkbox" class="form-control" id="linerchange" value="1"  name="linerchange">
                               @endif @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Sandwich</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='sandwich'>
                            @foreach ($teklifs as $teklif)  @if(($teklif->teklif_sandwich)==1)
                                <input type="checkbox" class="form-control" id="sandwich" value="1"  name="sandwich" checked>
                                @else
                                    <input type="checkbox" class="form-control" id="sandwich" value="1"  name="sandwich">
                               @endif @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Hottrim</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='hottrim'>
                            @foreach ($teklifs as $teklif)  @if(($teklif->teklif_hottrim)==1)
                                <input type="checkbox" class="form-control" id="hottrim" value="1"  name="hottrim" checked>
                                @else
                                    <input type="checkbox" class="form-control" id="hottrim" value="1"  name="hottrim">
                               @endif @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Plaincut</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='plaincut'>
                            @foreach ($teklifs as $teklif)  @if(($teklif->teklif_plaincut)==1)
                                <input type="checkbox" class="form-control" id="plaincut" value="1"  name="plaincut" checked>
                                @else
                                    <input type="checkbox" class="form-control" id="plaincut" value="1"  name="plaincut">
                               @endif @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">EdgeSeal</label>
                            <div class="col-sm-1">
                            <input type='hidden' value='0' name='edgeseal'>
                            @foreach ($teklifs as $teklif)  @if(($teklif->teklif_edgeseal)==1)
                                <input type="checkbox" class="form-control" id="edgeseal" value="1"  name="edgeseal" checked>
                                @else
                                    <input type="checkbox" class="form-control" id="edgeseal" value="1"  name="edgeseal">
                               @endif @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Urun En</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="urunen" placeholder="Urun En" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_urunen }} @endforeach" name="urunen" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Urun Boy</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="urunboy" placeholder="Urun Boy" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_urunboy }} @endforeach" name="urunboy" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">FingerLiftLength</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="fingerliftlength" placeholder="Finger Lift Length" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_fingerliftlength }} @endforeach" name="fingerliftlength" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Sheet En</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="sheeten" placeholder="Sheet En" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_sheeten }} @endforeach" name="sheeten" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Sheet Boy</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="sheetboy" placeholder="Sheet Boy" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_sheetboy }} @endforeach" name="sheetboy" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Sheet Space</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="sheetspace" placeholder="Sheet Space" value="@foreach ($teklifs as $teklif) {{ $teklif->teklif_sheetspace }} @endforeach" name="sheetspace" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Guncelle</button>&emsp;&emsp;&emsp;
                            
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