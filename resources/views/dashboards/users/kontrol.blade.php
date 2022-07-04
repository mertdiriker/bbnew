@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Kontroller')

@section('content')

<div class="card">
              <div class="card-header">
          Kontroller
      
              </div>
              <br>
              <button class="btn btn-success" 
    style="cursor: pointer;width:100px;" 
    data-toggle="modal" 
    data-target="#kontrolekleModal">Ekle</button>

              <br>
          <br>
          <div class="modal fade" id="kontrolekleModal" tabindex="-1" role="dialog" aria-labelledby="kontrolekleModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <div>
              <label for="">Kontrol Ekle</label>
                <form action="{{route('AddControl')}}" method="POST">
                  @csrf
                      <input type="text" name="kontrolad" class="form-control" placeholder="Kontrol Ad">
                      <br>
                      <input type="text" name="seribas" class="form-control" placeholder="Seribas">
                      <br>
                      <input type="text" name="seri" class="form-control" placeholder="Seri">
                      <br>
                      <input type="text" name="serison" class="form-control" placeholder="SeriSon">
                      <br>
                      <select name="sorumlu" id="sorumlu" class="form-control">
                          <option value="">Sorumlu Seç</option>
                          <option value="Operatör">Operatör</option>
                          <option value="Amir">Amir</option>
                          <option value="Operatör/Amir">Operatör/Amir</option>
                      </select>
                      <br>
                      <select name="arac" id="arac" class="form-control">
                          <option value="">Arac Seç</option>
                          <option value="EL-GÖZ">EL-GÖZ</option>
                          <option value="CETVEL">CETVEL</option>
                      </select>
                      <br>
                      <input type="text" name="kayit" class="form-control" placeholder="Kayıt">
                      <br>
                      <select name="olcu" id="olcu" class="form-control" placeholder="olcu">
                          <option value="">Olcu Bilgisi Seç</option>
                          <option value="UrunEn">UrunEn</option>
                          <option value="UrunBoy">UrunBoy</option>
                          <option value="UrunRenk">UrunRenk</option>
                      </select>
                      <br>
                      <label for="">Kritik</label>
                      <input type="checkbox" class="form-control" name="kritik" value="1">
                   
                      <input type="hidden" name="riskID" value="{{$risk}}">
                      <br>
                      <br>
                      <button class="btn btn-success">Ekle</button>
                </form>            
          </div>
          </div>
      </div>
  </div>
</div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="kontrols" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Adı</th>
                    <th>Seri Başı</th>
                    <th>Seri</th>
                    <th>Seri Sonu</th>
                    <th>Sorumlu</th>
                    <th>Arac</th>
                    <th>Kayit</th>
                    <th>Kritik</th>
                    <th>Data</th>
                    <th>Duzenle</th>

                  
                    
                  
                  </tr>
                  </thead>
                  <tbody>
                      <?php $sayi=0; ?>
                  @foreach ($kontrols as $kontrol)
                  <?php $sayi=$sayi+1; ?>
                  <tr>
                  <td>{{ $kontrol->kontrol_ad }}</td>
                  <td>{{ $kontrol->kontrol_seribas }}</td>
                  <td>{{ $kontrol->kontrol_seri }}</td>
                  <td>{{ $kontrol->kontrol_serison }}</td>
                  <td>{{ $kontrol->kontrol_sorumlu }}</td>
                  <td>{{ $kontrol->kontrol_arac }}</td>
                  <td>{{ $kontrol->kontrol_kayit }}</td>
                  <td>{{ $kontrol->kontrol_kritik }}</td>
                  <td>{{ $kontrol->kontrol_data }}</td>
                   <td>  <a class="nav-link" 
    style="cursor: pointer" 
    data-toggle="modal" 
    data-target="#kontrolModal{{$sayi}}">Duzenle</a></td>
                  
                
                
                 
                  </tr>
              
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Adı</th>
                    <th>Seri Başı</th>
                    <th>Seri</th>
                    <th>Seri Sonu</th>
                    <th>Sorumlu</th>
                    <th>Arac</th>
                    <th>Kayit</th>
                    <th>Kritik</th>
                    <th>Data</th>
                    <th>Duzenle</th>
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

  <?php $sayi=0 ?>

@foreach ($kontrols as $kontrol)


<?php 
  $sayi += 1;

?>
<div class="modal fade" id="kontrolModal{{$sayi}}" tabindex="-1" role="dialog" aria-labelledby="kontrolModal{{$sayi}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="kontrolModal{{$sayi}}">
                  <br>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{route('UpdateControl')}}" >
                  @csrf

                  <input type="hidden" name="kontrolID" value="{{$kontrol->kontrol_ID}}">
            
              
                    <label for="">Kontrol Ad</label>
                    <input type="text" class="form-control" name="kontrolad" value="{{$kontrol->kontrol_ad}}">



                          <button type="submit"  class="btn btn-primary">
                             Guncelle
                          </button>

             
                 
              </form>
          </div>
      </div>
  </div>
</div>
@endforeach

@endsection