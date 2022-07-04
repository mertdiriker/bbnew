@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Prototip')

@section('content')

<div class="card">
              <div class="card-header">
           
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="projects" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Proje Durumu</th>
                    <th>Müşteri Adı</th>
                    <th>Burbant PO</th>
                    <th>Ürün Kodu</th>
                    <th>Ürün Tanımı</th>
                    <th>Hammadde 1</th>
                    <th>Hammadde 2</th>
                    <th>Ölçüt</th>
                    <th>Koli İçi Adet</th>
                    <th>Koli Adet</th>
                    <th>Proje Fiyatı</th>
                    <th>Fatura Fiyatı</th>
                    <th>Gerçek Fiyat</th>
                    <th>Duzenle</th>
           
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($projects as $project)
                  <tr>
                  <td>{{ $project->proje_durum }}</td>
                  <td>{{ $project->proje_musteriad }}</td>
                  <td>{{ $project->proje_musterikod }}</td>
                  <td>{{ $project->proje_urunkod }}</td>
                  <td>{{ $project->proje_urunad }}</td>
                  <td>{{ $project->proje_hammadde }}</td>
                  <td>{{ $project->proje_hammadde2 }}</td>
                  <td>{{ $project->proje_olcut }}</td>
                  <td>{{ $project->proje_koliicadet }}</td>
                  <td>{{ $project->proje_koliadet }}</td>
                  <td>{{ $project->proje_projefiyat }} {{ $project->proje_projefiyatkur }}</td>
                  <td>{{ $project->proje_faturafiyat  }} {{ $project->proje_faturafiyatkur }}</td>
                  <td>{{ $project->proje_gercekfiyat }} {{ $project->proje_gercekfiyatkur }}</td>
                  <td><form action="{{ route('userShowUpdateProject') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $project->proje_ID }}" name="projectID">
                   
                    <button type="submit" class="btn btn-info">Duzenle</button>
                  </form></td>
              
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Proje Durumu</th>
                    <th>Müşteri Adı</th>
                    <th>Burbant PO</th>
                    <th>Ürün Kodu</th>
                    <th>Ürün Tanımı</th>
                    <th>Hammadde</th>
                    <th>Hammadde2</th>
                    <th>Ölçüt</th>
                    <th>Koli İçi Adet</th>
                    <th>Koli Adet</th>
                    <th>Proje Fiyatı</th>
                    <th>Fatura Fiyatı</th>
                    <th>Gerçek Fiyat</th>
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

@endsection