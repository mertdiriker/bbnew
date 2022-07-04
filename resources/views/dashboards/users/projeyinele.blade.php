@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Yinele')

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
                <li class="breadcrumb-item active">Yinele</li>
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
                  Proje
                  
                   
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="duzenle">
                      <form class="form-horizontal" method="POST" action="{{ route('userProjeUpdate') }}" id="projeduzenleuserForm">
                      @csrf <!-- {{ csrf_field() }} -->
                      <input type="hidden" name="projectID" value="@foreach ($projects as $project) {{ $project->proje_ID }} @endforeach">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Proje Tur</label>
                            <div class="col-sm-10"> 
                          <select name="projetur" id="projetur" class="form-control">
                            <option value="@foreach ($projects as $project) {{ $project->proje_tur }} @endforeach">@foreach ($projects as $project) {{ $project->proje_tur }} @endforeach</option>
                            <option value="PD">PD</option>
                            <option value="PR">PR</option>
                          </select>
                          </div>
                        </div>  
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Proje Tanım</label>
                            <div class="col-sm-10"> 
                          <input type="text" name="projectname" class="form-control" value="@foreach ($projects as $project) {{ $project->proje_tanim }} @endforeach">
                          </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">PO</label>
                            <div class="col-sm-10"> 
                          <input type="text" name="po" class="form-control" value="@foreach ($projects as $project) {{ $project->proje_po }} @endforeach">
                          </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Proje Kodu</label>
                            <div class="col-sm-10"> 
                          <input type="text" name="projectcode" class="form-control" value="@foreach ($projects as $project) {{ $project->proje_kod }} @endforeach">
                          </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">BR Kodu</label>
                            <div class="col-sm-10"> 
                          <input type="text" name="brcode" class="form-control" value="@foreach ($projects as $project) {{ $project->proje_br }} @endforeach">
                          </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Seri Kodu</label>
                            <div class="col-sm-10"> 
                          <input type="text" name="sericode" class="form-control" value="@foreach ($projects as $project) {{ $project->proje_seri }} @endforeach">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Musteri</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" value="@foreach ($projects as $project) {{ $project->proje_musteri }} @endforeach" name="customer" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Hammadde1</label>
                          <div class="col-sm-10">
                            <select name="hammadde1" id="" class="form-control">
                              <option value="@foreach ($projects as $project) {{ $project->proje_hammadde1 }} @endforeach">@foreach ($projects as $project) {{ $project->proje_hammadde1 }} @endforeach</option>
                              @foreach($products as $product)
                              <option value="{{$product->urun_ID}}">{{$product->urun_Ad}}</option>
                              @endforeach

                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Hammadde1-Miktar</label>
                          <div class="col-sm-10">
                            <input type="float" class="form-control" value="@foreach($projects as $project){{$project->proje_hammadde1miktar}}@endforeach" name="kullanimmiktar1" >
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Hammadde2</label>
                          <div class="col-sm-10">
                            <select name="hammadde2" id="" class="form-control">
                              <option value="@foreach ($projects as $project) {{ $project->proje_hammadde2 }} @endforeach">@foreach ($projects as $project) {{ $project->proje_hammadde2 }} @endforeach</option>
                              @foreach($products as $product)
                              <option value="{{$product->urun_ID}}">{{$product->urun_Ad}}</option>
                              @endforeach

                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Hammadde2-Miktar</label>
                          <div class="col-sm-10">
                            <input type="float" class="form-control" value="@foreach ($projects as $project) {{ $project->proje_hammadde2miktar }} @endforeach" name="kullanimmiktar2" >
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Hammadde3</label>
                          <div class="col-sm-10">
                            <select name="hammadde3" id="" class="form-control">
                              <option value="@foreach ($projects as $project) {{ $project->proje_hammadde3 }} @endforeach">@foreach ($projects as $project) {{ $project->proje_hammadde2 }} @endforeach</option>
                              @foreach($products as $product)
                              <option value="{{$product->urun_ID}}">{{$product->urun_Ad}}</option>
                              @endforeach

                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Hammadde3-Miktar</label>
                          <div class="col-sm-10">
                            <input type="float" class="form-control" value="@foreach ($projects as $project) {{ $project->proje_hammadde3miktar }} @endforeach" name="kullanimmiktar3" >
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Adet</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" onchange="pofiyat()" id="adet" value="@foreach ($projects as $project) {{ $project->proje_adet }} @endforeach" name="adet" >
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Talep Tarih</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" value="@foreach($projects as $project){{$project->proje_taleptarih}}@endforeach" name="taleptarih" >
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Gonderim Tarih</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" value="@foreach($projects as $project){{$project->proje_gonderimtarih}}@endforeach" name="gonderimtarih" >
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Proje Fiyat</label>
                          <div class="col-sm-10">
                            <input type="float" class="form-control" value="@foreach($projects as $project){{$project->proje_fiyat}}@endforeach" name="projefiyat" >
                            <select name="fiyatkur" id="" class="form-control">
                              @foreach ($projects as $project)
                              <option value="{{$project->proje_fiyatkur}}">{{$project->proje_fiyatkur}}</option>
                              @endforeach
                              <option value="TL">TL</option>
                              <option value="Euro">Euro</option>
                              <option value="Dolar">Dolar</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Fatura Br.Fyt.</label>
                          <div class="col-sm-10">
                            <input type="float" class="form-control" value="@foreach($projects as $project){{$project->proje_faturafiyat}}@endforeach" id="faturafiyat" name="faturafiyat" >
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Fatura Tplm.Fyt.</label>
                          <div class="col-sm-10">
                            <input type="float" class="form-control" value="@foreach($projects as $project){{$project->proje_toplamfiyat}}@endforeach" name="faturafiyattoplam" >
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                          
                          
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                              <input type="hidden" name="yeni" value="1">
                            <button type="submit" class="btn btn-success">Yeni Proje Olarak Kaydet</button>&emsp;&emsp;&emsp;

                           
                            
                          </div>
                        
                        </div>
                        
                      </form>
   
                    </div>
                    <!-- /.tab-pane -->
                    
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