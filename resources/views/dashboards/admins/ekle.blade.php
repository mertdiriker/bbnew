@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Ekle')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Ekle</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">AnaSayfa</a></li>
                <li class="breadcrumb-item active">Ekle</li>
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
                    <li class="nav-item"><a class="nav-link active" href="#urun_ekle" data-toggle="tab">Urun Ekle</a></li>
                    <li class="nav-item"><a class="nav-link" href="#firma_ekle" data-toggle="tab">Firma Ekle</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="urun_ekle">
                      <form class="form-horizontal" method="POST" action="{{ route('adminAddProduct') }}" id="urunekleAdminForm">
                      @csrf <!-- {{ csrf_field() }} -->
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Urun Adı</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Urun Adı"  name="urunAd" required>

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Urun Kodu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Urun Kodu"  name="urunKod" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Urun Olcut</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Urun Olcut"  name="urunOlcut" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Alis</label>
                            <div class="col-sm-1">
                              <input type="checkbox" class="form-control" id="urunalis" value="1" name="urunAlis">
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Satis</label>
                            <div class="col-sm-1">
                              <input type="checkbox" class="form-control" id="urunsatis" value="1" name="urunSatis">
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Urun Aktif</label>
                            <div class="col-sm-1">
                              <input type="checkbox" class="form-control" id="urunaktif" value="1" name="urunAktif">
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Ekle</button>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="firma_ekle">
                        <form class="form-horizontal" action="{{ route('adminAddFirm') }}" method="POST" id="firmaekleAdminForm">
                        @csrf <!-- {{ csrf_field() }} -->
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Firma Adı</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="firmaad" placeholder="Firma Adı" name="firmaAd" required>
                              <span class="text-danger error-text oldpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Kodu</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="firmakod" placeholder="Firma Kodu" name="firmaKod" required>
                              <span class="text-danger error-text newpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Adresi</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="firmaadres" placeholder="Firma Adresi" name="firmaAdres" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Vergi No</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="firmavno" placeholder="Firma Vergi No" name="firmaVno" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Tedarikci</label>
                            <div class="col-sm-1">
                              <input type="checkbox" class="form-control" id="firmatedarik" value="1" name="firmaTedarik" >
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Musteri</label>
                            <div class="col-sm-1">
                              <input type="checkbox" class="form-control" id="firmamusteri" value="1" name="firmaMusteri" >
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Aktif</label>
                            <div class="col-sm-1">
                              <input type="checkbox" class="form-control" id="firmaaktif" value="1" name="firmaAktif">
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Ekle</button>
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>
                  <!-- /.tab-content -->
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