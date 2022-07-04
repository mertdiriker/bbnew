@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Operasyonlar')

@section('content')

<div class="card">
              <div class="card-header">
          Operasyonlar
          <div>
              <label for="">Operasyon Import</label>
          <form action="{{ route('userOperasyonImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="processID" value="{{ $process }}">
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Operasyon Data</button>
            </form>
          </div>
          <br>
          <br>
          <div>
                <form action="{{route('AddOperasyon')}}" method="POST">
                  @csrf
                      <input type="text" name="operasyonad" class="form-control" style="width:600px;">
                      <br>
                      <input type="hidden" name="processID" value="{{$process}}">
                      <button class="btn btn-success">Ekle</button>
                </form>            
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="operasyons" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Adı</th>
                    <th>Seribas</th>
                    <th>Seri</th>
                    <th>Serison</th>
                    <th>Sorumlu</th>
                    <th>Araç</th>
                    <th>Kayit</th>
                    <th>Duzenle</th>
                    <th>Risk</th>
                    
                  
                  </tr>
                  </thead>
                  <tbody>
                    <?php $sayi=0 ?>
                  @foreach ($operasyons as $operasyon)
                  <?php $sayi=$sayi+1; ?>
                  <tr>
                  <td rowspan="2">{{ $operasyon->operasyon_ad }}</td>
                  <td>{{ $operasyon->operasyon_seribas1 }}</td>
                  <td>{{ $operasyon->operasyon_seri1}}</td>
                  <td>{{ $operasyon->operasyon_serison1}}</td>
                  <td>{{ $operasyon->operasyon_sorumlu1}}</td>
                  <td>{{ $operasyon->operasyon_arac1}}</td>
                  <td>{{ $operasyon->operasyon_kayit1}}</td>
                  <td>   
                    <a class="nav-link" 
    style="cursor: pointer" 
    data-toggle="modal" 
    data-target="#operasyonModal{{$sayi}}">Duzenle</a>
                     
                </td>
                  <td><form action="{{route('ShowRisk')}}" method='GET' >
                  <input type="hidden" name="operasyonID" value="{{$operasyon->operasyon_ID}}">
                  <button class="btn btn-info">Riskler</button>
                  </form></td>
                
                 
                  </tr>
                  <tr>
                 
                  <td>{{ $operasyon->operasyon_seribas2 }}</td>
                  <td>{{ $operasyon->operasyon_seri2}}</td>
                  <td>{{ $operasyon->operasyon_serison2}}</td>
                  <td>{{ $operasyon->operasyon_sorumlu2}}</td>
                  <td>{{ $operasyon->operasyon_arac2}}</td>
                  <td>{{ $operasyon->operasyon_kayit2}}</td>
                  <td></td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Adı</th>
                    <th>Seribas</th>
                    <th>Seri</th>
                    <th>Serison</th>
                    <th>Sorumlu</th>
                    <th>Araç</th>
                    <th>Kayit</th>
                    <th>Duzenle</th>
                    <th>Risk</th>
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

  @foreach ($operasyons as $operasyon)


<?php 
    $sayi += 1;

?>
  <div class="modal fade" id="operasyonModal{{$sayi}}" tabindex="-1" role="dialog" aria-labelledby="operasyonModal{{$sayi}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="operasyonModal{{$sayi}}">
                    <br>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('UpdateOperasyon')}}" >
                    @csrf

                    <input type="hidden" name="operasyonID" value="{{$operasyon->operasyon_ID}}">
              
                
                      <label for="">Operasyon Ad</label>
                      <input type="text" class="form-control" name="operasyonad" value="{{$operasyon->operasyon_ad}}">

 

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