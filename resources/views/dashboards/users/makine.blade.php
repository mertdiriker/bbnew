@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Makineler')

@section('content')

<div class="card">
              <div class="card-header">
          Makineler
          <div>
              <label for="">Makine Import</label>
          <form action="{{ route('userMachineImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Machine Data</button>
            </form>
          </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="machines" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Adı</th>
                    <th>Tipi</th>
                    <th>Firması</th>
                    <th>İmalatYılı</th>
                    <th>Yedek</th>
                    <th>Devre Tarihi</th>
                    <th>Bolum</th>
                    <th>Saatlik Uretim</th>
                    <th>İslem</th>
                    <th>Olcut</th>
                    <th>Kapasite</th>
                    <th>Ort Uretim</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($machines as $machine)
                  <tr>
                  <td>{{ $machine->makine_ad }}</td>
                  <td>{{ $machine->makine_tip }}</td>
                  <td>{{ $machine->makine_firma}}</td>
                  <td>{{ $machine->makine_imalatyil }}</td>
                  <td>{{ $machine->makine_yedek }}</td>
                  <td>{{ $machine->makine_devretarih }}</td>
                  <td>{{ $machine->makine_bolum }}</td>
                  <td>{{ $machine->makine_saatlikurt }}</td>
                  <td>{{ $machine->makine_islem }}</td>
                  <td>{{ $machine->makine_olcut }}</td>
                  <td>{{ $machine->makine_kapasite }}</td>
                  <td>{{ $machine->makine_orturun  }}</td>
                
                 
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Adı</th>
                    <th>Tipi</th>
                    <th>Firması</th>
                    <th>İmalatYılı</th>
                    <th>Yedek</th>
                    <th>Devre Tarihi</th>
                    <th>Bolum</th>
                    <th>Saatlik Uretim</th>
                    <th>İslem</th>
                    <th>Olcut</th>
                    <th>Kapasite</th>
                    <th>Ort Uretim</th>
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