@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Recete')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Recete</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">AnaSayfa</a></li>
                <li class="breadcrumb-item active">Recete</li>
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
                    <div class="active tab-pane" id="urun_ekle">
                      <form class="form-horizontal" method="POST" action="{{ route('userAddRecipe') }}" id="receteForm">
                      @csrf <!-- {{ csrf_field() }} -->
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Urun 1</label>
                          <div class="col-sm-10">
                          
                          
                              <label for="">{{($recipeproduct1)}}</label>
                              <input type="hidden" value="{{($recipeproduct1)}}" name="urun1">
                                
                        

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Urun 2</label>
                          <div class="col-sm-10">
                          <select name="urun2" id="urun2" style="width:500px;height:30px;">
                            @foreach ($products as $product)
                                <option value="{{ $product->urun_ID }}">{{ $product->urun_Ad }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Oran</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Oran"  name="oran" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Fire</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Fire"  name="fire" required>
                            <span class="text-danger error-text favoritecolor_error"></span>
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
                   <th>&emsp;&emsp;Urun1</th>
                  <th>Urun2</th>
                  <th>Oran</th>
                  <th>Fire</th>
                  <th>Sil</th>

              </tr>
          </thead>
          <tbody>
          @foreach ($names as $name)
              <tr>
                <th>{{ $name->recete_Urun1ID }}</th>
                <th>{{ $name->urun_Ad }}</th>
                <th>{{ $name->recete_Oran }}</th>
                <th>{{ $name->recete_Oranfire }}</th>
                <th></th>
              </tr>
              @endforeach
          </tbody>
             
          </table>
                <div class="card-body">
              
            
              

                </div>
                </div>
              
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

@endsection