@extends('dashboards.admins.layouts.admin-dash-layout')
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
                    <th>Akıllı Kod</th>
                    <th>Urun Adı</th>
                    <th>Urun Kodu</th>
                    <th>Urun Ölçütü</th>
                    <th>Urun Alis</th>
                    <th>Urun Satis</th>
                    <th>Urun Aktif</th>
                    <th>Recete</th>
                 
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($products as $product)
                  <input type="hidden" value="{{ $qr=utf8_encode ( $product->urun_Kod  )}}">
                  <tr>
                    <td><img src="data:image/png;base64,{{ base64_encode(SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->format('png')->merge(public_path('bb.png'),.3, true)->generate( $qr )) }}">
</td>
                  <td>{{ $product->urun_Akillikod }}</td>
                  <td>{{ $product->urun_Ad }}</td>
                  <td>{{ $product->urun_Kod }}</td>
                  <td>{{ $product->urun_Olcut }}</td>
                  <td>{{ $product->urun_Alis }}</td>
                  <td>{{ $product->urun_Satis }}</td>
                  <td>{{ $product->urun_Aktif }}</td>
                  <td><form action="{{ route('adminShowRecipe') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $product->urun_ID }}" name="urun1ID">
                    <button type="submit" class="btn btn-danger">Olustur</button>
                  </form></td>
              
                  </tr>
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
                    <th>Olustur</th>
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