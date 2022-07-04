@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Processler')

@section('content')

<div class="card">
              <div class="card-header">
          Processler
          <div>
            <label for="">Process Ekle</label>
            <form action="{{route('ShowProcessEkle')}}" method="GET">
              <button class="btn btn-success">+</button>

            </form>
              <label for="">Process Import</label>
          <form action="{{ route('userProcessImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Process Data</button>
            </form>
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="processs" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>Sira</th>
                    <th>Adı</th>
                    
                    <th>Departman</th>
                    <th>Aciklama</th>
                    <th>Operasyon</th>
                    
                  
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($process as $proces)
                  <tr>
                  <td>{{ $proces->process_sira }}</td>
                  <td>{{ $proces->process_ad }}</td>
                  
                  <td>{{ $proces->process_departman}}</td>
                  <td>{{ $proces->process_aciklama  }}</td>
                  <td>
                      <form method="GET" action="{{route('userOperasyonShow')}}">
                          @csrf
                          <input type="hidden" name="processID" value="{{ $proces->process_ID }}">
                          <button class="btn btn-info">Operasyonlar</button>

                      </form>
                  </td>
                
                 
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Adı</th>
                    <th>Sira</th>
                    <th>Departman</th>
                    <th>Aciklama</th>
                    <th>Operasyon</th>
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