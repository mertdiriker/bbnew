@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Urunler')

@section('content')

<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="products" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>QR</th>
                    <th>Urun Adı</th>
                    <th>Urun Kodu</th>
                    <th>Urun Ölçütü</th>
                    <th>Urun Alis</th>
                    <th>Urun Satis</th>
                    <th>Urun Aktif</th>
              
                  
                    <th>Duzenle</th>
                    <th>Sil</th>
                 
                 
                  </tr>
                  </thead>
                  <tbody> 
                  @foreach ($products as $product)
                  <?php if($product->urun_Silindi==0){ ?>
                  <input type="hidden" value="{{ $qr=utf8_encode ( $product->urun_Kod  )}}">
                  <tr>
                   <td> <!--<img src="data:image/png;base64,{{ base64_encode(SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->format('png')->merge(public_path('bb.png'),.3, true)->generate( $qr )) }}">
--></td> 
                  <td>{{ $product->urun_Ad }}</td>
                  <td>{{ $product->urun_Kod }}</td>
                  <td>{{ $product->urun_Olcut }}</td>
                  <td>{{ $product->urun_Alis }}</td>
                  <td>{{ $product->urun_Satis }}</td>
                  <td>{{ $product->urun_Aktif }}</td>
            
             
                  <td><form action="{{ route('userShowUpdateUrun') }}" method="GET">
                    @csrf
                    <input type="hidden" value="{{ $product->urun_ID }}" name="urunID">
                    <button type="submit" class="btn btn-info">Duzenle</button>
                  </form></td>
                  <td><form action="{{ route('userDeleteUrun') }}" method="POST">
                  @csrf
                  <input type="hidden" value="{{ $product->urun_ID }}" name="urunID">
                    <button type="submit" class="btn btn-danger">Sil</button>   </form></td>
                 
              
                  </tr>
                  <?php } ?>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>QR</th>
                    <th>Urun Adı</th>
                    <th>Urun Kodu</th>
                    <th>Urun Ölçütü</th>
                    <th>Urun Alis</th>
                    <th>Urun Satis</th>
                    <th>Urun Aktif</th>
                
                 
                    <th>Duzenle</th>
                    <th>Sil</th>
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