@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Stok Giris')

@section('content')

<form method="POST" name="frm" action="{{ route('userAddStockEntry') }}">
	@csrf

<table border="2"    id="idarikabul" width="100%" >
  <tr>
    <td align="center" valign=top align=center>
<table border="4"    id="AutoNumber1" >
 <input type="hidden" value="1" name="girdi" >
	<tr>
	<td  rowspan="3">
	 <img src="data:image/png;base64,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" alt=""></td>
	<td  rowspan="2" colspan="2">
	<p align="center"><b>İDARİ KABUL FORMU</b></td>
	<td ><?php echo \Carbon\Carbon::now(); ?></td>
  </tr>
 	<tr>
	<td height="9" width="208">Depo Giriş No : </td>
  </tr>
 <tr>
	<td height="9" width="880" colspan="4" >
	&nbsp;</td>
  </tr>
 	<tr>
	<td ><b>Yan Sanayi / Müşteri</b></td>

	<td >&nbsp;	@foreach ($entrys as $entry) {{ $entry->firma_Ad }} @endforeach</td>
	<td ><b>Kabul Edilen Ürün Miktarı</b></td>
	<td > 
	<input class="form-control" style="width:100px" Class="text" type="hidden" maxLength="50" size="7"  name="StockItem" value=" {{ $kolimiktar }}">{{ $kolimiktar }} @foreach ($entrys as $entry) {{ $entry->urun_Olcut }} @endforeach/<input class="form-control" Class="text" type="hidden" maxLength="3" size="2" style="width:100px" name="StockAdet" value="{{ $koliadet }}"> 
    {{ $koliadet }}	Adet</td>
  </tr>
 	<tr>
	<td ><b>Ürün / Malzeme Adı&nbsp; </b> </td>
	<td  style="height:60px;"colspan="3">&nbsp;@foreach ($entrys as $entry) {{ $entry->urun_Ad }} @endforeach <input type="hidden" name="urunid" value="{{ $stokid }}"></td>
  </tr>
 	<tr>
	<td ><b>Ürün / Malzeme No</b></td>
	<td >&nbsp; @foreach ($entrys as $entry) {{ $entry->urun_Kod }} @endforeach</td>	
	<td ><b>İrsaliye Tarihi / <br>İrsaliye No</b></td>
	<td > 
	<input class="form-control" type="hidden" maxLength="50" size="7" style="width:160px"  name="StockIrsalyDate" value=" {{ $irstarih }} "> {{ $irstarih }} /
	<input class="form-control" type="hidden" Class="text" maxLength="50" size="12" style="width:160px;"  name="StockIrsalyNo" value="{{ $irsno }} ">{{ $irsno }}</td>
  </tr>
  
 <tr>
	<td height="9" width="100"><b>Ham Malzeme Lot No</b></td>
	<td height="9" width="160">&nbsp;<input class="form-control" Class="text" type="hidden" style="width:160px;" maxLength="50" size="20"  name="StockLotNo" value="{{ $lotno }}">{{ $lotno }}</td>
	<td height="9" width="160"><b>Önem Sınıfı</b></td>
	<td height="9" width="208">&nbsp;@foreach ($entrys as $entry) {{ $entry->urundetay_onemsinif }} @endforeach</td>

  </tr>
  	
 	<tr>
	<td ><b>Üretim Tarihi</b></td>
	<td >&nbsp;<input class="form-control" type="hidden" style="width:160px;" Class="hidden" maxLength="50" size="20"  name="ProductionDate" value="{{ $urttarih }}">{{ $urttarih }}</td>
	<td  align="center">
	<p align="left"><b>Depo Konumu</b></td>
	<td align="center">
	<p align="left">
	<input class="form-control" Class="text" type="hidden" style="width:160px;" maxLength="50" size="20"  name="ProductionLocation" value="{{ $depokonum }}">{{ $depokonum }}</td>
  </tr>
  	
 	<tr>
	<td  colspan="2"></td>
	<td  align="center"><b>OK</b></td>
	<td align="center"><b>DÜZELTME</b></td>
  </tr>
	<tr>
	<td colspan="2"><b>1 - Paket adeti uygun mu?</b></td>
	<td  align="center"><input class="form-control" type="checkbox" name="ControlSize" value="ON" checked></td>
	<td> <input type="hidden" class="form-control" style="width:280px;" name="q1" value="{{ $q1 }}" >{{ $q1 }} </td>
  </tr>
	<tr>
	<td  colspan="2"><b>2 - Ambalaj uygun mu?</b></td>
	<td  align="center">
	<input class="form-control" type="checkbox" name="ControlSize0" value="ON" checked></td>
	<td> <input type="hidden" class="form-control" style="width:280px;" name="q2" value="{{ $q2 }}">{{ $q2 }} </td>
  </tr>
 	<tr>
	<td  colspan="2"><b>3 - Etiket bilgileri sipariş bilgileri ile uyuşuyor mu?</b></td>
	<td  align="center">
	<input class="form-control" type="checkbox" name="ControlSize1" value="ON" checked></td>
	<td> <input type="hidden" class="form-control" style="width:280px;" name="{{ $q3 }}" >{{ $q3 }} </td>
  </tr>
 	<tr>
	<td  colspan="4"></td>
  </tr>
 	<tr>
	<td colspan="4">*Kontroller Giriş Kontrol Planına göre, İdari Kabul talimatına göre yapılacaktır <br>
					       *Hata durumunda P-03 Uygun olmayan ürünün kontrolü prosedürüne göre işlem yapılır.
 	</td>
  </tr>
	<tr>
	<td  ><b>Kontrol Eden : </b></td>
	<td  colspan="3">&nbsp;<input class="form-control" Class="hidden" maxLength="50" size="35" type="hidden"  name="StockPersonel" value="<?php echo Auth::user()->name; ?>"><?php echo Auth::user()->name; ?></td>
  </tr>
 	<tr>
	<td ><b>Açıklama</b></td>
	<td  colspan="3">&nbsp;<input class="form-control" Class="text" type="hidden" maxLength="50" size="34"  name="StockDescription" value="{{ $aciklama }}">{{ $aciklama }}</td>
  </tr>
 
 	</table> 	
 
   <p>
   <button type="submit" onclick="<?php file_put_contents('users/stoks/'.$lotno.'.html', ob_get_contents()); ?>" class="btn btn-success">Onayla</button>
  </tr>
  </table>
</form>




@endsection