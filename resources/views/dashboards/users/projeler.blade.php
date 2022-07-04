@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Projeler')

@section('content')

<div class="card">
              <div class="card-header">
          
              <button  data-toggle="modal" 
    data-target="#addProjectModal" class="btn btn-success" >Proje Ekle</button>
         
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="projects" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Proje Tanımı</th>
                  <th>PO</th>
                  <th>Proje Kodu</th>
                  <th>BR</th>
                  <th>Seri</th>
                  <th>Musteri</th>
                  <th>Hammadde1</th>
                  <th>Hammadde2</th>
                  <th>Hammadde3</th>
                  <th>adet</th>
                  <th>Talep Tarih</th>
                  <th>Gonderim Tarih</th>
                  <th>Proje Fiyat</th>
                  <th>Fatura Br.Fyt</th>
                  <th>Fatura Tplm.Fyt</th>
                  <th>Olcum</th>
                  <th>Dokuman</th>
                  <th>Duzenle</th>
                  <th>Yinele</th>
               
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($projects as $project)
                  <tr>
                  <td>{{$project->proje_tanim}}</td>
                  <td>{{$project->proje_po}}</td>
                  <td>{{$project->proje_kod}}</td>
                  <td>{{$project->proje_br}}</td>
                  <td>{{$project->proje_seri}}</td>
                  <td>{{$project->proje_musteri}}</td>
                  <td>{{$project->proje_hammadde1}}/{{$project->proje_hammadde1miktar}}</td>
                  <td>{{$project->proje_hammadde2}}/{{$project->proje_hammadde2miktar}}</td>
                  <td>{{$project->proje_hammadde3}}/{{$project->proje_hammadde3miktar}}</td>
                  <td>{{$project->proje_adet}}</td>
                  <td>{{$project->proje_taleptarih}}</td>
                  <td>{{$project->proje_gonderimtarih}}</td>
                  <td>{{$project->proje_fiyat}} {{$project->proje_fiyatkur}}</td>
                  <td>{{$project->proje_faturafiyat}} Euro</td>
                  <td>{{$project->proje_toplamfiyat}} TL</td>
                  <td><form action="{{ route('DownloadPOFile') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$project->proje_olcum}}" name="dosyaad">
                   
                    <button type="submit" class="btn btn-info">{{$project->proje_olcum}}</button>
                  </form></td>
                  <td><form action="{{ route('DownloadPOFile') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$project->proje_dokuman}}" name="dosyaad">
                   
                    <button type="submit" class="btn btn-info">{{$project->proje_dokuman}}</button>
                  </form></td>
                  
                  
                  
                  <td><form action="{{ route('userShowUpdateProject') }}" method="GET">
                    @csrf
                    <input type="hidden" value="{{ $project->proje_ID }}" name="projectID">
                    <input type="hidden" value="duzenle" name="tip">
                   
                    <button type="submit" class="btn btn-info">Duzenle</button>
                  </form></td>
                  <td><form action="{{ route('userShowUpdateProject') }}" method="GET">
                    @csrf
                    <input type="hidden" value="{{ $project->proje_ID }}" name="projectID">
                    <input type="hidden" value="yeni" name="tip">
                   
                    <button type="submit" class="btn btn-success">Yinele</button>
                  </form></td>
          
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Proje Tanımı</th>
                  <th>PO</th>
                  <th>Proje Kodu</th>
                  <th>BR</th>
                  <th>Seri</th>
                  <th>Musteri</th>
                  <th>Hammadde1</th>
                  <th>Hammadde2</th>
                  <th>Hammadde3</th>
                  <th>adet</th>
                  <th>Talep Tarih</th>
                  <th>Gonderim Tarih</th>
                  <th>Proje Fiyat</th>
                  <th>Fatura Br.Fyt</th>
                  <th>Fatura Tplm.Fyt</th>
                  <th>Olcum</th>
                  <th>Dokuman</th>
                  <th>Duzenle</th>
                  <th>Yinele</th>
              
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
  <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <label for="">Proje Ekle</label>
            
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('AddProject')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">

            <div class="form-group row mb-4">
         
              <div class="col-md-8 offset-md-1">
                    <select name="projetur" id="projetur" class="form-control" onchange="pofiyat()" required>
                    <option value="PR">PR</option>
                      <option value="PD">PD</option>
                 
                    </select>
              </div>
            </div>
           
            <div class="form-group row mb-4">
         
              <div class="col-md-8 offset-md-1">
                    <input type="text" name="projectname" class="form-control" placeholder="Proje Tanımı" required>
              </div>
            </div>
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                    <input type="text" name="po" class="form-control" placeholder="PO" required>
              </div>

            </div>

            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                    <input type="text" name="projectcode" class="form-control" placeholder="Proje Kodu" >
              </div>

            </div>
        
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                    <input type="text" name="brcode" class="form-control" placeholder="BR Kodu">
              </div>

            </div>
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                    <input type="text" name="sericode" class="form-control" placeholder="Seri Kodu">
              </div>

            </div>
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                    <input type="text" name="customer" class="form-control" placeholder="Müşteri" required>
              </div>

            </div>
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                    <select name="hammadde1" class="form-control" required>
                      <option value="">Hammadde 1 Seç</option>
                      @foreach($products as $product)
                      <option value="{{$product->urun_ID}}">{{$product->urun_Ad}}</option>
                      @endforeach
                    </select>
              </div>

            </div>
            <div class="form-group row mb-4">
        
        <div class="col-md-8 offset-md-1">
          
            <input type="float" name="kullanimmiktar1" class="form-control" placeholder="H1.Kul.Miktar" required> m2
        </div>

      </div>
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                    <select name="hammadde2" class="form-control" >
                      <option value="">Hammadde 2 Seç</option>
                      @foreach($products as $product)
                      <option value="{{$product->urun_ID}}">{{$product->urun_Ad}}</option>
                      @endforeach
                    </select>
              </div>
              

            </div>
            <div class="form-group row mb-4">
        
        <div class="col-md-8 offset-md-1">
            <input type="float" name="kullanimmiktar2" class="form-control" placeholder="H2.Kul.Miktar"> m2
        </div>

      </div>
      <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                    <select name="hammadde3" class="form-control" >
                      <option value="">Hammadde 3 Seç</option>
                      @foreach($products as $product)
                      <option value="{{$product->urun_ID}}">{{$product->urun_Ad}}</option>
                      @endforeach
                    </select>
              </div>

            </div>
      <div class="form-group row mb-4">
        
        <div class="col-md-8 offset-md-1">
            <input type="float" name="kullanimmiktar3" class="form-control" placeholder="H3.Kul.Miktar"> m2
        </div>

      </div>
            
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                   <input type="number" name="adet" class="form-control" placeholder="Adet" onchange="pofiyat()" required>
              </div>

            </div>
          
            
            <div class="form-group row mb-4">

              <div class="col-md-8 offset-md-1">
                <label for="">Talep Tarih</label>
                  <input type="date" name="taleptarih" class="form-control" required>
              </div>

            </div>
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                <label for="">Gonderim Tarih</label>
                  <input type="date" name="gonderimtarih" class="form-control">
              </div>

            </div>
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                  <input type="float" name="projefiyat" class="form-control"  placeholder="Proje fiyatı" >
                 <select name="fiyatkur" class="form-control">
                   <option value="TL">TL</option>
                   <option value="Euro">Euro</option>
                   <option value="Dolar">Dolar</option>
                 </select>
              </div>

            </div>
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                <label for=""> Fatura Fiyatı</label>
                  <input type="float" name="faturafiyat" id="faturafiyat" value="0.15" class="form-control" placeholder="Fatura fiyatı" required> Euro
              </div>

            </div>
            <div class="form-group row mb-4">
        
              <div class="col-md-8 offset-md-1">
                <label for="">Fatura Fiyat Toplam</label>
                  <input type="float" name="faturafiyattoplam" id="faturafiyattoplam" class="form-control" placeholder="Fatura fiyatı Toplam" required> TL
              </div>

            </div>
            <div class="form-group row mb-4">

              <div class="col-md-8 offset-md-1">
                <label for="">Olcum Raporu</label>
                  <input type="file" name="olcum" class="form-control">
              </div>

            </div>
            <div class="form-group row mb-4">

              <div class="col-md-8 offset-md-1">
                <label for="">Dokuman</label>
                  <input type="file" name="dokuman" class="form-control">
              </div>

            </div>
            <div class="form-group row mb-4">

              <div class="col-md-8 offset-md-1">
             <input type="text" name="aciklama" placeholder="Aciklama" class="form-control" >
              </div>

            </div>
            











            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">

                <button type="submit" class="btn btn-success">Ekle</button>

                </div>
            </div>
            </form>
              
            </div>
        </div>
    </div>
</div>

@endsection