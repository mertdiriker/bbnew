@extends('dashboards.users.layouts.user-dash-layout')
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
                    <li class="nav-item"><a class="nav-link active" href="#hareketler" data-toggle="tab">Hareketler</a></li>
                    <li class="nav-item"><a class="nav-link" href="#stoklar" data-toggle="tab">Stok</a></li>
                   
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="hareketler">
                    <table id="moves" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>Urun</th>
                    <th>Miktar</th>
                    <th>CikanMiktar</th>
                    <th>KalanMiktar</th>
                    <th>Tarih</th>
                    <th>LotNo</th>
                    <th>İrsNo</th>
                    <th>İrsTarih</th>
                    <th>Konum</th>
                    <th>Kisi</th>
                    <th>Durum</th>
                    <th>Aciklama</th>
                   
                  </tr>
                  </thead>
                  <tbody>

                  <?php $sayi=0; ?>

                  @foreach ($moves as $move)
                  <?php $sayi=$sayi+1; ?>
                  <tr>
                  <td>{{ $move->urun_Ad }}</td>
                  @if(($move->urunhareket_girdi)==1)
                  <td style="background-color:lightgreen">{{ $move->urunhareket_miktar }}</td>
                  @else
                  <td style="background-color:pink">{{ $move->urunhareket_miktar }}</td>
                  @endif
                  <td style="background-color:pink" >{{ $move->urunhareket_cikanmiktar }}</td>
                  <td style="background-color:lightblue" >{{ $move->urunhareket_kalanmiktar }}</td>
                  <td>{{ $move->urunhareket_tarih }}</td>
                  <td>{{ $move->urunhareket_lotno }} </td>
                  <td>{{ $move->urunhareket_irsno }} </td>
                  <td>{{ $move->urunhareket_irstarih }} </td>
                  <td>{{ $move->urunhareket_depokonumu }}</td>
                  <td>{{ $move->urunhareket_kisi }}</td>
                  <td>@if($move->urunhareket_durum=="Ver")
                  <a class="nav-link" 
    style="cursor: pointer" 
    data-toggle="modal" 
    data-target="#stokver{{$sayi}}">Ver</a>
    @else
    {{$move->urunhareket_durum}}
                      @endif
                  </td>
                  <td>{{ $move->urunhareket_aciklama }}</td>
            
            
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Urun</th>
                    <th>Miktar</th>
                    <th>CikanMiktar</th>
                    <th>KalanMiktar</th>
                    <th>Tarih</th>
                    <th>LotNo</th>
                    <th>İrsNo</th>
                    <th>İrsTarih</th>
                    <th>Konum</th>
                    <th>Kisi</th>
                    <th>Durum</th>
                    <th>Aciklama</th>
                  </tr>
                  </tfoot>
                </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="stoklar">

                    <table id="stoks" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>Urun</th>
                    <th>Girdi</th>
                    <th>Çıktı</th>
                    
                   
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($products as $product)
                  <tr>
                  <td>{{ $product->urun_Ad }}</td>
                <td><form action="{{ route('userStockEntry') }}" method="POST">
                    @csrf
                <input type="hidden" value="{{ $product->urun_ID }}" name="stokID">
                <input type="hidden" value="1" name="girdi">
                <button type="submit" class="btn btn-success">Ekle</button>

                </form></td>
                <td><form action="{{ route('userStockExit') }}" method="POST">
                    @csrf
                <input type="hidden" value="{{ $product->urun_ID }}" name="stokID">
                <input type="hidden" value="1" name="cikti">
                <button type="submit" class="btn btn-danger">Çıkar</button>

                </form></td>
            
            
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Urun</th>
                    <th>Girdi</th>
                    <th>Çıktı</th>
    
                  </tr>
                  </tfoot>
                </table>
                 
                      </div>
                 
                     
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <?php $sayi=0; ?>
      @foreach ($moves as $move)
      <?php $sayi=$sayi+1; ?>

      <div class="modal fade" id="stokver{{$sayi}}" tabindex="-1" role="dialog" aria-labelledby="stokver{{$sayi}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stokver{{$sayi}}">{{$move->urun_Ad}}
                    <br>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('StokVer')}}">
                    @csrf
                    <input type="hidden" value="{{$move->urunhareket_ID}}" name="moveid">
                    <div class="form-group row mb-0">
                   
                        <div class="col-md-8 offset-md-4">
                        <label for="">Lot</label>
                              <select name="lotno" id="lotno" class="form-control">
                                <option value="{{$move->urunhareket_lotno}}">{{$move->urunhareket_lotno}}</option>
                                @foreach ($moves as $move)
                                <option value="{{$move->urunhareket_lotno}}">{{$move->urunhareket_lotno}}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                  <br>
                  <br>
                  <div class="form-group row mb-0">
                   
                   <div class="col-md-8 offset-md-4">
                   <label for="">Miktar</label>
  
                        <input type="number" class="form-control" name="miktar" value="{{$move->urunhareket_miktar}}">
                   </div>
               </div>
               <br>
               <br>
                  

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                              Ver
                            </button>

                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
      
      <!-- /.content -->

@endsection