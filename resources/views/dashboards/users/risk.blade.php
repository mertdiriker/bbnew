@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Riskler')

@section('content')

<div class="card">
              <div class="card-header">
          Riskler
      
              </div>
              <br>
          <br>
          <div> <label for="">Risk Ekle</label>
                <form action="{{route('AddRisk')}}" method="POST">
                  @csrf
                      <input type="text" name="riskad" class="form-control" style="width:600px;">
                      <br>
                      <input type="hidden" name="operasyonID" value="{{$operasyon}}">
                      <button class="btn btn-success">Ekle</button>
                </form>            
          </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="risks" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Adı</th>
                    <th>Duzenle</th>
                    <th>Kontrol</th>
                    
                  
                  </tr>
                  </thead>
                  <tbody>
                      <?php $sayi=0; ?>
                  @foreach ($risks as $risk)
                  <?php $sayi=$sayi+1; ?>
                  <tr>
                  <td>{{ $risk->risk_ad }}</td>
                  <td>  <a class="nav-link" 
    style="cursor: pointer" 
    data-toggle="modal" 
    data-target="#riskModal{{$sayi}}">Duzenle</a></td>
                  
                  <td><form action="{{route('ShowControl')}}" method='GET' >
                  <input type="hidden" name="riskID" value="{{$risk->risk_ID}}">
                  <button class="btn btn-info">Kontroller</button>
                  </form></td>
                
                 
                  </tr>
              
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Adı</th>
                   
                    <th>Duzenle</th>
                    <th>Kontrol</th>
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

@foreach ($risks as $risk)


<?php 
  $sayi += 1;

?>
<div class="modal fade" id="riskModal{{$sayi}}" tabindex="-1" role="dialog" aria-labelledby="riskModal{{$sayi}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="riskModal{{$sayi}}">
                  <br>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{route('UpdateRisk')}}" >
                  @csrf

                  <input type="hidden" name="riskID" value="{{$risk->risk_ID}}">
            
              
                    <label for="">Risk Ad</label>
                    <input type="text" class="form-control" name="riskad" value="{{$risk->risk_ad}}">



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