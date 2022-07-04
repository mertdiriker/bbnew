@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Firmalar')

@section('content')

<div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="firms" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Firma Adı</th>
                    <th>Firma Kodu</th>
                    <th>Firma Vno</th>
                    <th>Firma Adresi</th>
                    <th>Firma Yetkili</th>
                    <th>Firma Iletisim</th>
                    <th>Firma Tedarikçi</th>
                    <th>Firma Müşteri</th>
                    <th>Firma Aktif</th>
                    <th>Duzenle</th>
                    <th>Urun Ekle</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($firms as $firm)
                  <tr>
                  <td>{{ $firm->firma_Ad }}</td>
                  <td>{{ $firm->firma_Kod }}</td>
                  <td>{{ $firm->firma_Vno }}</td>
                  <td>{{ $firm->firma_Adres }}</td>
                  <td>{{ $firm->firma_yetkiliad }}</td>
                  <td>{{ $firm->firma_iletisim }}</td>
                  <td>{{ $firm->firma_Tedarik }}</td>
                  <td>{{ $firm->firma_Musteri }}</td>
                  <td>{{ $firm->firma_Aktif }}</td>
                  <td><form action="{{ route('ShowUpdateFirm') }}" method="GET">
                    @csrf
                    <input type="hidden" value="{{ $firm->firma_ID }}" name="firmID">
                    <button type="submit" class="btn btn-info">Duzenle</button>
                  </form></td>
                  <td><form action="{{ route('userShowFirmProduct') }}" method="GET">
                    @csrf
                    <input type="hidden" value="{{ $firm->firma_ID }}" name="firmID">
                    <button type="submit" class="btn btn-danger">Ekle</button>
                  </form></td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Firma Adı</th>
                    <th>Firma Kodu</th>
                    <th>Firma Vno</th>
                    <th>Firma Adresi</th>
                    <th>Firma Yetkili</th>
                    <th>Firma Iletisim</th>
                    <th>Firma Tedarikçi</th>
                    <th>Firma Müşteri</th>
                    <th>Firma Aktif</th>
                    <th>Duzenle</th>
                    <th>Urun Ekle</th>
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