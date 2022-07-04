@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Siparisler')

@section('content')

<div class="card">

<ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#siparisler" data-toggle="tab">Siparişler</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ongoru" data-toggle="tab">Öngörüler</a></li>
                    <li class="nav-item"><a class="nav-link" href="#grafik" data-toggle="tab">Grafik</a></li>
                   
                  </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="siparisler">
            <div class="card-header">
                <h3 class="card-title">Siparisler</h3>
                <br>
                <br>
                <form action="{{ route('userShowSiparisOlustur') }}" method="GET">
                    <button type="submit" class="btn btn-success">Siparis Olustur</button>
                </form>
                <br>
                <br>
                <form action="{{ route('userSiparisImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-2">
                <select name="firmID" id="firmID" class="form-control" required>
                    <option value="">Firma Seç</option>
                    @foreach ($firms as $firm)
                    <option value="{{ $firm->firma_ID }}">{{ $firm->firma_Ad }}</option>
                    @endforeach
                </select>
            
                </div>
                <div class="col-2">
                <input type="file" name="file" class="form-control" required>
                <br>
               
                </div>
                <div class="col-1">
                <select name="sevk" id="sevk" class="form-control" required>
                    <option value="Bur-bant">Bur-bant</option>
                    <option value="KARGOUG">KARGOUG</option>
                    <option value="KARGOUA">KARGOUA</option>
                </select>

                </div>
                <button class="btn btn-success">Import Siparis Data</button>
            </form>
            </div>

            </div>
              <!-- /.card-header -->
              
                <div class="card-body">
                    <table id="siparis" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Sipariş Numarası</th>
                        <th>Urun Adı</th>
                        <th>Urun Kodu</th>
                        <th>Siparis Firma</th>
                        <th>Siparis Miktar</th>
                        <th>Siparis Tarih</th>
                        <th>Sipariş Termin Tarih</th>
                        <th>Siparis Sevk Tarih</th>
                        <th>Durum</th>
                        <th>Planla</th>
                      
                        <th>Kapat</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                      <?php $sayi=0; ?>
                @foreach ($sipariss as $siparis)
                <?php $sayi = $sayi + 1; ?>
                    <tr>
                        <td>{{$siparis->siparis_no}}</td>
                    <td>{{ $siparis->urun_Ad }}</td>
                    <td>{{ $siparis->urun_Kod }}</td>
                    <td>{{ $siparis->firma_Ad }}</td>
                    <td>{{ $siparis->siparis_miktar }}</td>
         
                    <td>{{ $siparis->siparis_tarih }}</td>
                    <td>{{ $siparis->siparis_termintarih }}</td>
                    <td><div id="sevktarih{{$siparis->siparis_ID}}">{{ $siparis->siparis_sevktarih }}</div></td>
                    <td>

                     @if($siparis->siparis_durum=="Açık")   
                    <div style="color:green" id="durum{{$siparis->siparis_ID}}">{{ $siparis->siparis_durum }}</div>
                    @else
                    <div style="color:red" id="durum{{$siparis->siparis_ID}}">{{ $siparis->siparis_durum }}</div>
                    @endif
                
                    </td>
                    @if($siparis->siparis_plantarih=="")
                    <td><button  data-toggle="modal" 
    data-target="#siparisPlanlaModal" class="btn btn-info" onclick ="siparisplanla({{$siparis->urun_ID}},{{$siparis->siparis_miktar}},{{$siparis->siparis_ID}})">Planla</button></td>
   
    @else
    <td>Planlandı-{{$siparis->siparis_plantarih}}</td>
    @endif
              
                    <td><a class="nav-link" 
    style="cursor: pointer" 
    data-toggle="modal" 
    data-target="#sipariskapatModal{{$sayi}}">Kapat</a></td>
                   
                    </tr>
                @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sipariş Numarası</th>
                        <th>Urun Adı</th>
                        <th>Urun Kodu</th>
                        <th>Siparis Firma</th>
                        <th>Siparis Miktar</th>
                        <th>Siparis Tarih</th>
                        <th>Siparis Termin Tarih</th>
                        <th>Siparis Sevk Tarih</th>
                        <th>Durum</th>
                        <th>Planla</th>
                    
                        <th>Kapat</th>
                       
                     
                    </tr>
                    </tfoot>
                    </table>
                </div>
              <!-- /.card-body -->
        </div>
            <!-- /.card -->
          <!-- /.col -->
   
  
        <div class="tab-pane" id="ongoru">
            <div class="card-header">
                <h3 class="card-title">Ongoruler</h3>
                <br>
                <br>
                <form action="{{ route('userShowOngoruOlustur') }}" method="GET">
                    <button type="submit" class="btn btn-success">Ongoru Olustur</button>

                </form>
                <br>
                <br>
                <form action="{{ route('userOngoruImport') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-2">
                <select name="firmID" id="firmID" class="form-control" required>
                    <option value="">Firma Seç</option>
                    @foreach ($firms as $firm)
                    <option value="{{ $firm->firma_ID }}">{{ $firm->firma_Ad }}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-2">
                <input type="file" name="file" class="form-control" required>
                <br>
               
                </div>
                <button class="btn btn-success">Import Ongoru Data</button>
            </form>
            </div>
            </div>
              <!-- /.card-header -->
              
            <div class="card-body">
                    <table id="ongorus" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Urun Adı</th>
                        <th>Urun Kodu</th>
                        <th>Ongoru Firma</th>
                        <th>Ongoru Tarih</th>
                        <th>Ongoru Termin Tarih</th>
                        <th>Ongoru Miktar</th>
                        <th>Sipariş Aç</th>
                   
                    </tr>
                    </thead>
                    <tbody>
                        <?php $sayi = 0; ?>
                @foreach ($ongorus as $ongoru)
                <?php ;
                    $sayi += 1;
                ?>
                    <tr>
                    <td>{{ $ongoru->urun_Ad }}</td>
                    <td>{{ $ongoru->urun_Kod }}</td>
                    <td>{{ $ongoru->firma_Ad }}</td>
                    <td>{{ $ongoru->ongoru_tarih }}</td>
                    <td>{{ $ongoru->ongoru_termintarih }}</td>
                    <td>{{ $ongoru->ongoru_miktar }}</td>
                    <td><a class="nav-link" 
    style="cursor: pointer" 
    data-toggle="modal" 
    data-target="#siparisModal{{$sayi}}">Siparis Aç</a></td>
                  
                    </tr>
                @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Urun Adı</th>
                        <th>Urun Kodu</th>
                        <th>Ongoru Firma</th>
                        <th>Ongoru Tarih</th>
                        <th>Ongoru Termin Tarih</th>
                        <th>Ongoru Miktar</th>
                        <th>Sipariş Aç</th>
                        
                    </tr>
                    </tfoot>
                    </table>
           
            </div>
        </div>
        <div class="tab-pane" id="grafik">
      
      
            <!-- AREA CHART -->
            <div class="card card-primary" style="display:none">
              <div class="card-header">
                <h3 class="card-title">Area Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-danger" style="display:none">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- PIE CHART -->
            <div class="card card-danger" style="display:none">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

     
          <!-- /.col (LEFT) -->
     
            <!-- LINE CHART -->
            <div class="card card-info" style="display:none">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- BAR CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Son 2 Aylık Öngörü ve Siparişler</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- STACKED BAR CHART -->
         
   
          <!-- /.col (RIGHT) -->
   
        <!-- /.row -->

            
        </div>

