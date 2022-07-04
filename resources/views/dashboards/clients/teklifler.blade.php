@extends('dashboards.clients.layouts.client-dash-layout')
@section('title','Projeler')

@section('content')

<div class="card">
              <div class="card-header">
                <table>
              <form action="{{ route('client.proje') }}" method="GET">
              <button type="submit" class="btn btn-success">Otomatik Teklif Oluştur</button>&emsp;
              </form>
              <form action="{{ route('client.hizliproje') }}" method="GET">
                <button type="submit" class="btn btn-info">Hızlı Teklif Oluştur</button>&emsp;
              </form>
            
              <form action="{{ route('client.excelproje') }}" method="GET">
                <button type="submit" style="position:relative;" class="btn btn-danger">Excel ile Teklif Oluştur</button>&emsp;
              </form>
              <form action="{{ route('client.sikproje') }}" method="GET">
                <button type="submit" style="position:relative;background-color:orange;" class="btn btn-danger">Sık Kullanılanlar</button>
              </form>
              </table>
                   
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="teklifs" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Firma</th>
                    <th>Hammadde</th>
                    <th>Hammadde 2</th>
                    <th>Figur</th>
                    <th>Single/Combine</th>
                    <th>Tip</th>
                    <th>Paket Tip</th>
                    <th>SOP Tarih</th>
                    <th>EOP Tarih</th>
                    <th>Hacim</th>
                    <th>Proje Ad</th>
                    <th>Proje Kod</th>
                    <th>Finger Lift</th>
                    <th>Finger Lift Uzunluğu</th>
                    <th>Liner Change</th>
                    <th>Sandwich</th>
                    <th>Urun En</th>
                    <th>Urun Boy</th>
                    <th>Sheet En</th>
                    <th>Sheet Boy</th>
                    <th>Dosya</th>
                    <th>Duzenle</th>
                    <th>Yinele</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($teklifs as $teklif)
                 
                  <tr>
                  <td>{{ $teklif->firma_Ad }}</td>
                  <td>{{ $teklif->urun_Ad }}</td>
                  <td>{{ $teklif->S1 }}</td>
                  <td>{{ $teklif->teklif_figur }}</td>
                  <td>{{ $teklif->teklif_singleorcombine }}</td>
                  <td>{{ $teklif->teklif_uruntip }}</td>
                  <td>{{ $teklif->teklif_pakettip }}</td>
                  <td>{{ $teklif->teklif_soptarih }}</td>
                  <td>{{ $teklif->teklif_eoptarih }}</td>
                  <td>{{ $teklif->teklif_hacim }}</td>
                  <td>{{ $teklif->teklif_projead }}</td>
                  <td>{{ $teklif->teklif_projekod  }}</td>
                  <td>{{ $teklif->teklif_fingerlift }}</td>
                  <td>{{ $teklif->teklif_fingerliftlength }}</td>
                  <td>{{ $teklif->teklif_linerchange }}</td>
                  <td>{{ $teklif->teklif_sandwich }}</td>
                  <td>{{ $teklif->teklif_urunen }}</td>
                  <td>{{ $teklif->teklif_urunboy }}</td>
                  <td>{{ $teklif->teklif_sheeten }}</td>
                  <td>{{ $teklif->teklif_sheetboy }}</td>
                  <td>
                    @if($teklif->teklif_dosya=="Dosya Yok")
                    Dosya Yok
                    @else
                  <form action=" {{ route('clientDownloadProjectFile') }}" method="POST">
                    @csrf
                    <input type="hidden" name="dosyaad" value="{{ $teklif->teklif_dosya }}">
                    <button type="submit">{{ $teklif->teklif_dosya }} </button>/ {{ $teklif->teklif_dosyatur }}

                  </form>
                @endif</td>
               
                  <td><form action="{{ route('clientShowUpdateteklif') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $teklif->teklif_ID }}" name="teklifID">
                   
                    <button type="submit" class="btn btn-info">Duzenle</button>
                  </form></td>
                  <td><form action="{{ route('clientShowYineleteklif') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $teklif->teklif_ID }}" name="teklifID">
                   
                    <button type="submit" class="btn btn-success">Yinele</button>
                  </form></td>
                  </tr>
                
                  @endforeach
                
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Firma</th>
                    <th>Hammadde</th>
                    <th>Hammadde 2</th>
                    <th>Figur</th>
                    <th>Single/Combine</th>
                    <th>Tip</th>
                    <th>Paket Tip</th>
                    <th>SOP Tarih</th>
                    <th>EOP Tarih</th>
                    <th>Hacim</th>
                    <th>Proje Ad</th>
                    <th>Proje Kod</th>
                    <th>Finger Lift</th>
                    <th>Finger Lift Uzunluğu</th>
                    <th>Liner Change</th>
                    <th>Sandwich</th>
                    <th>Urun En</th>
                    <th>Urun Boy</th>
                    <th>Sheet En</th>
                    <th>Sheet Boy</th>
                    <th>Dosya</th>
                    <th>Duzenle</th>
                    <th>Yinele</th>
                  </tr>
                  </tfoot>
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection