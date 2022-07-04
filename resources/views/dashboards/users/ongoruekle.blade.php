@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Ongoru')

@section('content')
<div class="card-body">

                      <form class="form-horizontal" method="POST" action="{{ route('userOngoruOlustur') }}">
                      @csrf <!-- {{ csrf_field() }} -->
                      <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Firma</label>
                          <div class="col-sm-10">
                         <select name="firm" id="firm" class="form-control">
                             <option value="">Firma Seç</option>
                             @foreach ($firms as $firm)
                             <option value="{{ $firm->firma_ID }}">{{ $firm->firma_Ad }}</option>
                             @endforeach
                         </select>

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Urun</label>
                          <div class="col-sm-10">
                         <select name="urun" id="urun" class="form-control">
                             <option value="">Urun Seç</option>
                             @foreach ($products as $product)
                             <option value="{{ $product->urun_Kod }}">{{ $product->urun_Ad }}</option>
                             @endforeach
                         </select>

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Miktar</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="miktar" placeholder="Miktar"  name="miktar" required>
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Sevkiyat Tipi</label>
                          <div class="col-sm-10">
                          <select name="sevkiyat" class="form-control" id="sevkiyat">
                            <option value="Bur-bant">Bur-bant</option>
                            <option value="KARGOUA">KARGOUA</option>
                            <option value="KARGOUG">KARGOUG</option>
                          </select>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Sipariş Tarih</label>
                          <div class="col-sm-10">
                         <input type="date" name="tarih" id="tarih" class="form-control">
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                  
                 
                          
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Olustur</button>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                    @endsection