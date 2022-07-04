@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Duzenle')

@section('content')
<div class="card-body">
                  <div class="tab-content">
<form class="form-horizontal" action="{{route('UpdateFirm')}}" method="POST" id="firmaekleuserForm">
                        @csrf <!-- {{ csrf_field() }} -->
                        <input type="hidden" value="@foreach($firminfos as $firminfo){{$firminfo->firma_ID}}@endforeach" name="firmID">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Firma Adı</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="firmaad" placeholder="Firma Adı" name="firmaAd" value="@foreach($firminfos as $firminfo){{$firminfo->firma_Ad}}@endforeach" required>
                              <span class="text-danger error-text oldpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Kodu</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="firmakod" placeholder="Firma Kodu" name="firmaKod" value="@foreach($firminfos as $firminfo){{$firminfo->firma_Kod}}@endforeach" required>
                              <span class="text-danger error-text newpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Adresi</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="firmaadres" placeholder="Firma Adresi" name="firmaAdres" value="@foreach($firminfos as $firminfo){{$firminfo->firma_Adres}}@endforeach" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Vergi No</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="firmavno" placeholder="Firma Vergi No" name="firmaVno" value="@foreach($firminfos as $firminfo){{$firminfo->firma_Vno}}@endforeach" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Yetkili</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="firmayetkili" placeholder="Firma Yetkili" name="firmayetkili" value="@foreach($firminfos as $firminfo){{$firminfo->firma_yetkiliad}}@endforeach" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma İletişim</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="firmailetisim" placeholder="Firma İletisim" name="firmailetisim" value="@foreach($firminfos as $firminfo){{$firminfo->firma_iletisim}}@endforeach" required>
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Tedarikci</label>
                            <div class="col-sm-1">
                            @foreach ($firminfos as $firminfo)
                                @if(($firminfo->firma_Tedarik)=="1")
                               
                              <input type="checkbox" class="form-control" id="firmatedarik" value="1" name="firmaTedarik" checked >
                              @else
                              <input type="checkbox" class="form-control" id="firmatedarik" value="1" name="firmaTedarik"  >
                              @endif
                              @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Musteri</label>
                            <div class="col-sm-1">
                            @foreach ($firminfos as $firminfo)
                                @if(($firminfo->firma_Musteri)=="1")
                              <input type="checkbox" class="form-control" id="firmamusteri" value="1" name="firmaMusteri" checked >
                              @else
                              <input type="checkbox" class="form-control" id="firmamusteri" value="1" name="firmaMusteri" >
                              @endif
                              @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Firma Aktif</label>
                            <div class="col-sm-1">
                            @foreach ($firminfos as $firminfo)
                                @if(($firminfo->firma_Aktif)=="1")
                              <input type="checkbox" class="form-control" id="firmaaktif" value="1" name="firmaAktif" checked>
                              @else
                              <input type="checkbox" class="form-control" id="firmaaktif" value="1" name="firmaAktif">
                              @endif
                              @endforeach
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-info">Guncelle</button>
                            </div>
                          </div>
                        </form>
</div></div>
                    @endsection