@extends('dashboards.users.layouts.user-dash-layout')
@section('title','İşemri')

@section('content')

<div class="card">
              <div class="card-header">
          İşemirleri
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="workorders" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Siparis No</th>
                   <th>Process</th>
                   <th>Giren Ürün Kod</th>
                   <th>Miktar</th>
                   <th>Durum</th>
                   <th>Seribaşı Onayı</th>
                   <th>Serisonu Onayı</th>
                   <th>Aciklama</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php $sayi = 0; ?>
                  @foreach ($isemris as $isemri)
                  <?php 
    $sayi += 1;

?>
                  <tr>
                <td>
                    {{$isemri->isemri_siparisno}}
                </td>
                <td>
                    {{$isemri->process_ad}}
                </td>
                <td> {{$isemri->isemri_girenurunKOD}}</td>
                <td>{{$isemri->isemri_miktar}}</td>
                <td>
                    @if($isemri->isemri_baslandi==NULL)
                    Başlanmadı
                    @elseif($isemri->isemri_bitti==1)
                    Bitti
                    @else
                    Başlandı
                    @endif
                </td>
                <td>   @if($isemri->isemri_baslandi==NULL)
                    <a class="nav-link" 
    style="cursor: pointer" 
    data-toggle="modal" 
    data-target="#seribasiModal{{$sayi}}">Seri Basi Onayla</a>
                        @endif
                </td>
                    <td>
                        @if($isemri->isemri_baslandi==1)
                    <button class="btn btn-success" onclick="serisonuonay({{ $isemri->isemri_ID }})">Onayla</button>
                    @endif
                    </td>
                <td>
                    {{$isemri->process_aciklama}}
                </td>
                
                 
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Siparis No</th>
                   <th>Process</th>
                   <th>Giren Ürün Kod</th>
                   <th>Miktar</th>
                   <th>Durum</th>
                   <th>Seribaşı Onayı</th>
                   <th>Serisonu Onayı</th>
                   <th>Aciklama</th>
                  
                  
                  </tr>
                  </tfoot>
                </table>
              </div>
              <?php $sayi = 0; ?>
@foreach ($isemris as $isemri)
<?php 
    $sayi += 1;

?>
              <div class="modal fade" id="seribasiModal{{$sayi}}" tabindex="-1" role="dialog" aria-labelledby="siparisModal{{$sayi}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="siparisModal{{$sayi}}">{{ $isemri->isemri_siparisno }} {{ $isemri->process_ID }} 
                    <br>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    @csrf
                    <input type="hidden" value="" name="ongoruID" id="ongoruID">
                    <div class="form-group row">
                    </div>
                    @foreach ($kontrols as $kontrol)
                    @if($isemri->process_ID==$kontrol->operasyon_process)
                   
                    <div class="form-group row">
                        <label for="miktar" class="col-md-4 col-form-label text-md-right">{{$kontrol->kontrol_ad}}</label>

                        <div class="col-md-6">
                            <input id="onaycheck" type="checkbox" class="form-control" name="onaycheck" value="">
                        </div>
                    </div>
                
                    @endif
                    @endforeach
        
               

                 

                  

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" onclick="seribasionay({{ $isemri->isemri_ID }})" class="btn btn-primary">
                               Onayla
                            </button>

                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<?php $sayi = 0; ?>
@foreach ($isemris as $isemri)


<?php 
    $sayi += 1;

?>
              <div class="modal fade" id="serisonu{{$sayi}}" tabindex="-1" role="dialog" aria-labelledby="siparisModal{{$sayi}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="siparisModal{{$sayi}}">{{ $isemri->isemri_siparisno }} 
                    <br>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    @csrf
                    <input type="hidden" value="" name="ongoruID" id="ongoruID">
                    <div class="form-group row">
                    </div>
             
                

                    <div class="form-group row">
                        <label for="miktar" class="col-md-4 col-form-label text-md-right"></label>

                        <div class="col-md-6">
                            <input id="miktar" type="checkbox" class="form-control" name="onaycheck" value="">
                        </div>
                    </div>
                
                
                    <div class="form-group row">
                        <label for="sevktarih" class="col-md-4 col-form-label text-md-right">Sevkiyat Tarih</label>

                        <div class="col-md-6">
                            <input id="sevktarih" type="date" class="form-control" name="sevktarih" value="" required>

                         
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sevksekli" class="col-md-4 col-form-label text-md-right">Sevkiyat Şekli</label>

                        <div class="col-md-6">
                            <select name="sevksekli" id="sevksekli" class="form-control">
                                <option value="Bur-bant">Bur-bant</option>
                                <option value="KARGOUA">KARGOUA</option>
                                <option value="KARGOUG">KARGOUG</option>
                            </select>

                         
                        </div>
                    </div>

                 

                  

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" onclick="seribasionay({{ $isemri->isemri_ID }})" class="btn btn-primary">
                               Onayla
                            </button>

                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
       


@endsection