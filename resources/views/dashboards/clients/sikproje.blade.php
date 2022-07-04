@extends('dashboards.clients.layouts.client-dash-layout')
@section('title','Sık Kullanılanlar')

@section('content')

<div class="card">
              <div class="card-header">
             <button class="btn btn-danger" style="background-color:orange">SIK KULLANILANLAR</button>
                   
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="sikteklifs" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Ad</th>
                    <th>Oluştur</th>
                  
              
                  </tr>
                  </thead>
                  <tbody>
            
                  <tr>
                  <td>Single Logo AFT</td>
                  <td>
                      <form action="{{ route('clientTeklifSikShow') }}" method="POST">
                          @csrf
                          
                      <input type="hidden" value="Logo" name="figur">
                      <input type="hidden" value="Single" name="singleorcombine">
                      <input type="hidden" value="AFT" name="tip">
                      <input type="hidden" value="" name="pakettip">
                      <input type="hidden" value="" name="fingerlift">
                      <input type="hidden" value="" name="linerchange">
                      <input type="hidden" value="" name="sandwich">
                      <input type="hidden" value="" name="hottrim">
                      <input type="hidden" value="" name="plaincut">
                      <input type="hidden" value="" name="edgeseal">



                                <button type="submit" class="btn btn-danger" style="background-color:orange">Oluştur</button>
                      </form>
                  </td>
             
           
                  </tr>
                  <tr>
                      <td>Single Square </td>
                      <td>
                      <form action="{{ route('clientTeklifSikShow') }}" method="POST">
                        @csrf
                      <input type="hidden" value="Square" name="figur">
                      <input type="hidden" value="Single" name="singleorcombine">
                      <input type="hidden" value="" name="tip">
                      <input type="hidden" value="" name="pakettip">
                      <input type="hidden" value="" name="fingerlift">
                      <input type="hidden" value="" name="linerchange">
                      <input type="hidden" value="" name="sandwich">
                      <input type="hidden" value="" name="hottrim">
                      <input type="hidden" value="" name="plaincut">
                      <input type="hidden" value="" name="edgeseal">
                        


                          <button type="submit" class="btn btn-danger" style="background-color:orange">Oluştur</button>
                          </form>
                      </td>
                  </tr>
                  <tr>
                      <td>Single Drawing </td>
                      <td>
                      <form action="{{ route('clientTeklifSikShow') }}" method="POST">
                        @csrf
                      <input type="hidden" value="Drawing" name="figur">
                      <input type="hidden" value="Single" name="singleorcombine">
                      <input type="hidden" value="" name="tip">
                      <input type="hidden" value="" name="pakettip">
                      <input type="hidden" value="" name="fingerlift">
                      <input type="hidden" value="" name="linerchange">
                      <input type="hidden" value="" name="sandwich">
                      <input type="hidden" value="" name="hottrim">
                      <input type="hidden" value="" name="plaincut">
                      <input type="hidden" value="" name="edgeseal">
                        


                          <button type="submit" class="btn btn-danger" style="background-color:orange">Oluştur</button>
                          </form>
                      </td>
                  </tr>

                  <tr>
                      <td>Single Square Thinsulate Single Part</td>
                      <td>
                          <form action="{{ route('clientTeklifSikShow') }}" method="POST">
                          @csrf
                          <input type="hidden" value="Square" name="figur">
                      <input type="hidden" value="Single" name="singleorcombine">
                      <input type="hidden" value="Thinsulate" name="tip">
                      <input type="hidden" value="" name="pakettip">
                      <input type="hidden" value="" name="fingerlift">
                      <input type="hidden" value="" name="linerchange">
                      <input type="hidden" value="" name="sandwich">
                      <input type="hidden" value="" name="hottrim">
                      <input type="hidden" value="" name="plaincut">
                      <input type="hidden" value="" name="edgeseal">


                          <button type="submit" class="btn btn-danger" style="background-color:orange">Oluştur</button>
                          </form>
                      </td>
                  </tr>
                  <tr>
                      <td>Single Drawing Thinsulate Single Part</td>
                      <td>
                          <form action="{{ route('clientTeklifSikShow') }}" method="POST">
                          @csrf
                          <input type="hidden" value="Drawing" name="figur">
                      <input type="hidden" value="Single" name="singleorcombine">
                      <input type="hidden" value="Thinsulate" name="tip">
                      <input type="hidden" value="Single Part" name="pakettip">
                      <input type="hidden" value="" name="fingerlift">
                      <input type="hidden" value="" name="linerchange">
                      <input type="hidden" value="" name="sandwich">
                      <input type="hidden" value="" name="hottrim">
                      <input type="hidden" value="" name="plaincut">
                      <input type="hidden" value="" name="edgeseal">


                          <button type="submit" class="btn btn-danger" style="background-color:orange">Oluştur</button>
                          </form>
                      </td>
                  </tr>
                  <tr>
                      <td>Combine Square AFT+AFT</td>
                      <td>
                          <form action="{{ route('clientTeklifSikShow') }}" method="POST">
                          @csrf
                          <input type="hidden" value="Square" name="figur">
                      <input type="hidden" value="Combine" name="singleorcombine">
                      <input type="hidden" value="AFT+AFT" name="tip">
                      <input type="hidden" value="" name="pakettip">
                      <input type="hidden" value="" name="fingerlift">
                      <input type="hidden" value="" name="linerchange">
                      <input type="hidden" value="" name="sandwich">
                      <input type="hidden" value="" name="hottrim">
                      <input type="hidden" value="" name="plaincut">
                      <input type="hidden" value="" name="edgeseal">


                          <button type="submit" class="btn btn-danger" style="background-color:orange">Oluştur</button>
                          </form>
                      </td>
                  </tr>
                  <tr>
                      <td>Combine Drawing AFT+AFT</td>
                      <td>
                          <form action="{{ route('clientTeklifSikShow') }}" method="POST">
                          @csrf
                          <input type="hidden" value="Drawing" name="figur">
                      <input type="hidden" value="Combine" name="singleorcombine">
                      <input type="hidden" value="AFT+AFT" name="tip">
                      <input type="hidden" value="" name="pakettip">
                      <input type="hidden" value="" name="fingerlift">
                      <input type="hidden" value="" name="linerchange">
                      <input type="hidden" value="" name="sandwich">
                      <input type="hidden" value="" name="hottrim">
                      <input type="hidden" value="" name="plaincut">
                      <input type="hidden" value="" name="edgeseal">


                          <button type="submit" class="btn btn-danger" style="background-color:orange">Oluştur</button>
                          </form>
                      </td>
                  </tr>
                  <tr>
                      <td>Combine Square Thinsulate+TransferTape</td>
                      <td>
                          <form action="{{ route('clientTeklifSikShow') }}" method="POST">
                            @csrf
                          <input type="hidden" value="Square" name="figur">
                      <input type="hidden" value="Combine" name="singleorcombine">
                      <input type="hidden" value="Thinsulate+TransferTape" name="tip">
                      <input type="hidden" value="" name="pakettip">
                      <input type="hidden" value="" name="fingerlift">
                      <input type="hidden" value="" name="linerchange">
                      <input type="hidden" value="" name="sandwich">
                      <input type="hidden" value="" name="hottrim">
                      <input type="hidden" value="" name="plaincut">
                      <input type="hidden" value="" name="edgeseal">


                          <button type="submit" class="btn btn-danger" style="background-color:orange">Oluştur</button>
                          </form>
                      </td>
                  </tr>
                  <tr>
                      <td>Combine Drawing Thinsulate+TransferTape</td>
                      <td>
                          <form action="{{ route('clientTeklifSikShow') }}" method="POST">
                            @csrf
                          <input type="hidden" value="Drawing" name="figur">
                      <input type="hidden" value="Combine" name="singleorcombine">
                      <input type="hidden" value="Thinsulate+TransferTape" name="tip">
                      <input type="hidden" value="" name="pakettip">
                      <input type="hidden" value="" name="fingerlift">
                      <input type="hidden" value="" name="linerchange">
                      <input type="hidden" value="" name="sandwich">
                      <input type="hidden" value="" name="hottrim">
                      <input type="hidden" value="" name="plaincut">
                      <input type="hidden" value="" name="edgeseal">


                          <button type="submit" class="btn btn-danger" style="background-color:orange">Oluştur</button>
                          </form>
                      </td>
                  </tr>
           
                
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Ad</th>
                    <th>Oluştur</th>
               
           
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