<?php $sayi = 0; ?>
</div>
@foreach ($ongorus as $ongoru)
<?php 
    $sayi += 1;

?>

<div class="modal fade" id="siparisModal{{$sayi}}" tabindex="-1" role="dialog" aria-labelledby="siparisModal{{$sayi}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="siparisModal{{$sayi}}">{{ $ongoru->urun_Ad }}  /  {{$ongoru->urun_Kod }}
                    <br>
                    {{ $ongoru->firma_Ad}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('OngoruToSiparis') }}">
                    @csrf
                    <input type="hidden" value="{{$ongoru->ongoru_ID}}" name="ongoruID" id="ongoruID">
                    <div class="form-group row">
                        <label for="spno" class="col-md-4 col-form-label text-md-right">Sipariş No</label>

                        <div class="col-md-6">
                            <input id="spno" type="text" class="form-control" name="spno" value="{{'SP'.\Carbon\Carbon::now()->format('Ymd').rand(1,99)}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="miktar" class="col-md-4 col-form-label text-md-right">Miktar</label>

                        <div class="col-md-6">
                            <input id="miktar" type="number" class="form-control" name="miktar" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sevktarih" class="col-md-4 col-form-label text-md-right">Sevkiyat Tarih</label>

                        <div class="col-md-6">
                            <input id="sevktarih" type="date" class="form-control" name="sevktarih" value="" required>

                         
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sevksekli" class="col-md-4 col-form-label text-md-right">Sevkiyat Şekli</label>

                        <div class="col-md-6">
                            <select name="sevksekli" id="sevksekli" class="form-control">
                                <option value="Bur-bant">Bur-bant</option>
                                <option value="KARGOUA">KARGOUA</option>
                                <option value="KARGOUG">KARGOUG</option>
                            </select>

                         
                        </div>
                    </div>

                 

                  

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                               Oluştur
                            </button>

                        </div>
                    </div>
                    <table>
                       <label for="">Ongoru Siparişleri</label>
                        <tr>
                            <th>Sevk Şekli</th>
                            <th>Miktar</th>
                            <th>Tarih</th>
                        <tr>
                            @foreach ($sipariss as $siparis)
                            @if($siparis->siparis_ongoruID==$ongoru->ongoru_ID)
                        <tr>
                            <td>
                             {{$siparis->siparis_sevkiyat}}
                            </td>
                            <td>
                                {{$siparis->siparis_miktar}}
                            </td>
                            <td>
                                {{$siparis->siparis_tarih}}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach
