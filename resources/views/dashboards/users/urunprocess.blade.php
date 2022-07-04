@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Urun-Process')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Urun-Process</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">AnaSayfa</a></li>
                <li class="breadcrumb-item active">Urun-Process</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
       
            <div class="col-md-9">
              <div class="card">
          
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="urunprocess_ekle">
                      <form class="form-horizontal" method="POST" action="{{ route('AddProcessToProduct') }}" id="processproductForm">
                      @csrf <!-- {{ csrf_field() }} -->
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Urun </label>
                          <div class="col-sm-10">
                          
                          
                              <label for="">@foreach($products as $product){{$product->urun_Ad}}</label>
                              <input type="hidden" value="{{$product->urun_Kod}}@endforeach" name="urunkod">
                                
                        

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Process</label>
                          <div class="col-sm-10">
                          <select name="processID" id="processID" style="width:500px;height:30px;">
                            @foreach ($process as $proces)
                                <option value="{{ $proces->process_ID }}">{{ $proces->process_ad }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      
                     
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Ekle</button>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                   
                </div><!-- /.card-body -->
                </div>
              <!-- /.card -->
              <div class="card">
          <table><thead>
              <tr>  
              
                  <th>Process</th>
                

              </tr>
          </thead>
          <tbody>
          @foreach ($names as $name)
              <tr>
          
                <th>{{ $name->process_ad }}</th>

              </tr>
              @endforeach
          </tbody>
             
          </table>
           
                </div>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection