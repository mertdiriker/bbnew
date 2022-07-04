@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Firma Urun Ekle')

@section('content')
<div class="card-body">
<form action="{{ route('userAddProductToFirm') }}" method="POST" style="width:500px;">
    @csrf
    <input type="hidden" value="{{ $firmID }}" name="firmID">
<select name="urunid" class="form-control" id="">
@foreach ($products as $product)
<option value="{{ $product->urun_ID }}">{{ $product->urun_Ad }}</option>
@endforeach
</select>
<br>
<input type="float" placeholder="Fiyat" name ="fiyat" class="form-control">
<br>
<select name="kur" id="" class="form-control">
    <option value="TL">TL</option>
    <option value="Dolar">Dolar</option>
    <option value="Euro">Euro</option>
</select>
<br>
<button type="submit" class="btn btn-success">Ekle</button>
</form>
<div>

<div class="card-body">
                <table id="productfirms" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Urun Adı</th>
                    <th>Urun Kodu</th>
                    <th>Fiyat</th>
                    <th>Tarih</th>
                    <th>Urun Bilgileri</th>
                
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($firmproducts as $firmproduct )
                  <tr>
                  <td>{{ $firmproduct ->urun_Ad }}</td>
                  <td>{{ $firmproduct ->urun_Kod }}</td>
                  <td>{{ $firmproduct ->firmaurun_Fiyat }} {{ $firmproduct ->firmaurun_Kur }} </td>
                  <td>{{ $firmproduct ->firmaurun_Tarih }}</td>
                  <td><form action="{{ route('userShowUpdateUrun') }}" method="GET">
                    @csrf
                    <input type="hidden" value="{{ $firmproduct->firmaurun_UrunID }}" name="urunID">
                    <button type="submit" class="btn btn-info">Git</button>
                  </form></td>
            
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Urun Adı</th>
                    <th>Urun Kodu</th>
                    <th>Fiyat</th>
                    <th>Tarih</th>
                    <th>Urun Bilgileri</th>
               
                  </tr>
                  </tfoot>
                </table>
              </div>

@endsection