<?php $sayi = 0; ?>
@foreach($sipariss as $siparis)
<?php $sayi += 1; ?>
<div class="modal fade" id="sipariskapatModal{{$sayi}}" tabindex="-1" role="dialog" aria-labelledby="sipariskapatModal{{$sayi}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sipariskapatModal{{$sayi}}">
                    <br>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              
                    @csrf
                    <div class="form-group row">
                        <label for="miktar" class="col-md-4 col-form-label text-md-right">Miktar</label>

                        <div class="col-md-6">
                            <input id="kapatmiktar{{$sayi}}" type="number" class="form-control" name="kapatmiktar{{$sayi}}" value="" required>
                        </div>
                    </div>         

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" id="kapatbutton{{$sayi}}" onclick="sipariskapat({{ $siparis->siparis_ID }},{{$sayi}})" class="btn btn-primary">
                               Kapat
                            </button>

                        </div>
                    </div>
              
            </div>
        </div>
    </div>
</div>
@endforeach



<div class="modal fade" id="siparisPlanlaModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              
                
                    <div class="form-group row">
                        
                      
                        <div class="col-3">
                            <div id="xlotnodiv">
                              
                            </div>
                        </div>
              
            
                        
                  
                      <div class="col-3">
                          <div id="xmiktardiv">
                            
                          </div>
                      </div>

                      <div class="col-3">
                          <div id="xurunadstokdiv">
                            
                          </div>
                      </div>

                      <div class="col-3">
                          <div id="xstokemrisiparisdiv">
                            
                          </div>
                      </div>
                  </div>   
                  <div class="form-group row">
                        <div class="col-3">
                              <div id="xisemridiv">

                              </div>
                        </div>
                        <div class="col-3">
                              <div id="xstokmiktardiv">

                              </div>
                        </div>
                        <div class="col-3">
                              <div id="xurunadisemridiv">

                              </div>
                        </div>
                        <div class="col-3">
                              <div id="xsiparisdiv">

                              </div>
                        </div>
                    
                   
                  </div>        

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                          <input type="hidden" id="plansiparisid">
                          <input type="hidden" id="siparissayisi" >
                          <input type="hidden" id="stokemrisayisi" >
                          <input type="hidden" id="planstokemrisayisi" >
                          <input type="hidden" id="plansiparissayisi" >
                          <input type="hidden" id="plantarih" value="<?php echo \Carbon\Carbon::now()->format('Y-m-d'); ?>">
                            <button type="submit" id="planbitirbutton" style="display:none" onclick="planbitir()" class="btn btn-primary">
                               Bitir
                            </button>

                        </div>
                    </div>
              
            </div>
        </div>
    </div>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['{{$last2month}}','{{$lastmonth}}'],
      datasets: [
        {
          label               : 'Ongoru Termin',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{{$last2monthongorusvalue}},{{$lastmonthongorusvalue}}]
        },
        
        {
          label               : 'Siparis Termin',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$last2monthsiparisvalue}},{{$lastmonthsiparisvalue}}]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : true,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>

@endsection