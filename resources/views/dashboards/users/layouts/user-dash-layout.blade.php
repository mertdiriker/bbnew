<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <base href="{{ \URL::to('/') }}">

  <!-- Google Font: Source Sans Pro -->
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="{{ \URL::to('/')}}" class="brand-link">
      <img src="https://i.pinimg.com/originals/cb/3f/b6/cb3fb61d0961abe4d9e762519ffda7b2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Burbant</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->picture }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact nav-child-indent nav-collapse-hide-child nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('user.dashboard')}}" class="nav-link {{ (request()->is('user/dashboard*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
             <li class="nav-item">
             <a href="{{ route('user.profile')}}" class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                   Profile
                  </p>
                </a>
              </li>
           <li class="nav-item">
            <a href="{{ route('user.ekle')}}" class="nav-link {{ (request()->is('user/ekle*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
              Ekle
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.urunler')}}" class="nav-link {{ (request()->is('user/urunler*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Urunler
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.firmalar')}}" class="nav-link {{ (request()->is('user/firmalar*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Firmalar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.projeler')}}" class="nav-link {{ (request()->is('user/projeler*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Projeler
              </p>
            </a>
          </li>
  
        
          <li class="nav-item">
            <a href="{{ route('user.teklifler')}}" class="nav-link {{ (request()->is('user/teklifler*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Teklifler
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{ route('user.makine')}}" class="nav-link {{ (request()->is('user/makine*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Makineler
              </p>
            </a>
          </li> 
          </li>
            <li class="nav-item">
            <a href="{{ route('user.urunhareket')}}" class="nav-link {{ (request()->is('user/urunhareket*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Stok
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{ route('user.siparis')}}" class="nav-link {{ (request()->is('user/siparis*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Siparisler
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{ route('user.process')}}" class="nav-link {{ (request()->is('user/process*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Processler
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{ route('user.isemri')}}" class="nav-link {{ (request()->is('user/isemri*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              İşemirleri
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{ route('user.3mimport')}}" class="nav-link {{ (request()->is('user/3mimport*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              3mimport
              </p>
            </a>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="content-wrapper">
    
  @include('flash-message')
  @yield('content')
 
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>

{{-- CUSTOM JS CODES --}}
<script>

  $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });
  
  $(function(){

    /* UPDATE ADMIN PERSONAL INFO */

    $('#userInfoForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.admin_name').each(function(){
                     $(this).html( $('#userInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });



    $(document).on('click','#change_picture_btn', function(){
      $('#user_image').click();
    });


    $('#user_image').ijaboCropTool({
          preview : '.user_picture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("userPictureUpdate") }}',
          // withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
       });


    $('#changePassworduserForm').on('submit', function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePassworduserForm')[0].reset();
                alert(data.msg);
              }
            }
         });
    });

    
  });

</script>
<script>
  
  function download(){
    var a = document.body.appendChild(
        document.createElement("a")
    );
    a.download = "export.html";
    a.href = "data:text/html," + document.getElementById("content-wrapper").innerHTML; // Grab the HTML
    saveAs(a, "static.txt");
    a.click(); // Trigger a click on the element
}
</script>

<script>
  $(function () {
    $("#products").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#products_wrapper .col-md-6:eq(0)');
    $("#firms").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#firms_wrapper .col-md-6:eq(0)');
    $("#projects").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#projects_wrapper .col-md-6:eq(0)');
    $("#teklifs").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#teklifs_wrapper .col-md-6:eq(0)');
    $("#moves").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,"order": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#moves_wrapper .col-md-6:eq(0)');
    $("#stoks").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#stoks_wrapper .col-md-6:eq(0)');
    $("#AutoNumber1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#AutoNumber1_wrapper .col-md-6:eq(0)');
    $("#productfirms").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#AutoNumber1_wrapper .col-md-6:eq(0)');
    $("#siparis").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#siparis_wrapper .col-md-6:eq(0)');
    $("#ongorus").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#ongorus_wrapper .col-md-6:eq(0)');
    $("#processs").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#processs_wrapper .col-md-6:eq(0)');
    $("#operasyons").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#operasyons_wrapper .col-md-6:eq(0)');
    $("#workorders").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#workorder_wrapper .col-md-6:eq(0)');
    $("#import3m").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,"order": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#import3m_wrapper .col-md-6:eq(0)');
    $("#risks").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#risks_wrapper .col-md-6:eq(0)');
    $("#kontrols").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#kontrols_wrapper .col-md-6:eq(0)');
    
   
  });
</script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script>
<script>
  function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
 
  alert(decodedText);
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 10, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
<script type="text/javascript">

function SquareOnclick()
{

document.getElementById('DivFigure').style.display = 'none'; 
document.getElementById('urun').innerHTML += "Square/Rectangle ";
document.getElementById('DivDrawing').style.display = 'block'; 

document.getElementById('Single').checked = false; 
document.getElementById('Combine').checked = false;

document.getElementById('DivSingle').style.display = 'block'; 
document.getElementById('DivCombine').style.display = 'block';

}

function DrawingOnclick()
{
document.getElementById('DivFigure').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  "Drawing";

document.getElementById('DivDrawing').style.display = 'block'; 

document.getElementById('Single').checked = false; 
document.getElementById('Combine').checked = false;

document.getElementById('DivSingle').style.display = 'block'; 
document.getElementById('DivCombine').style.display = 'block';
}

function LogoOnclick()
{



document.getElementById('DivFigure').style.display = 'none'; 
document.getElementById('DivPack').style.display = 'block'; 
document.getElementById('urun').innerHTML += "Logo, ,Single, AFT, ";
 


document.getElementById('DivHotTrim').style.display = 'none'; 
document.getElementById('DivFingerLift').style.display = 'none'; 
document.getElementById('DivSandwich').style.display = 'none'; 
document.getElementById('DivPlainCut').style.display = 'none'; 
document.getElementById('DivEdgeSeal').style.display = 'none'; 
document.getElementById('Single').checked = true; 
document.getElementById('AFT').checked = true; 

}

function SingleOnclick()
{

document.getElementById('DivDrawing').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", Single";



document.getElementById('DivProduct').style.display = 'block'; 
document.getElementById('DivAFT').style.display = 'block'; 
document.getElementById('DivThinsulate').style.display = 'block'; 
document.getElementById('DivDuallock').style.display = 'block'; 
document.getElementById('DivTransferTape').style.display = 'block'; 
document.getElementById('DivOneSidedTape').style.display = 'block'; 
document.getElementById('DivAFTAFT').style.display = 'none';  
document.getElementById('DivTTransferTape').style.display = 'none';
document.getElementById('DivDuallockDuallock').style.display = 'none';  


document.getElementById('AFT').checked = false; 
document.getElementById('Thinsulate').checked = false; 
document.getElementById('Duallock').checked = false; 
document.getElementById('TransferTape').checked = false; 
document.getElementById('OneSidedTape').checked = false; 
document.getElementById('AFTAFT').checked = false;
document.getElementById('TTransferTape').checked = false;
document.getElementById('DuallockDuallock').checked = false;

}


function CombineOnclick()
{

document.getElementById('DivDrawing').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", Combine";

document.getElementById('DivProduct').style.display = 'block'; 
document.getElementById('DivAFT').style.display = 'none'; 
document.getElementById('DivThinsulate').style.display = 'none'; 
document.getElementById('DivDuallock').style.display = 'none'; 
document.getElementById('DivTransferTape').style.display = 'none'; 
document.getElementById('DivOneSidedTape').style.display = 'none'; 
document.getElementById('DivAFTAFT').style.display = 'block';  
document.getElementById('DivTTransferTape').style.display = 'block';
document.getElementById('DivDuallockDuallock').style.display = 'block';  
 

document.getElementById('AFT').checked = false; 
document.getElementById('Thinsulate').checked = false; 
document.getElementById('Duallock').checked = false; 
document.getElementById('TransferTape').checked = false; 
document.getElementById('OneSidedTape').checked = false; 
document.getElementById('AFTAFT').checked = false;
document.getElementById('TTransferTape').checked = false;
document.getElementById('DuallockDuallock').checked = false;
 
}

function AFTOnclick()
{

document.getElementById('DivProduct').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", AFT";

document.getElementById('DivPack').style.display = 'block'; 
document.getElementById('DivJob').style.display = 'none'; 
document.getElementById('DivFingerLift').style.display = 'block'; 
document.getElementById('DivLinerChange').style.display = 'block'; 
document.getElementById('DivHotTrim').style.display = 'none'; 
document.getElementById('DivPlainCut').style.display = 'none'; 
document.getElementById('DivEdgeSeal').style.display = 'none'; 
document.getElementById('DivSandwich').style.display = 'none'; 
document.getElementById('DivSinglePart').style.display = 'block';  
document.getElementById('DivPartOnSheet').style.display = 'block';
document.getElementById('DivPartOnRoll').style.display = 'block';  
 

document.getElementById('FingerLift').checked = false; 
document.getElementById('LinerChange').checked = false;
document.getElementById('SinglePart').checked = false;
document.getElementById('PartOnSheet').checked = false;
document.getElementById('PartOnRoll').checked = false; 
document.getElementById('HotTrim').checked = false; 
document.getElementById('PlainCut').checked = false; 
document.getElementById('EdgeSeal').checked = false; 
document.getElementById('Sandwich').checked = false;
 
}

function ThinsulateOnclick()
{
document.getElementById('DivProduct').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", Thinsulate";

document.getElementById('DivPack').style.display = 'block'; 
document.getElementById('DivJob').style.display = 'none'; 
document.getElementById('DivFingerLift').style.display = 'none'; 
document.getElementById('DivLinerChange').style.display = 'none'; 
document.getElementById('DivHotTrim').style.display = 'block'; 
document.getElementById('DivPlainCut').style.display = 'block'; 
document.getElementById('DivEdgeSeal').style.display = 'block'; 
document.getElementById('DivSandwich').style.display = 'none'; 
document.getElementById('DivSinglePart').style.display = 'block';  
document.getElementById('DivPartOnSheet').style.display = 'none';
document.getElementById('DivPartOnRoll').style.display = 'none';  
 

document.getElementById('FingerLift').checked = false; 
document.getElementById('LinerChange').checked = false; 
document.getElementById('HotTrim').checked = false; 
document.getElementById('PlainCut').checked = false; 
document.getElementById('EdgeSeal').checked = false; 
document.getElementById('Sandwich').checked = false;
document.getElementById('SinglePart').checked = true;
document.getElementById('PartOnSheet').checked = false;
document.getElementById('PartOnRoll').checked = false;
 
}

function DuallockOnclick()
{
document.getElementById('DivProduct').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", Duallock";

 

document.getElementById('DivPack').style.display = 'block'; 
document.getElementById('DivJob').style.display = 'none'; 
document.getElementById('DivFingerLift').style.display = 'block'; 
document.getElementById('DivLinerChange').style.display = 'block'; 
document.getElementById('DivHotTrim').style.display = 'none'; 
document.getElementById('DivPlainCut').style.display = 'none'; 
document.getElementById('DivEdgeSeal').style.display = 'none'; 
document.getElementById('DivSandwich').style.display = 'none'; 
document.getElementById('DivSinglePart').style.display = 'block';  
document.getElementById('DivPartOnSheet').style.display = 'block';
document.getElementById('DivPartOnRoll').style.display = 'block';  
 

document.getElementById('FingerLift').checked = false; 
document.getElementById('LinerChange').checked = false;
document.getElementById('SinglePart').checked = false;
document.getElementById('PartOnSheet').checked = false;
document.getElementById('PartOnRoll').checked = false; 
document.getElementById('HotTrim').checked = false; 
document.getElementById('PlainCut').checked = false; 
document.getElementById('EdgeSeal').checked = false; 
document.getElementById('Sandwich').checked = false;
 
}

function TransferTapeOnclick()
{
document.getElementById('DivProduct').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", Transfer Tape";

 

document.getElementById('DivPack').style.display = 'block'; 
document.getElementById('DivJob').style.display = 'none'; 
document.getElementById('DivFingerLift').style.display = 'block'; 
document.getElementById('DivLinerChange').style.display = 'block'; 
document.getElementById('DivHotTrim').style.display = 'none'; 
document.getElementById('DivPlainCut').style.display = 'none'; 
document.getElementById('DivEdgeSeal').style.display = 'none'; 
document.getElementById('DivSandwich').style.display = 'none'; 
document.getElementById('DivSinglePart').style.display = 'block';  
document.getElementById('DivPartOnSheet').style.display = 'block';
document.getElementById('DivPartOnRoll').style.display = 'block';  
 

document.getElementById('FingerLift').checked = false; 
document.getElementById('LinerChange').checked = false;
document.getElementById('SinglePart').checked = false;
document.getElementById('PartOnSheet').checked = false;
document.getElementById('PartOnRoll').checked = false; 
document.getElementById('HotTrim').checked = false; 
document.getElementById('PlainCut').checked = false; 
document.getElementById('EdgeSeal').checked = false; 
document.getElementById('Sandwich').checked = false;
 
}

function OneSidedTapeOnclick()
{
document.getElementById('DivProduct').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", One Sided Tape";


document.getElementById('DivPack').style.display = 'block'; 
document.getElementById('DivJob').style.display = 'none'; 
document.getElementById('DivFingerLift').style.display = 'none'; 
document.getElementById('DivLinerChange').style.display = 'none'; 
document.getElementById('DivHotTrim').style.display = 'none'; 
document.getElementById('DivPlainCut').style.display = 'none'; 
document.getElementById('DivEdgeSeal').style.display = 'none'; 
document.getElementById('DivSandwich').style.display = 'none'; 
document.getElementById('DivSinglePart').style.display = 'block';  
document.getElementById('DivPartOnSheet').style.display = 'block';
document.getElementById('DivPartOnRoll').style.display = 'block';  
 

document.getElementById('FingerLift').checked = false; 
document.getElementById('LinerChange').checked = false;
document.getElementById('SinglePart').checked = false;
document.getElementById('PartOnSheet').checked = false;
document.getElementById('PartOnRoll').checked = false; 
document.getElementById('HotTrim').checked = false; 
document.getElementById('PlainCut').checked = false; 
document.getElementById('EdgeSeal').checked = false; 
document.getElementById('Sandwich').checked = false;
 
}

function AFTAFTOnclick()
{
document.getElementById('DivProduct').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", AFT + AFT";

 

document.getElementById('DivPack').style.display = 'block';
document.getElementById('DivJob').style.display = 'none';  
document.getElementById('DivFingerLift').style.display = 'block'; 
document.getElementById('DivLinerChange').style.display = 'block'; 
document.getElementById('DivHotTrim').style.display = 'none'; 
document.getElementById('DivPlainCut').style.display = 'none'; 
document.getElementById('DivEdgeSeal').style.display = 'none'; 
document.getElementById('DivSandwich').style.display = 'none'; 
document.getElementById('DivSinglePart').style.display = 'block';  
document.getElementById('DivPartOnSheet').style.display = 'block';
document.getElementById('DivPartOnRoll').style.display = 'block';  
 

document.getElementById('FingerLift').checked = false; 
document.getElementById('LinerChange').checked = false;
document.getElementById('SinglePart').checked = false;
document.getElementById('PartOnSheet').checked = false;
document.getElementById('PartOnRoll').checked = false; 
document.getElementById('HotTrim').checked = false; 
document.getElementById('PlainCut').checked = false; 
document.getElementById('EdgeSeal').checked = false; 
document.getElementById('Sandwich').checked = false;
 
}

function TTransferTapeOnclick()
{
document.getElementById('DivProduct').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", Thinsulate + TrainnsferTape";

 

document.getElementById('DivPack').style.display = 'block'; 
document.getElementById('DivJob').style.display = 'none'; 
document.getElementById('DivFingerLift').style.display = 'block'; 
document.getElementById('DivLinerChange').style.display = 'block'; 
document.getElementById('DivHotTrim').style.display = 'none'; 
document.getElementById('DivPlainCut').style.display = 'none'; 
document.getElementById('DivEdgeSeal').style.display = 'none'; 
document.getElementById('DivSandwich').style.display = 'none'; 
document.getElementById('DivSinglePart').style.display = 'block';  
document.getElementById('DivPartOnSheet').style.display = 'block';
document.getElementById('DivPartOnRoll').style.display = 'block';  
 

document.getElementById('FingerLift').checked = false; 
document.getElementById('LinerChange').checked = false;
document.getElementById('SinglePart').checked = false;
document.getElementById('PartOnSheet').checked = false;
document.getElementById('PartOnRoll').checked = false; 
document.getElementById('HotTrim').checked = false; 
document.getElementById('PlainCut').checked = false; 
document.getElementById('EdgeSeal').checked = false; 
document.getElementById('Sandwich').checked = false;
 
}

function DuallockDuallockOnclick()
{
document.getElementById('DivProduct').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", Duallock + Duallock";

 

document.getElementById('DivPack').style.display = 'block'; 
document.getElementById('DivJob').style.display = 'none'; 
document.getElementById('DivFingerLift').style.display = 'block'; 
document.getElementById('DivLinerChange').style.display = 'block'; 
document.getElementById('DivHotTrim').style.display = 'none'; 
document.getElementById('DivPlainCut').style.display = 'none'; 
document.getElementById('DivEdgeSeal').style.display = 'none'; 
document.getElementById('DivSandwich').style.display = 'block'; 
document.getElementById('DivSinglePart').style.display = 'block';  
document.getElementById('DivPartOnSheet').style.display = 'block';
document.getElementById('DivPartOnRoll').style.display = 'block';  
 

document.getElementById('FingerLift').checked = false; 
document.getElementById('LinerChange').checked = false;
document.getElementById('SinglePart').checked = false;
document.getElementById('PartOnSheet').checked = false;
document.getElementById('PartOnRoll').checked = false; 
document.getElementById('HotTrim').checked = false; 
document.getElementById('PlainCut').checked = false; 
document.getElementById('EdgeSeal').checked = false; 
document.getElementById('Sandwich').checked = true;
 
}

function SinglePartOnclick()
{
document.getElementById('DivPack').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", Single Part";



document.getElementById('DivJob').style.display = 'block';  

document.getElementById('DivSize').style.display = 'block'; 
document.getElementById('DivSheetInfo').style.display = 'none'; 
document.getElementById('DivProjectInfo').style.display = 'block'; 
document.getElementById('DivProductSelect').style.display = 'block';	 

document.getElementById('SheetWidthItem').value = 1; 
document.getElementById('SheetLengthItem').checked = 1;
document.getElementById('SpaceSize').checked = 10;

if(document.getElementById('Combine').checked)
	{
		document.getElementById('DivProduct1').style.display = 'block';		
		document.getElementById('DivProduct2').style.display = 'block';		
	} 
	else
	{ 
		document.getElementById('DivProduct1').style.display = 'block';		
		document.getElementById('DivProduct2').style.display = 'none';
	}
 
}

function LinerChangeOnclick()
{


if( document.getElementById('LinerChange').checked ==true)

	{
	document.getElementById('ProducthColor1').value = 'orange';  
	}
	
	drawingchange();
}

function Product1Onchange()
{

document.getElementById("Product1").options.item(0).text="Yunus";
document.getElementById("Product1").options.item(1).text="Yunus1";
document.getElementById("Product1").options.item(2).text="Yunus2";
document.getElementById("Product1").options.item(3).text="Yunus3";

	
	drawingchange();
}



function PartOnSheetOnclick()
{


if( document.getElementById('Thinsulate').checked ==false)
	{
	document.getElementById('DivJob').style.display = 'block';  
	}
	
document.getElementById('DivPack').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ", Part On Sheet";

document.getElementById('DivSize').style.display = 'block'; 
document.getElementById('DivSheetInfo').style.display = 'block'; 
document.getElementById('DivProjectInfo').style.display = 'block'; 

document.getElementById('DivProductSelect').style.display = 'block'; 

document.getElementById('DivJob').style.display = 'block'; 

}

function PartOnRollOnclick()
{
document.getElementById('DivPack').style.display = 'none'; 
document.getElementById('urun').innerHTML +=  ",Part On Roll";
 

document.getElementById('DivSize').style.display = 'block'; 
document.getElementById('DivSheetInfo').style.display = 'none'; 
document.getElementById('DivProjectInfo').style.display = 'block';

document.getElementById('DivProductSelect').style.display = 'block'; 

document.getElementById('SheetWidthItem').value = 5; 
document.getElementById('SheetLengthItem').checked = 1;
document.getElementById('SpaceSize').checked = 10;
 
document.getElementById('DivJob').style.display = 'block'; 
}

function FingerLiftOnclick()
{
 
if(document.getElementById('FingerLift').checked)
	{
		document.getElementById('DivEXTSize').style.display = 'block';		
	} 
	else
	{ 
		document.getElementById('DivEXTSize').style.display = 'none'; 
		document.getElementById('EXTSize').value = 0; 
	}
	 drawingchange();
}


 var canvas = document.getElementById('canvas');
 var cizim = canvas.getContext('2d');

	cizim.beginPath();//circle shape begin
	cizim.lineWidth = 1; 
	
var img1=new Image();
img1.src='beyaz.bmp';

function dikdorgenbantdiz(en,boy,tirnak,bosluk,asagi,saga,renk)

{ 

	en=en*2/2;
	boy=boy*2/2;
	tirnak=tirnak*2/2;
	bosluk=bosluk*2/2;
	asagi=asagi*2/2;
	saga=saga*2/2;
	
  document.getElementById('canvas').width	=(saga *(boy + tirnak + bosluk + bosluk)) + bosluk	
  document.getElementById('canvas').height	=(asagi*(en  + bosluk)) + (bosluk)  	
  
  for (var i = 0; i <asagi ; i++) { 
	for (var j = 0; j <saga ; j++) { 
	cizim.globalAlpha = 1;
	cizim.fillStyle = renk;
	cizim.fillRect(bosluk+(j*(boy+tirnak+bosluk+bosluk)), bosluk+(i*(en+bosluk)), (boy+bosluk) , en);
	//Turn transparency on
	cizim.globalAlpha = 0.2;
	cizim.fillStyle = renk; 
	
	cizim.fillRect(bosluk+(j*(boy+tirnak+bosluk+bosluk)), bosluk+(i*(en+bosluk)), (boy+bosluk+tirnak), en);
	
	cizim.fillStyle = "black"; 
	cizim.globalAlpha = 1;
	
	cizim.font = "10px arial";//Creating a font
	if(document.getElementById('Drawing').checked)
	{
		cizim.fillText("Drawing",bosluk+(j*(bosluk+boy+tirnak+bosluk))+(boy/2),bosluk+(i*(en+bosluk))+(en/2));// Creating text inside the circle
	} 
	if(document.getElementById('Logo').checked)
	{
		cizim.fillText("Logo",bosluk+(j*(bosluk+boy+tirnak+bosluk))+(boy/2),bosluk+(i*(en+bosluk))+(en/2));// Creating text inside the circle
	}
	
	if(document.getElementById('Square').checked)
	{
		cizim.strokeText((i*saga)+1+j,bosluk+(j*(bosluk+boy+tirnak+bosluk))+(boy/2),bosluk+(i*(en+bosluk))+(en/2));// Creating text inside the circle
	}
		if (document.getElementById('FingerLift').checked){
			cizim.fillText(boy + " + " + tirnak + " mm",bosluk+(j*(bosluk+boy+tirnak+bosluk))+(boy/2),bosluk+(i*(en+bosluk)));// Creating text inside the circle
		}
		else
		{
			cizim.fillText(boy + " mm",bosluk+(j*(bosluk+boy+tirnak+bosluk))+(boy/2),bosluk+(i*(en+bosluk)));// Creating text inside the circle
		}
		cizim.fillText(en + " mm",(j*(bosluk+boy+tirnak+bosluk)),bosluk+(i*(en+bosluk))+(en/2));// Creating text inside the circle


	}
  }	
	
}

function drawingchange()

{ 
	document.getElementById('islem').innerHTML="Job: ";
if (document.getElementById('FingerLift').checked)
	document.getElementById('islem').innerHTML +=  "Finger Lift, ";
if (document.getElementById('LinerChange').checked)
	document.getElementById('islem').innerHTML +=  "Liner Change, ";
if (document.getElementById('Sandwich').checked)
	document.getElementById('islem').innerHTML +=  "Sandwich, ";
if (document.getElementById('HotTrim').checked)
	document.getElementById('islem').innerHTML +=  "Hot Trim, ";
if (document.getElementById('PlainCut').checked)
	document.getElementById('islem').innerHTML +=  "Plain Cut, ";
if (document.getElementById('EdgeSeal').checked)
	document.getElementById('islem').innerHTML +=  "Edge Seal, ";
	
	document.getElementById('olcu').innerHTML = "Size: ";
	document.getElementById('olcu').innerHTML +=  document.getElementById('WidthSize').value;
	document.getElementById('olcu').innerHTML +=  " x " + document.getElementById('LengthSize').value;
if (document.getElementById('FingerLift').checked)
	document.getElementById('olcu').innerHTML +=  "+ " + document.getElementById('EXTSize').value;

	document.getElementById('proje').innerHTML =   "Project: ";
	document.getElementById('proje').innerHTML +=   document.getElementById('SOP').value;
	document.getElementById('proje').innerHTML +=  ", " + document.getElementById('EOP').value;
	document.getElementById('proje').innerHTML +=  ", " + document.getElementById('AnnualVolume').value;
	document.getElementById('proje').innerHTML +=  ", " + document.getElementById('OEM').value;
	document.getElementById('proje').innerHTML +=  ", " + document.getElementById('Customer').value;
	document.getElementById('proje').innerHTML +=  ", " + document.getElementById('ProjectName').value;
	document.getElementById('proje').innerHTML +=  ", " + document.getElementById('ProjectCode').value;
	document.getElementById('proje').innerHTML +=  ", " + document.getElementById('Vehicle').value;
	
	document.getElementById('ur').innerHTML =   "Product: ";
	document.getElementById('ur').innerHTML +=   document.getElementById('Product1').value;
	document.getElementById('ur').innerHTML +=  "(" + document.getElementById('ProducthWidth1').value;
	document.getElementById('ur').innerHTML +=  " X " + document.getElementById('ProducthLength1').value;
	document.getElementById('ur').innerHTML +=  ")"
	
	if (document.getElementById('DivProduct2').checked) {
	document.getElementById('ur').innerHTML +=  " + " + document.getElementById('Product2').value;
	document.getElementById('ur').innerHTML +=  "(" + document.getElementById('ProducthWidth2').value;
	document.getElementById('ur').innerHTML +=  " X " + document.getElementById('ProducthLength2').value;
	document.getElementById('ur').innerHTML +=  ")"
	}
	
dikdorgenbantdiz(document.getElementById('WidthSize').value,document.getElementById('LengthSize').value,document.getElementById('EXTSize').value,document.getElementById('SpaceSize').value,document.getElementById('SheetWidthItem').value,document.getElementById('SheetLengthItem').value,document.getElementById('ProducthColor1').value)


//dikdorgenbantdiz(document.getElementById('WidthSize').value,document.getElementById('LengthSize').value,document.getElementById('EXTSize').value,document.getElementById('SheetWidthItem').value,document.getElementById('SheetLengthItem').value,"green")

}
</script>
<script>
  function fiyatcalis() {

document.getElementById('cikanadetdiv').innerHTML = "Dilim:"+Math.floor(((document.getElementById('hammadde1en').value-document.getElementById('dilimilkfire1').value-document.getElementById('dilimsonfire1').value) / document.getElementById('kalip1en').value));
document.getElementById('cikanadet').value = Math.floor(((document.getElementById('hammadde1en').value-document.getElementById('dilimilkfire1').value-document.getElementById('dilimsonfire1').value) / document.getElementById('kalip1en').value));
document.getElementById('cikantabakadiv').innerHTML = "Tabaka:"+Math.floor(((document.getElementById('hammadde1boy').value-document.getElementById('tabakailkfire1').value-document.getElementById('tabakasonfire1').value) / document.getElementById('kalip1boy').value));
document.getElementById('cikantabaka').value = Math.floor(((document.getElementById('hammadde1boy').value-document.getElementById('tabakailkfire1').value-document.getElementById('tabakasonfire1').value) / document.getElementById('kalip1boy').value));
document.getElementById('cikanurundiv').innerHTML = "Urun:"+((document.getElementById('cikanadet').value * document.getElementById('cikantabaka').value * document.getElementById('kalip1gozsayisi').value )-document.getElementById('urunayarfire1').value-document.getElementById('urunkontrolfire1').value);
document.getElementById('cikanurun').value = ((document.getElementById('cikanadet').value * document.getElementById('cikantabaka').value * document.getElementById('kalip1gozsayisi').value )-document.getElementById('urunayarfire1').value-document.getElementById('urunkontrolfire1').value);


document.getElementById('cikanadet2div').innerHTML = "Dilim:"+Math.floor(((document.getElementById('hammadde2en').value-document.getElementById('dilimilkfire2').value-document.getElementById('dilimsonfire2').value) / document.getElementById('kalip2en').value));
document.getElementById('cikanadet2').value = Math.floor(((document.getElementById('hammadde2en').value-document.getElementById('dilimilkfire2').value-document.getElementById('dilimsonfire2').value) / document.getElementById('kalip2en').value));
document.getElementById('cikantabaka2div').innerHTML = "Tabaka:"+Math.floor(((document.getElementById('hammadde2boy').value-document.getElementById('tabakailkfire2').value-document.getElementById('tabakasonfire2').value) / document.getElementById('kalip2boy').value));
document.getElementById('cikantabaka2').value = Math.floor(((document.getElementById('hammadde2boy').value-document.getElementById('tabakailkfire2').value-document.getElementById('tabakasonfire2').value) / document.getElementById('kalip2boy').value));
document.getElementById('cikanurun2div').innerHTML = "Urun:"+((document.getElementById('cikanadet2').value * document.getElementById('cikantabaka2').value * document.getElementById('kalip2gozsayisi').value )-document.getElementById('urunayarfire2').value-document.getElementById('urunkontrolfire2').value);
document.getElementById('cikanurun2').value = ((document.getElementById('cikanadet2').value * document.getElementById('cikantabaka2').value * document.getElementById('kalip2gozsayisi').value )-document.getElementById('urunayarfire2').value-document.getElementById('urunkontrolfire2').value);

document.getElementById('hammadde1m2div').innerHTML = "Hammadde (m2) :"+((document.getElementById('hammadde1en').value * document.getElementById('hammadde1boy').value) / 1000000);
document.getElementById('hammadde1m2').value = ((document.getElementById('hammadde1en').value * document.getElementById('hammadde1boy').value) / 1000000);
document.getElementById('urun1m2div').innerHTML = "1 Urun (m2) :"+(((document.getElementById('kalip1en').value * document.getElementById('kalip1boy').value)-document.getElementById('kalip1fire').value) / document.getElementById('kalip1gozsayisi').value) / 1000000;
document.getElementById('urun1m2').value = (((document.getElementById('kalip1en').value * document.getElementById('kalip1boy').value)-document.getElementById('kalip1fire').value) / document.getElementById('kalip1gozsayisi').value) / 1000000;

document.getElementById('hammadde2m2div').innerHTML = "Hammadde (m2) :"+((document.getElementById('hammadde2en').value * document.getElementById('hammadde2boy').value) / 1000000);
document.getElementById('hammadde2m2').value = ((document.getElementById('hammadde2en').value * document.getElementById('hammadde2boy').value) / 1000000);
document.getElementById('urun2m2div').innerHTML = "1 Urun (m2) :"+(((document.getElementById('kalip2en').value * document.getElementById('kalip2boy').value)-document.getElementById('kalip2fire').value) / document.getElementById('kalip2gozsayisi').value) / 1000000;
document.getElementById('urun2m2').value = (((document.getElementById('kalip2en').value * document.getElementById('kalip2boy').value)-document.getElementById('kalip2fire').value) / document.getElementById('kalip2gozsayisi').value) / 1000000;


document.getElementById('toplamurun1div').innerHTML = "Toplam Urun (m2) :"+(document.getElementById('cikanurun').value * document.getElementById('urun1m2').value);
document.getElementById('toplamurun1').value = (document.getElementById('cikanurun').value * document.getElementById('urun1m2').value);
document.getElementById('toplamfire1div').innerHTML = "Toplam Fire (m2) :"+(document.getElementById('hammadde1m2').value - document.getElementById('toplamurun1').value);
document.getElementById('toplamfire1').value = (document.getElementById('hammadde1m2').value - document.getElementById('toplamurun1').value);
document.getElementById('urun1verimlilikdiv').innerHTML = "%"+((document.getElementById('toplamurun1').value * 100) / document.getElementById('hammadde1m2').value);
document.getElementById('urun1verimlilik').value = ((document.getElementById('toplamurun1').value * 100) / document.getElementById('hammadde1m2').value);

document.getElementById('toplamurun2div').innerHTML = "Toplam Urun (m2) :"+(document.getElementById('cikanurun2').value * document.getElementById('urun2m2').value);
document.getElementById('toplamurun2').value = (document.getElementById('cikanurun2').value * document.getElementById('urun2m2').value);
document.getElementById('toplamfire2div').innerHTML = "Toplam Fire (m2) :"+(document.getElementById('hammadde2m2').value - document.getElementById('toplamurun2').value);
document.getElementById('toplamfire2').value = (document.getElementById('hammadde2m2').value - document.getElementById('toplamurun2').value);
document.getElementById('urun2verimlilikdiv').innerHTML = "%"+((document.getElementById('toplamurun2').value * 100) / document.getElementById('hammadde2m2').value);
document.getElementById('urun2verimlilik').value = ((document.getElementById('toplamurun2').value * 100) / document.getElementById('hammadde2m2').value);
}
  

</script>

<script>
  function fiyatcalissingle() {

document.getElementById('cikanadetdiv').innerHTML = "Dilim:"+Math.floor(((document.getElementById('hammadde1en').value-document.getElementById('dilimilkfire1').value-document.getElementById('dilimsonfire1').value) / document.getElementById('kalip1en').value));
document.getElementById('cikanadet').value = Math.floor(((document.getElementById('hammadde1en').value-document.getElementById('dilimilkfire1').value-document.getElementById('dilimsonfire1').value) / document.getElementById('kalip1en').value));
document.getElementById('cikantabakadiv').innerHTML = "Tabaka:"+Math.floor(((document.getElementById('hammadde1boy').value-document.getElementById('tabakailkfire1').value-document.getElementById('tabakasonfire1').value) / document.getElementById('kalip1boy').value));
document.getElementById('cikantabaka').value = Math.floor(((document.getElementById('hammadde1boy').value-document.getElementById('tabakailkfire1').value-document.getElementById('tabakasonfire1').value) / document.getElementById('kalip1boy').value));
document.getElementById('cikanurundiv').innerHTML = "Urun:"+((document.getElementById('cikanadet').value * document.getElementById('cikantabaka').value * document.getElementById('kalip1gozsayisi').value )-document.getElementById('urunayarfire1').value-document.getElementById('urunkontrolfire1').value);
document.getElementById('cikanurun').value = ((document.getElementById('cikanadet').value * document.getElementById('cikantabaka').value * document.getElementById('kalip1gozsayisi').value )-document.getElementById('urunayarfire1').value-document.getElementById('urunkontrolfire1').value);



document.getElementById('hammadde1m2div').innerHTML = "Hammadde (m2) :"+((document.getElementById('hammadde1en').value * document.getElementById('hammadde1boy').value) / 1000000);
document.getElementById('hammadde1m2').value = ((document.getElementById('hammadde1en').value * document.getElementById('hammadde1boy').value) / 1000000);
document.getElementById('urun1m2div').innerHTML = "1 Urun (m2) :"+((((document.getElementById('kalip1en').value * document.getElementById('kalip1boy').value)-document.getElementById('kalip1fire').value) / document.getElementById('kalip1gozsayisi').value) / 1000000).toFixed(6);
document.getElementById('urun1m2').value = ((((document.getElementById('kalip1en').value * document.getElementById('kalip1boy').value)-document.getElementById('kalip1fire').value) / document.getElementById('kalip1gozsayisi').value) / 1000000).toFixed(6);




document.getElementById('toplamurun1div').innerHTML = "Toplam Urun (m2) : "+(document.getElementById('cikanurun').value * document.getElementById('urun1m2').value).toFixed(2);
document.getElementById('toplamurun1').value = (document.getElementById('cikanurun').value * document.getElementById('urun1m2').value).toFixed(2);
document.getElementById('toplamfire1div').innerHTML = "Toplam Fire (m2) :"+(document.getElementById('hammadde1m2').value - document.getElementById('toplamurun1').value).toFixed(2);
document.getElementById('toplamfire1').value = (document.getElementById('hammadde1m2').value - document.getElementById('toplamurun1').value).toFixed(2);
document.getElementById('urun1verimlilikdiv').innerHTML = "%"+((document.getElementById('toplamurun1').value * 100) / document.getElementById('hammadde1m2').value).toFixed(2);
document.getElementById('urun1verimlilik').value = ((document.getElementById('toplamurun1').value * 100) / document.getElementById('hammadde1m2').value).toFixed(2);



    





}
function ebatla(){
  var dilimrow = document.createElement("div");
    dilimrow.setAttribute("class","row");
    dilimrow.setAttribute("id","dilimrowdiv");

    var dilimprocesscol = document.createElement("div");
    dilimprocesscol.setAttribute("class","col-2");
    dilimprocesscol.setAttribute("id","dilimprocessdiv");

    var dilimmakinecol = document.createElement("div");
    dilimmakinecol.setAttribute("class","col-2");
    dilimmakinecol.setAttribute("id","dilimmakinediv");

    var dilimsetupadamcol = document.createElement("div");
    dilimsetupadamcol.setAttribute("class","col-1");
    dilimsetupadamcol.setAttribute("id","dilimsetupadamdiv");

    var dilimsetupsurecol = document.createElement("div");
    dilimsetupsurecol.setAttribute("class","col-1");
    dilimsetupsurecol.setAttribute("id","dilimsetupsurediv");

    var dilimadamcol = document.createElement("div");
    dilimadamcol.setAttribute("class","col-1");
    dilimadamcol.setAttribute("id","dilimadamdiv");

    var dilimsurecol = document.createElement("div");
    dilimsurecol.setAttribute("class","col-1");
    dilimsurecol.setAttribute("id","dilimsurediv");

    var dilimcikanuruncol = document.createElement("div");
    dilimcikanuruncol.setAttribute("class","col-2");
    dilimcikanuruncol.setAttribute("id","dilimcikanurundiv");

    var dilimbtncol = document.createElement("div");
    dilimbtncol.setAttribute("class","col-1");
    dilimbtncol.setAttribute("id","dilimbtndiv");

    var dilimprocess = document.createElement("input");
    dilimprocess.setAttribute("class","form-control");
    dilimprocess.setAttribute("type","text");
    dilimprocess.setAttribute("name","dilimprocess");
    dilimprocess.setAttribute("id","dilimprocess");
    dilimprocess.setAttribute("value","Dilimleme");

    var dilimmakine = document.createElement("input");
    dilimmakine.setAttribute("class","form-control");
    dilimmakine.setAttribute("type","text");
    dilimmakine.setAttribute("name","dilimmakine");
    dilimmakine.setAttribute("id","dilimmakine");
    dilimmakine.setAttribute("value","DİLİMLEME");

    var dilimadam = document.createElement("input");
    dilimadam.setAttribute("class","form-control");
    dilimadam.setAttribute("type","text");
    dilimadam.setAttribute("name","dilimadam");
    dilimadam.setAttribute("id","dilimadam");
    dilimadam.setAttribute("value","3");
    dilimadam.setAttribute("onchange","ebatprocesschange()")

    var dilimsetupadam = document.createElement("input");
    dilimsetupadam.setAttribute("class","form-control");
    dilimsetupadam.setAttribute("type","text");
    dilimsetupadam.setAttribute("name","dilimsetupadam");
    dilimsetupadam.setAttribute("id","dilimsetupadam");
    dilimsetupadam.setAttribute("value","2");
    dilimsetupadam.setAttribute("onchange","ebatprocesschange()")

    var dilimsetupsure = document.createElement("input");
    dilimsetupsure.setAttribute("class","form-control");
    dilimsetupsure.setAttribute("type","text");
    dilimsetupsure.setAttribute("name","dilimsetupsure");
    dilimsetupsure.setAttribute("id","dilimsetupsure");
    dilimsetupsure.setAttribute("value","20");
    dilimsetupsure.setAttribute("onchange","ebatprocesschange()")

    var dilimsure = document.createElement("input");
    dilimsure.setAttribute("class","form-control");
    dilimsure.setAttribute("type","text");
    dilimsure.setAttribute("name","dilimsure");
    dilimsure.setAttribute("id","dilimsure");
    dilimsure.setAttribute("value","20");
    dilimsure.setAttribute("onchange","ebatprocesschange()")

    var dilimcikanurun = document.createElement("input");
    dilimcikanurun.setAttribute("class","form-control");
    dilimcikanurun.setAttribute("type","text");
    dilimcikanurun.setAttribute("name","dilimcikanurun");
    dilimcikanurun.setAttribute("id","dilimcikanurun");
    dilimcikanurun.setAttribute("value",document.getElementById("hammadde1Ad").value.substring(0, 6)+" " + (Number(document.getElementById('teklifurunen').value)+Number(document.getElementById('tekliffingerliftlength').value))+"X"+document.getElementById('hammadde1boy').value);

    var dilimbutton = document.createElement("button");
    dilimbutton.setAttribute("class","btn btn-success");
    dilimbutton.setAttribute("id","dilimbtnsave");
    dilimbutton.setAttribute("onclick","fdilimbuttonsave()");
    dilimbutton.innerHTML = "Kaydet";

    document.getElementById("ebatlamadiv").appendChild(dilimrow);
    document.getElementById("dilimrowdiv").appendChild(dilimprocesscol);
    document.getElementById("dilimrowdiv").appendChild(dilimmakinecol);
    document.getElementById("dilimrowdiv").appendChild(dilimsetupadamcol);
    document.getElementById("dilimrowdiv").appendChild(dilimsetupsurecol);
    document.getElementById("dilimrowdiv").appendChild(dilimadamcol);
    document.getElementById("dilimrowdiv").appendChild(dilimsurecol);
    document.getElementById("dilimrowdiv").appendChild(dilimcikanuruncol);
    document.getElementById("dilimrowdiv").appendChild(dilimbtncol);
    document.getElementById("dilimprocessdiv").appendChild(dilimprocess);
    document.getElementById("dilimmakinediv").appendChild(dilimmakine);
    document.getElementById("dilimsetupadamdiv").appendChild(dilimsetupadam);
    document.getElementById("dilimsetupsurediv").appendChild(dilimsetupsure);
    document.getElementById("dilimadamdiv").appendChild(dilimadam);
    document.getElementById("dilimsurediv").appendChild(dilimsure);
    document.getElementById("dilimcikanurundiv").appendChild(dilimcikanurun);
    document.getElementById("dilimbtndiv").appendChild(dilimbutton);

    if(document.getElementById('tekliffingerlift').value=="1"){
      var fingerliftrow = document.createElement("div");
      fingerliftrow.setAttribute("class","row");
      fingerliftrow.setAttribute("id","fingerliftrowdiv");

      var fingerliftprocesscol = document.createElement("div");
      fingerliftprocesscol.setAttribute("class","col-2");
      fingerliftprocesscol.setAttribute("id","fingerliftprocessdiv");

      var fingerliftmakinecol = document.createElement("div");
      fingerliftmakinecol.setAttribute("class","col-2");
      fingerliftmakinecol.setAttribute("id","fingerliftmakinediv");

      var fingerliftsetupadamcol = document.createElement("div");
      fingerliftsetupadamcol.setAttribute("class","col-1");
      fingerliftsetupadamcol.setAttribute("id","fingerliftsetupadamdiv");

      var fingerliftsetupsurecol = document.createElement("div");
      fingerliftsetupsurecol.setAttribute("class","col-1");
      fingerliftsetupsurecol.setAttribute("id","fingerliftsetupsurediv");

      var fingerliftadamcol = document.createElement("div");
      fingerliftadamcol.setAttribute("class","col-1");
      fingerliftadamcol.setAttribute("id","fingerliftadamdiv");

      var fingerliftsurecol = document.createElement("div");
      fingerliftsurecol.setAttribute("class","col-1");
      fingerliftsurecol.setAttribute("id","fingerliftsurediv");

      var fingerliftcikanuruncol = document.createElement("div");
      fingerliftcikanuruncol.setAttribute("class","col-2");
      fingerliftcikanuruncol.setAttribute("id","fingerliftcikanurundiv");

      var fingerliftbtncol = document.createElement("div");
      fingerliftbtncol.setAttribute("class","col-2");
      fingerliftbtncol.setAttribute("id","fingerliftbtndiv");

      var fingerliftprocess = document.createElement("input");
      fingerliftprocess.setAttribute("class","form-control");
      fingerliftprocess.setAttribute("type","text");
      fingerliftprocess.setAttribute("name","fingerliftprocess");
      fingerliftprocess.setAttribute("id","fingerliftprocess");
      fingerliftprocess.setAttribute("value","Fingerlift");

      var fingerliftmakine = document.createElement("input");
      fingerliftmakine.setAttribute("class","form-control");
      fingerliftmakine.setAttribute("type","text");
      fingerliftmakine.setAttribute("name","fingerliftmakine");
      fingerliftmakine.setAttribute("id","fingerliftmakine");
      fingerliftmakine.setAttribute("value","TIRNAK ALMA");

      var fingerliftadam = document.createElement("input");
      fingerliftadam.setAttribute("class","form-control");
      fingerliftadam.setAttribute("type","text");
      fingerliftadam.setAttribute("name","fingerliftadam");
      fingerliftadam.setAttribute("id","fingerliftadam");
      fingerliftadam.setAttribute("value","3");
      fingerliftadam.setAttribute("onchange","ebatprocesschange()")

      var fingerliftsetupadam = document.createElement("input");
      fingerliftsetupadam.setAttribute("class","form-control");
      fingerliftsetupadam.setAttribute("type","text");
      fingerliftsetupadam.setAttribute("name","fingerliftsetupadam");
      fingerliftsetupadam.setAttribute("id","fingerliftsetupadam");
      fingerliftsetupadam.setAttribute("value","2");
      fingerliftsetupadam.setAttribute("onchange","ebatprocesschange()")

      var fingerliftsetupsure = document.createElement("input");
      fingerliftsetupsure.setAttribute("class","form-control");
      fingerliftsetupsure.setAttribute("type","text");
      fingerliftsetupsure.setAttribute("name","fingerliftsetupsure");
      fingerliftsetupsure.setAttribute("id","fingerliftsetupsure");
      fingerliftsetupsure.setAttribute("value","20");
      fingerliftsetupsure.setAttribute("onchange","ebatprocesschange()")

      var fingerliftsure = document.createElement("input");
      fingerliftsure.setAttribute("class","form-control");
      fingerliftsure.setAttribute("type","text");
      fingerliftsure.setAttribute("name","fingerliftsure");
      fingerliftsure.setAttribute("id","fingerliftsure");
      fingerliftsure.setAttribute("value","20");
      fingerliftsure.setAttribute("onchange","ebatprocesschange()")

      var fingerliftcikanurun = document.createElement("input");
      fingerliftcikanurun.setAttribute("class","form-control");
      fingerliftcikanurun.setAttribute("type","text");
      fingerliftcikanurun.setAttribute("name","fingerliftcikanurun");
      fingerliftcikanurun.setAttribute("id","fingerliftcikanurun");
      fingerliftcikanurun.setAttribute("value",document.getElementById("hammadde1Ad").value.substring(0, 6)+" "+document.getElementById('teklifurunen').value+"+"+document.getElementById('tekliffingerliftlength').value+"X"+document.getElementById('hammadde1boy').value);

      var fingerliftbutton = document.createElement("button");
      fingerliftbutton.setAttribute("class","btn btn-success");
      fingerliftbutton.setAttribute("id","fingerliftbtnsave");
      fingerliftbutton.setAttribute("onclick","ffingerliftbuttonsave()");
      fingerliftbutton.style.display = "none";
      fingerliftbutton.innerHTML = "Kaydet";

      document.getElementById("ebatlamadiv").appendChild(fingerliftrow);
      document.getElementById("fingerliftrowdiv").appendChild(fingerliftprocesscol);
      document.getElementById("fingerliftrowdiv").appendChild(fingerliftmakinecol);
      document.getElementById("fingerliftrowdiv").appendChild(fingerliftsetupadamcol);
      document.getElementById("fingerliftrowdiv").appendChild(fingerliftsetupsurecol);
      document.getElementById("fingerliftrowdiv").appendChild(fingerliftadamcol);
      document.getElementById("fingerliftrowdiv").appendChild(fingerliftsurecol);
      document.getElementById("fingerliftrowdiv").appendChild(fingerliftcikanuruncol);
      document.getElementById("fingerliftrowdiv").appendChild(fingerliftbtncol);
      document.getElementById("fingerliftprocessdiv").appendChild(fingerliftprocess);
      document.getElementById("fingerliftmakinediv").appendChild(fingerliftmakine);
      document.getElementById("fingerliftsetupadamdiv").appendChild(fingerliftsetupadam);
      document.getElementById("fingerliftsetupsurediv").appendChild(fingerliftsetupsure);
      document.getElementById("fingerliftadamdiv").appendChild(fingerliftadam);
      document.getElementById("fingerliftsurediv").appendChild(fingerliftsure);
      document.getElementById("fingerliftcikanurundiv").appendChild(fingerliftcikanurun);
      document.getElementById("fingerliftbtndiv").appendChild(fingerliftbutton);
    }

    var siralikesimrow = document.createElement("div");
    siralikesimrow.setAttribute("class","row");
    siralikesimrow.setAttribute("id","siralikesimrowdiv");

    var siralikesimprocesscol = document.createElement("div");
    siralikesimprocesscol.setAttribute("class","col-2");
    siralikesimprocesscol.setAttribute("id","siralikesimprocessdiv");

    var siralikesimmakinecol = document.createElement("div");
    siralikesimmakinecol.setAttribute("class","col-2");
    siralikesimmakinecol.setAttribute("id","siralikesimmakinediv");

    var siralikesimsetupadamcol = document.createElement("div");
    siralikesimsetupadamcol.setAttribute("class","col-1");
    siralikesimsetupadamcol.setAttribute("id","siralikesimsetupadamdiv");

    var siralikesimsetupsurecol = document.createElement("div");
    siralikesimsetupsurecol.setAttribute("class","col-1");
    siralikesimsetupsurecol.setAttribute("id","siralikesimsetupsurediv");

    var siralikesimadamcol = document.createElement("div");
    siralikesimadamcol.setAttribute("class","col-1");
    siralikesimadamcol.setAttribute("id","siralikesimadamdiv");

    var siralikesimsurecol = document.createElement("div");
    siralikesimsurecol.setAttribute("class","col-1");
    siralikesimsurecol.setAttribute("id","siralikesimsurediv");

    var siralikesimcikanuruncol = document.createElement("div");
    siralikesimcikanuruncol.setAttribute("class","col-2");
    siralikesimcikanuruncol.setAttribute("id","siralikesimcikanurundiv");

    var siralikesimbtncol = document.createElement("div");
    siralikesimbtncol.setAttribute("class","col-2");
    siralikesimbtncol.setAttribute("id","siralikesimbtndiv");

    var siralikesimprocess = document.createElement("input");
    siralikesimprocess.setAttribute("class","form-control");
    siralikesimprocess.setAttribute("type","text");
    siralikesimprocess.setAttribute("name","siralikesimprocess");
    siralikesimprocess.setAttribute("id","siralikesimprocess");
    siralikesimprocess.setAttribute("value","Sirali Kesim");

    var siralikesimmakine = document.createElement("input");
    siralikesimmakine.setAttribute("class","form-control");
    siralikesimmakine.setAttribute("type","text");
    siralikesimmakine.setAttribute("name","siralikesimmakine");
    siralikesimmakine.setAttribute("id","siralikesimmakine");
    siralikesimmakine.setAttribute("value","SIRALI KESİM");

    var siralikesimsetupadam = document.createElement("input");
    siralikesimsetupadam.setAttribute("class","form-control");
    siralikesimsetupadam.setAttribute("type","text");
    siralikesimsetupadam.setAttribute("name","siralikesimsetupadam");
    siralikesimsetupadam.setAttribute("id","siralikesimsetupadam");
    siralikesimsetupadam.setAttribute("value","2");
    siralikesimsetupadam.setAttribute("onchange","ebatprocesschange()")

    var siralikesimsetupsure = document.createElement("input");
    siralikesimsetupsure.setAttribute("class","form-control");
    siralikesimsetupsure.setAttribute("type","text");
    siralikesimsetupsure.setAttribute("name","siralikesimsetupsure");
    siralikesimsetupsure.setAttribute("id","siralikesimsetupsure");
    siralikesimsetupsure.setAttribute("value","20");
    siralikesimsetupsure.setAttribute("onchange","ebatprocesschange()")

    var siralikesimadam = document.createElement("input");
    siralikesimadam.setAttribute("class","form-control");
    siralikesimadam.setAttribute("type","text");
    siralikesimadam.setAttribute("name","siralikesimadam");
    siralikesimadam.setAttribute("id","siralikesimadam");
    siralikesimadam.setAttribute("value","3");
    siralikesimadam.setAttribute("onchange","ebatprocesschange()")

    var siralikesimsure = document.createElement("input");
    siralikesimsure.setAttribute("class","form-control");
    siralikesimsure.setAttribute("type","text");
    siralikesimsure.setAttribute("name","siralikesimsure");
    siralikesimsure.setAttribute("id","siralikesimsure");
    siralikesimsure.setAttribute("value","20");
    siralikesimsure.setAttribute("onchange","ebatprocesschange()")

    var siralikesimcikanurun = document.createElement("input");
    siralikesimcikanurun.setAttribute("class","form-control");
    siralikesimcikanurun.setAttribute("type","text");
    siralikesimcikanurun.setAttribute("name","siralikesimcikanurun");
    siralikesimcikanurun.setAttribute("id","siralikesimcikanurun");
    siralikesimcikanurun.setAttribute("value",document.getElementById("hammadde1Ad").value.substring(0, 6)+" "+document.getElementById('teklifurunen').value+"+"+document.getElementById('tekliffingerliftlength').value+"X"+document.getElementById('teklifurunboy').value);


    var siralikesimbutton = document.createElement("button");
      siralikesimbutton.setAttribute("class","btn btn-success");
      siralikesimbutton.setAttribute("id","siralikesimbtnsave");
      siralikesimbutton.setAttribute("onclick","fsiralibuttonsave()");
      siralikesimbutton.style.display = "none";
      siralikesimbutton.innerHTML = "Kaydet";

    document.getElementById("ebatlamadiv").appendChild(siralikesimrow);
    document.getElementById("siralikesimrowdiv").appendChild(siralikesimprocesscol);
    document.getElementById("siralikesimrowdiv").appendChild(siralikesimmakinecol);
    document.getElementById("siralikesimrowdiv").appendChild(siralikesimsetupadamcol);
    document.getElementById("siralikesimrowdiv").appendChild(siralikesimsetupsurecol);
    document.getElementById("siralikesimrowdiv").appendChild(siralikesimadamcol);
    document.getElementById("siralikesimrowdiv").appendChild(siralikesimsurecol);
    document.getElementById("siralikesimrowdiv").appendChild(siralikesimcikanuruncol);
    document.getElementById("siralikesimrowdiv").appendChild(siralikesimbtncol);
    document.getElementById("siralikesimprocessdiv").appendChild(siralikesimprocess);
    document.getElementById("siralikesimmakinediv").appendChild(siralikesimmakine);
    document.getElementById("siralikesimsetupadamdiv").appendChild(siralikesimsetupadam);
    document.getElementById("siralikesimsetupsurediv").appendChild(siralikesimsetupsure);
    document.getElementById("siralikesimadamdiv").appendChild(siralikesimadam);
    document.getElementById("siralikesimsurediv").appendChild(siralikesimsure);
    document.getElementById("siralikesimcikanurundiv").appendChild(siralikesimcikanurun);
    document.getElementById("siralikesimbtndiv").appendChild(siralikesimbutton);
    

    var recetehammaddetur = document.createElement("input");
    recetehammaddetur.setAttribute("type","hidden");
    recetehammaddetur.setAttribute("name","recetehammaddetur");
    recetehammaddetur.setAttribute("id","recetehammaddetur");
    recetehammaddetur.setAttribute("value","Hammadde");

    var recetehammaddemakine = document.createElement("input");
    recetehammaddemakine.setAttribute("type","hidden");
    recetehammaddemakine.setAttribute("name","recetehammaddemakine");
    recetehammaddemakine.setAttribute("id","recetehammaddemakine");
    recetehammaddemakine.setAttribute("value","Hammadde");

    var recetehammaddeurun = document.createElement("input");
    recetehammaddeurun.setAttribute("type","hidden");
    recetehammaddeurun.setAttribute("name","recetehammaddeurun");
    recetehammaddeurun.setAttribute("id","recetehammaddeurun");
    recetehammaddeurun.setAttribute("value",document.getElementById("hammadde1ID").value);

    var recetehammaddeoran = document.createElement("input");
    recetehammaddeoran.setAttribute("type","hidden");
    recetehammaddeoran.setAttribute("name","recetehammaddeoran");
    recetehammaddeoran.setAttribute("id","recetehammaddeoran");
    recetehammaddeoran.setAttribute("value",1 / document.getElementById("cikanurun").value);

    var recetedilimtur = document.createElement("input");
    recetedilimtur.setAttribute("type","hidden");
    recetedilimtur.setAttribute("name","recetedilimtur");
    recetedilimtur.setAttribute("id","recetedilimtur");
    recetedilimtur.setAttribute("value","Process");

    var recetedilimmakine = document.createElement("input");
    recetedilimmakine.setAttribute("type","hidden");
    recetedilimmakine.setAttribute("name","recetedilimmakine");
    recetedilimmakine.setAttribute("id","recetedilimmakine");
    recetedilimmakine.setAttribute("value","DİLİMLEME");

    var recetedilimurun = document.createElement("input");
    recetedilimurun.setAttribute("type","hidden");
    recetedilimurun.setAttribute("name","recetedilimurun");
    recetedilimurun.setAttribute("id","recetedilimurun");
    recetedilimurun.setAttribute("value",document.getElementById("dilimprocess").value);

    var recetedilimoran = document.createElement("input");
    recetedilimoran.setAttribute("type","hidden");
    recetedilimoran.setAttribute("name","recetedilimoran");
    recetedilimoran.setAttribute("id","recetedilimoran");
    recetedilimoran.setAttribute("value",document.getElementById("dilimadam").value*document.getElementById("dilimsure").value / document.getElementById("cikanurun").value);

    if(document.getElementById('tekliffingerlift').value=="1"){

    var recetefingerlifttur = document.createElement("input");
    recetefingerlifttur.setAttribute("type","hidden");
    recetefingerlifttur.setAttribute("name","recetefingerlifttur");
    recetefingerlifttur.setAttribute("id","recetefingerlifttur");
    recetefingerlifttur.setAttribute("value","Process");

    var recetefingerliftmakine = document.createElement("input");
    recetefingerliftmakine.setAttribute("type","hidden");
    recetefingerliftmakine.setAttribute("name","recetefingerliftmakine");
    recetefingerliftmakine.setAttribute("id","recetefingerliftmakine");
    recetefingerliftmakine.setAttribute("value","TIRNAK ALMA");

    var recetefingerlifturun = document.createElement("input");
    recetefingerlifturun.setAttribute("type","hidden");
    recetefingerlifturun.setAttribute("name","recetefingerlifturun");
    recetefingerlifturun.setAttribute("id","recetefingerlifturun");
    recetefingerlifturun.setAttribute("value",document.getElementById("fingerliftprocess").value);

    var recetefingerliftoran = document.createElement("input");
    recetefingerliftoran.setAttribute("type","hidden");
    recetefingerliftoran.setAttribute("name","recetefingerliftoran");
    recetefingerliftoran.setAttribute("id","recetefingerliftoran");
    recetefingerliftoran.setAttribute("value",document.getElementById("fingerliftadam").value*document.getElementById("fingerliftsure").value / document.getElementById("cikanurun").value);
    }

    var recetesiralikesimtur = document.createElement("input");
    recetesiralikesimtur.setAttribute("type","hidden");
    recetesiralikesimtur.setAttribute("name","recetesiralikesimtur");
    recetesiralikesimtur.setAttribute("id","recetesiralikesimtur");
    recetesiralikesimtur.setAttribute("value","Process");

    var recetesiralikesimmakine = document.createElement("input");
    recetesiralikesimmakine.setAttribute("type","hidden");
    recetesiralikesimmakine.setAttribute("name","recetesiralikesimmakine");
    recetesiralikesimmakine.setAttribute("id","recetesiralikesimmakine");
    recetesiralikesimmakine.setAttribute("value","SIRALI KESİM");

    var recetesiralikesimurun = document.createElement("input");
    recetesiralikesimurun.setAttribute("type","hidden");
    recetesiralikesimurun.setAttribute("name","recetesiralikesimurun");
    recetesiralikesimurun.setAttribute("id","recetesiralikesimurun");
    recetesiralikesimurun.setAttribute("value",document.getElementById("siralikesimprocess").value);

    var recetesiralikesimoran = document.createElement("input");
    recetesiralikesimoran.setAttribute("type","hidden");
    recetesiralikesimoran.setAttribute("name","recetesiralikesimoran");
    recetesiralikesimoran.setAttribute("id","recetesiralikesimoran");
    recetesiralikesimoran.setAttribute("value",document.getElementById("siralikesimsure").value*document.getElementById("siralikesimadam").value / document.getElementById("cikanurun").value);


    document.getElementById("receteplus").appendChild(recetehammaddetur);
    document.getElementById("recetehammadde1turdiv").innerHTML = "Hammadde";
    document.getElementById("receteplus").appendChild(recetehammaddemakine);
    document.getElementById("recetehammadde1makinediv").innerHTML = "Hammadde";
    document.getElementById("receteplus").appendChild(recetehammaddeurun);
    document.getElementById("recetehammadde1urundiv").innerHTML = document.getElementById("hammadde1Ad").value;
    document.getElementById("receteplus").appendChild(recetehammaddeoran);
    document.getElementById("recetehammadde1orandiv").innerHTML = document.getElementById("recetehammaddeoran").value;

    document.getElementById("receteplus").appendChild(recetedilimtur);
    document.getElementById("recetedilimturdiv").innerHTML = document.getElementById("recetedilimtur").value;
    document.getElementById("receteplus").appendChild(recetedilimmakine);
    document.getElementById("recetedilimmakinediv").innerHTML = document.getElementById("recetedilimmakine").value;
    document.getElementById("receteplus").appendChild(recetedilimurun);
    document.getElementById("recetedilimurundiv").innerHTML = document.getElementById("recetedilimurun").value;
    document.getElementById("receteplus").appendChild(recetedilimoran);
    document.getElementById("recetedilimorandiv").innerHTML = document.getElementById("recetedilimoran").value;

    if(document.getElementById('tekliffingerlift').value=="1"){
    document.getElementById("receteplus").appendChild(recetefingerlifttur);
    document.getElementById("recetefingerliftturdiv").innerHTML = document.getElementById("recetefingerlifttur").value;
    document.getElementById("receteplus").appendChild(recetefingerliftmakine);
    document.getElementById("recetefingerliftmakinediv").innerHTML = document.getElementById("recetefingerliftmakine").value;
    document.getElementById("receteplus").appendChild(recetefingerlifturun);
    document.getElementById("recetefingerlifturundiv").innerHTML = document.getElementById("recetefingerlifturun").value;
    document.getElementById("receteplus").appendChild(recetefingerliftoran);
    document.getElementById("recetefingerliftorandiv").innerHTML = document.getElementById("recetefingerliftoran").value;
    
  }
  document.getElementById("receteplus").appendChild(recetesiralikesimtur);
    document.getElementById("recetesiralikesimturdiv").innerHTML = document.getElementById("recetesiralikesimtur").value;
    document.getElementById("receteplus").appendChild(recetesiralikesimmakine);
    document.getElementById("recetesiralikesimmakinediv").innerHTML = document.getElementById("recetesiralikesimmakine").value;
    document.getElementById("receteplus").appendChild(recetesiralikesimurun);
    document.getElementById("recetesiralikesimurundiv").innerHTML = document.getElementById("recetesiralikesimurun").value;
    document.getElementById("receteplus").appendChild(recetesiralikesimoran);
    document.getElementById("recetesiralikesimorandiv").innerHTML = document.getElementById("recetesiralikesimoran").value;

    document.getElementById('ebatlabtn').style.display = 'none'; 
   
}

function ebatprocesschange(){

  document.getElementById("recetedilimorandiv").innerHTML = ((document.getElementById("dilimsetupadam").value*document.getElementById("dilimsetupsure").value)+(document.getElementById("dilimadam").value*document.getElementById("dilimsure").value)) / document.getElementById("cikanurun").value; 
  document.getElementById("recetedilimoran").value = ((document.getElementById("dilimsetupadam").value*document.getElementById("dilimsetupsure").value)+(document.getElementById("dilimadam").value*document.getElementById("dilimsure").value)) / document.getElementById("cikanurun").value;
  
  document.getElementById("recetefingerliftorandiv").innerHTML = ((document.getElementById("fingerliftsetupsure").value*document.getElementById("fingerliftsetupadam").value)+(document.getElementById("fingerliftsure").value*document.getElementById("fingerliftadam").value)) / document.getElementById("cikanurun").value; 
  document.getElementById("recetefingerliftoran").value = ((document.getElementById("fingerliftsetupsure").value*document.getElementById("fingerliftsetupadam").value)+(document.getElementById("fingerliftsure").value*document.getElementById("fingerliftadam").value)) / document.getElementById("cikanurun").value;

  document.getElementById("recetesiralikesimorandiv").innerHTML = ((document.getElementById("siralikesimsetupsure").value*document.getElementById("siralikesimsetupadam").value)+(document.getElementById("siralikesimsure").value*document.getElementById("siralikesimadam").value)) / document.getElementById("cikanurun").value;
  document.getElementById("recetesiralikesimoran").value = ((document.getElementById("siralikesimsetupsure").value*document.getElementById("siralikesimsetupadam").value)+(document.getElementById("siralikesimsure").value*document.getElementById("siralikesimadam").value)) / document.getElementById("cikanurun").value;
}

function ADDprocess(){

document.getElementById('processsayi').value = Number(document.getElementById('processsayi').value)+1 ;
document.getElementById('recetesayi').value = Number(document.getElementById('recetesayi').value)+1 ;

var name = document.createElement("input");
name.setAttribute("class","form-control");
name.setAttribute("type","text");
name.setAttribute("name","processname"+document.getElementById('processsayi').value);
name.setAttribute("id","processname"+document.getElementById('processsayi').value);
name.setAttribute("value",document.getElementById('processname').value);

var makine = document.createElement("input");
makine.setAttribute("class","form-control");
makine.setAttribute("type","text");
makine.setAttribute("name","processmakine"+document.getElementById('processsayi').value);
makine.setAttribute("id","processmakine"+document.getElementById('processsayi').value);
makine.setAttribute("value",document.getElementById('processmakine').value);

var adam = document.createElement("input");
adam.setAttribute("class","form-control");
adam.setAttribute("type","text");
adam.setAttribute("name","processadam"+document.getElementById('processsayi').value);
adam.setAttribute("id","processadam"+document.getElementById('processsayi').value);
adam.setAttribute("value",document.getElementById('processadam').value);

var sure = document.createElement("input");
sure.setAttribute("class","form-control");
sure.setAttribute("type","text");
sure.setAttribute("name","processsure"+document.getElementById('processsayi').value);
sure.setAttribute("id","processsure"+document.getElementById('processsayi').value);
sure.setAttribute("value",document.getElementById('processsure').value);


var urun = document.createElement("input");
urun.setAttribute("class","form-control");
urun.setAttribute("type","text");
urun.setAttribute("name","processurun"+document.getElementById('processsayi').value);
urun.setAttribute("id","processurun"+document.getElementById('processsayi').value);
urun.setAttribute("value",document.getElementById('processurun').value);

var urunmiktar = document.createElement("input");
urunmiktar.setAttribute("class","form-control");
urunmiktar.setAttribute("type","text");
urunmiktar.setAttribute("name","processurunmiktar"+document.getElementById('processsayi').value);
urunmiktar.setAttribute("id","processurunmiktar"+document.getElementById('processsayi').value);
urunmiktar.setAttribute("value",document.getElementById('processurunmiktar').value);


var row = document.createElement("div");
row.setAttribute("class","row");
row.setAttribute("id","processrowdiv"+document.getElementById('processsayi').value);


var colname = document.createElement("div");
colname.setAttribute("class","col-2");
colname.setAttribute("id","processnamediv"+document.getElementById('processsayi').value);


var colmakine = document.createElement("div");
colmakine.setAttribute("class","col-2");
colmakine.setAttribute("id","processmakinediv"+document.getElementById('processsayi').value);

var coladam = document.createElement("div");
coladam.setAttribute("class","col-1");
coladam.setAttribute("id","processadamdiv"+document.getElementById('processsayi').value);

var colsure = document.createElement("div");
colsure.setAttribute("class","col-1");
colsure.setAttribute("id","processsurediv"+document.getElementById('processsayi').value);


var colurun = document.createElement("div");
colurun.setAttribute("class","col-2");
colurun.setAttribute("id","processurundiv"+document.getElementById('processsayi').value);

var colurunmiktar = document.createElement("div");
colurunmiktar.setAttribute("class","col-1");
colurunmiktar.setAttribute("id","processurunmiktardiv"+document.getElementById('processsayi').value);

document.getElementById("processplus").appendChild(row);
document.getElementById("processrowdiv"+document.getElementById('processsayi').value).appendChild(colname);
document.getElementById("processrowdiv"+document.getElementById('processsayi').value).appendChild(colmakine);
document.getElementById("processrowdiv"+document.getElementById('processsayi').value).appendChild(coladam);
document.getElementById("processrowdiv"+document.getElementById('processsayi').value).appendChild(colsure);
document.getElementById("processrowdiv"+document.getElementById('processsayi').value).appendChild(colurun);
document.getElementById("processrowdiv"+document.getElementById('processsayi').value).appendChild(colurunmiktar);
document.getElementById("processnamediv"+document.getElementById('processsayi').value).appendChild(name);
document.getElementById("processmakinediv"+document.getElementById('processsayi').value).appendChild(makine);
document.getElementById("processadamdiv"+document.getElementById('processsayi').value).appendChild(adam);
document.getElementById("processsurediv"+document.getElementById('processsayi').value).appendChild(sure);
document.getElementById("processurundiv"+document.getElementById('processsayi').value).appendChild(urun);
document.getElementById("processurunmiktardiv"+document.getElementById('processsayi').value).appendChild(urunmiktar);


var recetename = document.createElement("input");
recetename.setAttribute("class","form-control");
recetename.setAttribute("type","hidden");
recetename.setAttribute("name","recetename"+document.getElementById('recetesayi').value);
recetename.setAttribute("id","recetename"+document.getElementById('recetesayi').value);
recetename.setAttribute("value","Urun");

var recetemakine = document.createElement("input");
recetemakine.setAttribute("class","form-control");
recetemakine.setAttribute("type","hidden");
recetemakine.setAttribute("name","recetemakine"+document.getElementById('recetesayi').value);
recetemakine.setAttribute("id","recetemakine"+document.getElementById('recetesayi').value);
recetemakine.setAttribute("value",document.getElementById('processmakine').value);

var receteurun = document.createElement("input");
receteurun.setAttribute("class","form-control");
receteurun.setAttribute("type","hidden");
receteurun.setAttribute("name","receteurun"+document.getElementById('recetesayi').value);
receteurun.setAttribute("id","receteurun"+document.getElementById('recetesayi').value);
receteurun.setAttribute("value",document.getElementById('processurun').value);

var receteoran = document.createElement("input");
receteoran.setAttribute("class","form-control");
receteoran.setAttribute("type","hidden");
receteoran.setAttribute("name","receteoran"+document.getElementById('recetesayi').value);
receteoran.setAttribute("id","receteoran"+document.getElementById('recetesayi').value);
receteoran.setAttribute("value",(document.getElementById('processurunmiktar').value / document.getElementById('cikanurun').value));

var receterow = document.createElement("div");
receterow.setAttribute("class","row");
receterow.setAttribute("id","receterowdiv"+document.getElementById('recetesayi').value);

var recetecolname = document.createElement("div");
recetecolname.setAttribute("class","col-2");
recetecolname.setAttribute("id","recetenamediv"+document.getElementById('recetesayi').value);

var recetecolmakine = document.createElement("div");
recetecolmakine.setAttribute("class","col-2");
recetecolmakine.setAttribute("id","recetemakinediv"+document.getElementById('recetesayi').value);

var recetecolurun = document.createElement("div");
recetecolurun.setAttribute("class","col-2");
recetecolurun.setAttribute("id","receteurundiv"+document.getElementById('recetesayi').value);

var recetecoloran = document.createElement("div");
recetecoloran.setAttribute("class","col-2");
recetecoloran.setAttribute("id","receteorandiv"+document.getElementById('recetesayi').value);


document.getElementById("receteplus").appendChild(receterow);
document.getElementById("receterowdiv"+document.getElementById('recetesayi').value).appendChild(recetecolname);
document.getElementById("receterowdiv"+document.getElementById('recetesayi').value).appendChild(recetecolmakine);
document.getElementById("receterowdiv"+document.getElementById('recetesayi').value).appendChild(recetecolurun);
document.getElementById("receterowdiv"+document.getElementById('recetesayi').value).appendChild(recetecoloran);
document.getElementById("receteplus").appendChild(recetename);
document.getElementById("receteplus").appendChild(receteurun);
document.getElementById("receteplus").appendChild(receteoran);
document.getElementById("receteplus").appendChild(recetemakine);
document.getElementById("recetenamediv"+document.getElementById('recetesayi').value).innerHTML = "Urun" ;
document.getElementById("recetemakinediv"+document.getElementById('recetesayi').value).innerHTML = document.getElementById('processmakine').value ;
document.getElementById("receteurundiv"+document.getElementById('recetesayi').value).innerHTML = document.getElementById('processurun').value ;
document.getElementById("receteorandiv"+document.getElementById('recetesayi').value).innerHTML = document.getElementById('receteoran'+document.getElementById('recetesayi').value).value ;


document.getElementById('recetesayi').value = Number(document.getElementById('recetesayi').value)+1 ;

var recetename = document.createElement("input");
recetename.setAttribute("class","form-control");
recetename.setAttribute("type","hidden");
recetename.setAttribute("name","recetename"+document.getElementById('recetesayi').value);
recetename.setAttribute("id","recetename"+document.getElementById('recetesayi').value);
recetename.setAttribute("value","Process");

var recetemakine = document.createElement("input");
recetemakine.setAttribute("class","form-control");
recetemakine.setAttribute("type","hidden");
recetemakine.setAttribute("name","recetemakine"+document.getElementById('recetesayi').value);
recetemakine.setAttribute("id","recetemakine"+document.getElementById('recetesayi').value);
recetemakine.setAttribute("value",document.getElementById('processmakine').value);

var receteurun = document.createElement("input");
receteurun.setAttribute("class","form-control");
receteurun.setAttribute("type","hidden");
receteurun.setAttribute("name","receteurun"+document.getElementById('recetesayi').value);
receteurun.setAttribute("id","receteurun"+document.getElementById('recetesayi').value);
receteurun.setAttribute("value",document.getElementById('processname').value);

var receteoran = document.createElement("input");
receteoran.setAttribute("class","form-control");
receteoran.setAttribute("type","hidden");
receteoran.setAttribute("name","receteoran"+document.getElementById('recetesayi').value);
receteoran.setAttribute("id","receteoran"+document.getElementById('recetesayi').value);
receteoran.setAttribute("value",(document.getElementById('processadam').value*document.getElementById('processsure').value / document.getElementById('cikanurun').value));

var receterow = document.createElement("div");
receterow.setAttribute("class","row");
receterow.setAttribute("id","receterowdiv"+document.getElementById('recetesayi').value);

var recetecolname = document.createElement("div");
recetecolname.setAttribute("class","col-2");
recetecolname.setAttribute("id","recetenamediv"+document.getElementById('recetesayi').value);

var recetecolmakine = document.createElement("div");
recetecolmakine.setAttribute("class","col-2");
recetecolmakine.setAttribute("id","recetemakinediv"+document.getElementById('recetesayi').value);

var recetecolurun = document.createElement("div");
recetecolurun.setAttribute("class","col-2");
recetecolurun.setAttribute("id","receteurundiv"+document.getElementById('recetesayi').value);

var recetecoloran = document.createElement("div");
recetecoloran.setAttribute("class","col-2");
recetecoloran.setAttribute("id","receteorandiv"+document.getElementById('recetesayi').value);

document.getElementById("receteplus").appendChild(receterow);
document.getElementById("receterowdiv"+document.getElementById('recetesayi').value).appendChild(recetecolname);
document.getElementById("receterowdiv"+document.getElementById('recetesayi').value).appendChild(recetecolmakine);
document.getElementById("receterowdiv"+document.getElementById('recetesayi').value).appendChild(recetecolurun);
document.getElementById("receterowdiv"+document.getElementById('recetesayi').value).appendChild(recetecoloran);
document.getElementById("receteplus").appendChild(recetename);
document.getElementById("receteplus").appendChild(receteurun);
document.getElementById("receteplus").appendChild(receteoran);
document.getElementById("receteplus").appendChild(recetemakine);
document.getElementById("recetenamediv"+document.getElementById('recetesayi').value).innerHTML = "Process" ;
document.getElementById("recetemakinediv"+document.getElementById('recetesayi').value).innerHTML = document.getElementById('processmakine').value ;
document.getElementById("receteurundiv"+document.getElementById('recetesayi').value).innerHTML = document.getElementById('processname').value ;
document.getElementById("receteorandiv"+document.getElementById('recetesayi').value).innerHTML = document.getElementById('receteoran'+document.getElementById('recetesayi').value).value ;









}

</script>
<script >

function fdilimbuttonsave(){

      

      var tdilimname = $("input[name=dilimcikanurun]").val();
      var tdilimmiktar = $("input[id=cikanadet]").val();
      var thammadde1Ad = $("input[id=hammadde1Ad]").val();
      var thammadde1m2 = $("input[id=hammadde1m2]").val();
      var tprojekod = $("input[id=teklifprojekod]").val();
      var tfingerliftlength = $("input[name=tekliffingerliftlength]").val();
      var turunen = $("input[name=teklifurunen]").val();
      var tprocess = $("input[name=dilimprocess]").val();
      var tmakine = $("input[name=dilimmakine]").val();
     
     
     

      $.ajax({
        url: "{{route('userDilimSave')}}",
        type:"POST",
        data:{
          dilimname:tdilimname,
          dilimmiktar:tdilimmiktar,
          hammadde1Ad : thammadde1Ad,
          hammadde1m2 : thammadde1m2,
          projekod : tprojekod,
          urunen : turunen,
          fingerliftlength : tfingerliftlength,
          process : tprocess,
          makine : tmakine
         
        },
        dataType: 'json',
                    success: function (result) {
                      
                      alert(result.check);
                      document.getElementById("ebatsiraid").value = result.urunID ;
                      document.getElementById("dilimbtnsave").style.display = "none";
                      document.getElementById("fingerliftbtnsave").style.display = "block";
                       
                    }
       });
      }

      function ffingerliftbuttonsave(){


var tfingerliftname = $("input[name=fingerliftcikanurun]").val();
var tfingerliftmiktar = $("input[id=cikanadet]").val();
var thammadde1Ad = $("input[id=hammadde1Ad]").val();
var thammadde1m2 = $("input[id=hammadde1m2]").val();
var tprojekod = $("input[id=teklifprojekod]").val();
var tfingerliftlength = $("input[name=tekliffingerliftlength]").val();
var turunen = $("input[name=teklifurunen]").val();
var tebatsiraid = $("input[name=ebatsiraid]").val();
var tprocess = $("input[name=fingerliftprocess]").val();
var tmakine = $("input[name=fingerliftmakine]").val();



$.ajax({
  url: "{{route('userFingerliftSave')}}",
  type:"POST",
  data:{
    fingerliftname:tfingerliftname,
    fingerliftmiktar:tfingerliftmiktar,
    hammadde1Ad : thammadde1Ad,
    hammadde1m2 : thammadde1m2,
    projekod : tprojekod,
    urunen : turunen,
    fingerliftlength : tfingerliftlength,
    ebatsiraid : tebatsiraid ,
    process : tprocess,
    makine : tmakine

   
  },
  dataType: 'json',
              success: function (result) {
                
                alert(result.check);
                document.getElementById("ebatsiraid").value = result.urunID ;
                document.getElementById("fingerliftbtnsave").style.display = "none";
                document.getElementById("siralikesimbtnsave").style.display = "block";
              }
 });
}
function fsiralibuttonsave(){


var tsiralikesimname = $("input[name=siralikesimcikanurun]").val();
var tsiralikesimmiktar = $("input[id=cikanurun]").val();
var tcikanadet = $("input[id=cikanadet]").val();
var thammadde1Ad = $("input[id=hammadde1Ad]").val();
var thammadde1m2 = $("input[id=hammadde1m2]").val();
var tprojekod = $("input[id=teklifprojekod]").val();
var turunen = $("input[name=teklifurunen]").val();
var turunboy = $("input[name=teklifurunboy]").val();
var tebatsiraid = $("input[name=ebatsiraid]").val();
var tprocess = $("input[name=siralikesimprocess]").val();
var tmakine = $("input[name=siralikesimmakine]").val();




$.ajax({
  url: "{{route('userSiraliKesimSave')}}",
  type:"POST",
  data:{
    siralikesimname:tsiralikesimname,
    siralikesimmiktar:tsiralikesimmiktar,
    hammadde1Ad : thammadde1Ad,
    hammadde1m2 : thammadde1m2,
    projekod : tprojekod,
    urunen : turunen,
    urunboy : turunboy,
    ebatsiraid : tebatsiraid,
    cikanadet : tcikanadet,
    process : tprocess,
    makine : tmakine
   
  },
  dataType: 'json',
              success: function (result) {
                
                alert(result.check);
                document.getElementById("ebatsiraid").value = result.urunID ;
                
                 
              }
 });
}



</script>
<script>
    function sipariskapat(id,i){


     
      if((document.getElementById("kapatmiktar"+i).value)==""){
        alert('miktar Bos');
      exit();
      }

      var tmiktar = document.getElementById("kapatmiktar"+i).value;
      alert(tmiktar);

$.ajax({
  url: "{{route('userSiparisKapa')}}",
  type:"POST",
  data:{
    siparisid : id,
    miktar : tmiktar

   
  },
  dataType: 'json',
              success: function (result) {
                document.getElementById("durum"+id).style.color = result.color;
                document.getElementById("durum"+id).innerHTML = result.durum;
                document.getElementById("sevktarih"+id).innerHTML = result.tarih;
                $('#sipariskapatModal'+i).modal('hide');
                alert("Siparis Kapatildi");
              }
 });
}
</script>
<script>
    function seribasionay(id){


$.ajax({
  url: "{{route('userSeriBasiOnay')}}",
  type:"POST",
  data:{
    isemriid : id

   
  },
  dataType: 'json',
              success: function (result) {
                alert(result);
                location.reload();
              }
 });
}
</script>
<script>
    function serisonuonay(id){


$.ajax({
  url: "{{route('userSeriSonuOnay')}}",
  type:"POST",
  data:{
    isemriid : id

   
  },
  dataType: 'json',
              success: function (result) {
                alert(result);
                location.reload();
              }
 });
}
</script>
<script>
    function siparisplanla(urunidx,miktarx,id){


$.ajax({
  url: "{{route('SiparisPlanla')}}",
  type:"POST",
  data:{
    urunid : urunidx,
    
    miktar : miktarx,

    siparisid : id

   
  },
  dataType: 'json',
              success: function (result) {
                markers=JSON.stringify(result);
                document.getElementById("planbitirbutton").style.display = "none";
                document.getElementById("siparissayisi").value = Number(0);
                document.getElementById("stokemrisayisi").value = Number(0);
                document.getElementById("planstokemrisayisi").value = Number(0);
                document.getElementById("plansiparissayisi").value = Number(0);
                var sayi;
                sayi= 0;
                var sayix;
                sayix= 0;
              
                document.getElementById("xlotnodiv").innerHTML = "Lotno <br>";
                document.getElementById("xmiktardiv").innerHTML = "Miktar <br>";
                document.getElementById("xisemridiv").innerHTML = "Processler <br>";
                document.getElementById("xurunadisemridiv").innerHTML = "UrunAd <br>";
                document.getElementById("xurunadstokdiv").innerHTML = "UrunAd <br>";
                document.getElementById("xstokmiktardiv").innerHTML = "Miktar <br>";
                document.getElementById("xsiparisdiv").innerHTML = "Sipariş Ver <br><br>";
                document.getElementById("xstokemrisiparisdiv").innerHTML = "Stok Emri <br><br>";
              
                
                jQuery.each( result.lotmiktararray, function( i, val ){
                  sayix += 1;
                  document.getElementById("xlotnodiv").innerHTML += "<br><br>"+val.Lotno;
                  document.getElementById("xmiktardiv").innerHTML += "<br><br>"+val.Miktar;
                  document.getElementById("xurunadstokdiv").innerHTML += "<br><br>"+val.urunad;
                  const siparisstokemributton = document.createElement("button");
                  siparisstokemributton.setAttribute("onclick","siparisstokemri("+val.Miktar+","+val.Lotno+","+val.siparisid+","+val.urunid+","+sayix+")");
                  siparisstokemributton.setAttribute("class","btn btn-danger");
                  siparisstokemributton.setAttribute("id","siparisstokemributton"+sayix);
                  siparisstokemributton.innerHTML = "Stok Emri Ver";
                  document.getElementById("xstokemrisiparisdiv").appendChild(siparisstokemributton);
                  document.getElementById("xstokemrisiparisdiv").innerHTML += "<br><br>";
                  document.getElementById("stokemrisayisi").value = Number(document.getElementById("stokemrisayisi").value) + 1;
                });
                jQuery.each( result.processarray, function( i, val ){
                  document.getElementById("xisemridiv").innerHTML += "<br><br>"+val.processad;
                jQuery.each( result.isemrimiktararray, function( i, val ){
                  sayi += 1;
                  document.getElementById("xisemridiv").innerHTML += "<br><br>";
                  document.getElementById("xurunadisemridiv").innerHTML += "<br><br>"+val.urunad;
                  document.getElementById("xstokmiktardiv").innerHTML += "<br><br>"+val.miktar;
                  const siparisbutton = document.createElement("button");
                  siparisbutton.setAttribute("onclick","altsiparisolustur("+val.urunid+","+val.miktar+","+val.siparisid+","+sayi+")");
                  siparisbutton.setAttribute("class","btn btn-success");
                  siparisbutton.setAttribute("id","siparisbutton"+sayi);
                  siparisbutton.innerHTML = "Sipariş Ver";
                  document.getElementById("xsiparisdiv").appendChild(siparisbutton);
                  document.getElementById("xsiparisdiv").innerHTML += "<br><br>";
                  document.getElementById("siparissayisi").value = Number(document.getElementById("siparissayisi").value) + 1;
               
                  
                });
              
              });
                
              }
 });
}
</script>
<script>
  function altsiparisolustur(urunidx,miktarx,siparisidx,sayi)
  {
   
    var siparissayisi = $("input[id=siparissayisi]").val();
    var stokemrisayisi = $("input[id=stokemrisayisi]").val();
 

  $.ajax({
  url: "{{route('AltSiparisOlustur')}}",
  type:"POST",
  data:{
    urunid : urunidx,
    
    miktar : miktarx,

    siparisid : siparisidx

   
  }, 
  dataType: 'json',
              success: function (result) {
                document.getElementById("siparisbutton"+sayi).style.display = "none";
                document.getElementById("plansiparisid").value = siparisidx;

                document.getElementById("plansiparissayisi").value = Number(document.getElementById("plansiparissayisi").value) + 1;
                if((document.getElementById("plansiparissayisi").value==siparissayisi)&&(document.getElementById("planstokemrisayisi").value==stokemrisayisi))
                {
                  document.getElementById("planbitirbutton").style.display = "block";
                }
              
              
                
              }
 });
}
</script>
<script>
   function siparisstokemri(lotmiktarx,lotnox,siparisidx,urunidx,sayix){
    var siparissayisi = $("input[id=siparissayisi]").val();
    var stokemrisayisi = $("input[id=stokemrisayisi]").val();
  $.ajax({
  url: "{{route('SiparisStokEmri')}}",
  type:"POST",
  data:{
    urunid : urunidx,
    
    lotmiktar : lotmiktarx,

    siparisid : siparisidx,

    lotno : lotnox
   
  },
  dataType: 'json',
              success: function (result) {
                document.getElementById("planstokemrisayisi").value = Number(document.getElementById("planstokemrisayisi").value) + 1;
                document.getElementById("siparisstokemributton"+sayix).style.display = "none";

              if((document.getElementById("plansiparissayisi").value==siparissayisi)&&(document.getElementById("planstokemrisayisi").value==stokemrisayisi))
                {
                  document.getElementById("planbitirbutton").style.display = "block";
                }
              
              
                
              }
 });
}

</script>
<script>
  function planbitir(){
   
    var tsiparisid = $("input[id=plansiparisid]").val();
    var date = $("input[id=plantarih]").val();
   
  $.ajax({
  url: "{{route('SiparisPlanTarih')}}",
  type:"POST",
  data:{

    siparisid : tsiparisid,
    tarih : date

  },
  dataType: 'json',
              success: function (result) {
                
                location.reload();
             
              
              
                
              }
 });
}

</script>
<script>
    function receteurungoster(id){


$.ajax({
  url: "{{route('ShowReceteUrun')}}",
  type:"POST",
  data:{
    receteurun : id

   
  },
  dataType: 'json',
              success: function (result) {
              
                document.getElementById("receteuruntable").innerHTML = "";
                document.getElementById("inputreceteurunreceteid").value = id;
             
                
                jQuery.each( result.receteuruns, function( i, val ){
                  document.getElementById("receteuruntable").innerHTML += "<tr><td>"+val.urun_Ad+"</td><td>"+val.receteurun_oran+"</td><td>"+val.receteurun_oranfire+"</td></tr>";
              
              
                });
            
                
              }
 });
}
</script>
<script>
    function receteurunekle(){
     
      var treceteurunid = $("input[id=inputreceteurunreceteid]").val();
      var turunid = $('#inputreceteurunurunid option:selected').val();
      var toran = $("input[id=inputoranid]").val();
      var tfire = $("input[id=inputfireid]").val();
     
     
      $.ajax({
  url: "{{route('AddReceteUrun')}}",
  type:"POST",
  data:{
    receteurunid : treceteurunid,
    urunid : turunid,
    oran : toran,
    fire : tfire

   
  },
  dataType: 'json',
              success: function (result) {
                alert("Eklendi");
              
              }
            
                
              
 });

}
</script>
<script>
    function recetesil(id){
     
     
     
      $.ajax({
  url: "{{route('DeleteRecete')}}",
  type:"POST",
  data:{
    receteid : id

   
  },
  dataType: 'json',
              success: function (result) {
                alert("Silindi");
              
              }
            
                
              
 });

}
</script>
<script>
  function pofiyat()
  {
    
    var adet = $("input[name=adet]").val();
    
    var faturafiyat = $("input[name=faturafiyat]").val();
    
  

    if(document.getElementById("projetur").value=="PD")
    {
      document.getElementById("faturafiyat").value = 1;
    }
    if(document.getElementById("projetur").value=="PR")
    {
      document.getElementById("faturafiyat").value = 0.15;
    }

    document.getElementById("faturafiyattoplam").value = adet*faturafiyat*20;
    
  }
</script>

<script>
  function workekle()
  {

    var processsayi = $("input[id=processworksayi]").val();
    var sayi = $("input[id=processgirenurunworksayi]").val();
    

      var row = document.createElement("div");
      row.id = "worksrow"+processsayi;
      row.setAttribute("class","row");
      document.getElementById("works").appendChild(row);

      var col = document.createElement("div");
      col.id = "worksprocesscol"+processsayi;
      col.setAttribute("class","col-2");
      document.getElementById("worksrow"+processsayi).appendChild(col);

      var col = document.createElement("div");
      col.id = "worksmakinecol"+processsayi;
      col.setAttribute("class","col-2");
      document.getElementById("worksrow"+processsayi).appendChild(col);

      var col = document.createElement("div");
      col.id = "workssetupadamcol"+processsayi;
      col.setAttribute("class","col-1");
      document.getElementById("worksrow"+processsayi).appendChild(col);

      var col = document.createElement("div");
      col.id = "workssetupsurecol"+processsayi;
      col.setAttribute("class","col-1");
      document.getElementById("worksrow"+processsayi).appendChild(col);

      var col = document.createElement("div");
      col.id = "worksprocessadamcol"+processsayi;
      col.setAttribute("class","col-1");
      document.getElementById("worksrow"+processsayi).appendChild(col);

      var col = document.createElement("div");
      col.id = "worksprocesssurecol"+processsayi;
      col.setAttribute("class","col-1");
      document.getElementById("worksrow"+processsayi).appendChild(col);

      var col = document.createElement("div");
      col.id = "worksuruncol"+processsayi;
      col.setAttribute("class","col-2");
      document.getElementById("worksrow"+processsayi).appendChild(col);

      var col = document.createElement("div");
      col.id = "worksmiktarcol"+processsayi;
      col.setAttribute("class","col-1");
      document.getElementById("worksrow"+processsayi).appendChild(col);

      var col = document.createElement("div");
      col.id = "workscikanuruncol"+processsayi;
      col.setAttribute("class","col-1");
      document.getElementById("worksrow"+processsayi).appendChild(col);


      var process = document.createElement("input");
      process.readOnly = "true";
      process.id = "processwork"+processsayi;
      process.setAttribute("class","form-control");
      document.getElementById("worksprocesscol"+processsayi).appendChild(process);
      var select = document.getElementById("processwork");
      document.getElementById("processwork"+processsayi).value = select.options[select.selectedIndex].text;

      var makine = document.createElement("input");
      makine.readOnly = "true";
      makine.id = "makinework"+processsayi;
      makine.setAttribute("class","form-control");
      document.getElementById("worksmakinecol"+processsayi).appendChild(makine);
      var select = document.getElementById("makinework");
      document.getElementById("makinework"+processsayi).value = select.options[select.selectedIndex].text;

      var setupadam = document.createElement("input");
      setupadam.readOnly = "true";
      setupadam.id = "setupadamwork"+processsayi;
      setupadam.setAttribute("class","form-control");
      document.getElementById("workssetupadamcol"+processsayi).appendChild(setupadam);
      document.getElementById("setupadamwork"+processsayi).value = document.getElementById("setupadamwork").value;

      var setupsure = document.createElement("input");
      setupsure.readOnly = "true";
      setupsure.id = "setupsurework"+processsayi;
      setupsure.setAttribute("class","form-control");
      document.getElementById("workssetupsurecol"+processsayi).appendChild(setupsure);
      document.getElementById("setupsurework"+processsayi).value = document.getElementById("setupsurework").value;

      var processadam = document.createElement("input");
      processadam.readOnly = "true";
      processadam.id = "processadamwork"+processsayi;
      processadam.setAttribute("class","form-control");
      document.getElementById("worksprocessadamcol"+processsayi).appendChild(processadam);
      document.getElementById("processadamwork"+processsayi).value = document.getElementById("processadamwork").value;

      var processsure = document.createElement("input");
      processsure.readOnly = "true";
      processsure.id = "processsurework"+processsayi;
      processsure.setAttribute("class","form-control");
      document.getElementById("worksprocesssurecol"+processsayi).appendChild(processsure);
      document.getElementById("processsurework"+processsayi).value = document.getElementById("processsurework").value;

      var girenurunsayi = document.createElement("input");
      girenurunsayi.setAttribute("type","hidden");
      girenurunsayi.id = "girenurunsayiwork"+processsayi;
      document.getElementById("workscikanuruncol"+processsayi).appendChild(girenurunsayi);
      girenurunsayi.value = sayi;

      var cikanurun = document.createElement("input");
      cikanurun.id = "cikanurunwork"+processsayi;
      cikanurun.setAttribute("class","form-control");
      document.getElementById("workscikanuruncol"+processsayi).appendChild(cikanurun);
      cikanurun.setAttribute("placeholder","Cikan Urun");
      
      var savebutton = document.createElement("button");
      savebutton.id = "saveworkproduct"+processsayi;
      savebutton.setAttribute("class","btn btn-success");
      document.getElementById("workscikanuruncol"+processsayi).appendChild(savebutton);
      savebutton.setAttribute("onclick","saveworkproduct("+processsayi+")");
      savebutton.innerHTML = "Kaydet";


     
    
      

    for(i=0;i<=sayi;i++)
    {
      var row = document.createElement("div");
      row.id = "worksurunrow"+processsayi+i;
      row.setAttribute("class","row");
      document.getElementById("worksuruncol"+processsayi).appendChild(row);


      var girenurun = document.createElement("input");
      girenurun.readOnly = "true";
      girenurun.id = "girenurunwork"+processsayi+i;
      girenurun.setAttribute("class","form-control");
      document.getElementById("worksurunrow"+processsayi+i).appendChild(girenurun);
      var select = document.getElementById("processgirenurunwork"+i);
      document.getElementById("girenurunwork"+processsayi+i).value = select.options[select.selectedIndex].text;


      var girenurun = document.createElement("input");
      girenurun.setAttribute("type","hidden");
      girenurun.id = "girenurunidwork"+processsayi+i;
      girenurun.setAttribute("class","form-control");
      document.getElementById("worksurunrow"+processsayi+i).appendChild(girenurun);
      var select = document.getElementById("processgirenurunwork"+i);
      document.getElementById("girenurunidwork"+processsayi+i).value = select.options[select.selectedIndex].value;

    

    }
    for(i=0;i<=sayi;i++)
    {

     

      

      var row = document.createElement("div");
      row.id = "worksmiktarrow"+processsayi+i;
      row.setAttribute("class","row");
      document.getElementById("worksmiktarcol"+processsayi).appendChild(row);

      var girenurunmiktar = document.createElement("input");
      girenurunmiktar.readOnly = "true";
      girenurunmiktar.id = "girenurunmiktarwork"+processsayi+i;
      girenurunmiktar.setAttribute("class","form-control");
      document.getElementById("worksmiktarrow"+processsayi+i).appendChild(girenurunmiktar);
      document.getElementById("girenurunmiktarwork"+processsayi+i).value = document.getElementById("miktarwork"+i).value;
  


    }

    document.getElementById("processworksayi").value = Number(document.getElementById("processworksayi").value) + 1;
    
  }
  </script>
  <script>
  function workurunekle()
  {

    
    $.ajax({
  url: "{{route('workurunekle')}}",
  type:"POST",
  data:{


   
  },
  dataType: 'json',
              success: function (result) {
                
                
                document.getElementById("processgirenurunworksayi").value = Number(document.getElementById("processgirenurunworksayi").value) + 1;

                var miktarwork = document.createElement("input");
                miktarwork.id = "miktarwork"+document.getElementById("processgirenurunworksayi").value;
                miktarwork.setAttribute("class","form-control");
                document.getElementById("miktarworks").appendChild(miktarwork);
                var selectList = document.createElement("select");
                selectList.id = "processgirenurunwork"+document.getElementById("processgirenurunworksayi").value;
                selectList.setAttribute("class","form-control");
                document.getElementById("girenurunlerworks").appendChild(selectList);
                jQuery.each( result.products, function( i, val ){
                  
                  var option = document.createElement("option");
                  option.value = val.urun_ID;
                  option.text = val.urun_Ad;
                  selectList.appendChild(option);

              
              });
            }
            
                
              
 
  });
}
</script>
<script>
  function saveworkproduct(x)
  {
      
      var process = $("input[id=processwork"+x+"]").val();
      var makine = $("input[id=makinework"+x+"]").val();
      var setupadam = $("input[id=setupadamwork"+x+"]").val();
      var setupsure = $("input[id=setupsurework"+x+"]").val();
      var processadam = $("input[id=processadamwork"+x+"]").val();
      var processsure = $("input[id=processsurework"+x+"]").val();
      var cikanurun = $("input[id=cikanurunwork"+x+"]").val();
     
      var girenurun=[];
      var girenurunmiktar=[];
   

      var girenurunsayi = Number(document.getElementById("girenurunsayiwork"+x).value);
      alert(girenurunsayi);
      for(var i=0;i<=girenurunsayi;i++)
      {
        
         girenurun[i] = document.getElementById("girenurunidwork"+x+i).value;
         girenurunmiktar[i] = document.getElementById("girenurunmiktarwork"+x+i).value;
        
         
      }
     $.ajax({
       url:"{{route('saveworkproduct')}}",
       type:"POST",
       data:{
          wprocess : process,
          wmakine : makine,
          wsetupadam : setupadam,
          wsetupsure : setupsure,
          wprocessadam : processadam,
          wprocesssure : processsure,
          wgirenurun : girenurun,
          wgirenurunmiktar : girenurunmiktar,
          wcikanurun : cikanurun
       },
       datatype: 'json',
        success : function (result)
        {
              alert(result);
        }
     });

     
      

  }

</script>




</body>
</html>

