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
      <span class="brand-text font-weight-light">Portal</span>
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
                <a href="{{ route('client.dashboard')}}" class="nav-link {{ (request()->is('client/dashboard*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
             <li class="nav-item">
             <a href="{{ route('client.profile')}}" class="nav-link {{ (request()->is('client/profile*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                   Profile
                  </p>
                </a>
              </li>
       
         
         
        
        
          <li class="nav-item">
            <a href="{{ route('client.teklifler')}}" class="nav-link {{ (request()->is('client/teklifler*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Teklifler
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
          processUrl:'{{ route("clientPictureUpdate") }}',
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
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
        $(document).ready(function () {
            $('#tip').on('change', function () {
                var tvalue = this.value;
                $("#hammadde").html('');
                $.ajax({
                    url: "{{route('clientfetchTip')}}",
                    type: "POST",
                    data: {
                        tip : tvalue,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#hammadde').html('<option value="119">Hammadde Seç</option>');
                        $.each(result.products, function (key, value) {
                            $("#hammadde").append('<option value="' + value
                                .urun_ID + '">' + value.urun_Ad + '</option>');
                        });
                       
                    }
                });
                $("#hammadde2").html('');
                $.ajax({
                    url: "{{route('clientfetchTip')}}",
                    type: "POST",
                    data: {
                        tip : tvalue,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#hammadde2').html('<option value="119">Hammadde Seç</option>');
                        $.each(result.product2s, function (key, value) {
                            $("#hammadde2").append('<option value="' + value
                                .urun_ID + '">' + value.urun_Ad + '</option>');
                        });
                       
                    }
                });
            });
          
        });
    </script>
   

<script>
      function figur1(){
      if(document.getElementById('figur').value=="Logo")
      {
        document.getElementById('tip').value = 'AFT';
      }
     
      
      if(document.getElementById('tip').value=="AFT+AFT"||document.getElementById('tip').value=="Thinsulate+TransferTape"||document.getElementById('tip').value=="Duallock+Duallock")
      {
        document.getElementById('singleorcombine').value = 'Combine';
      }
      else
      {
        document.getElementById('singleorcombine').value = 'Single';
      }
      if(document.getElementById('singleorcombine').value=="Single")
      {
        document.getElementById('hammadde2div').style.display = 'none';
        
      }
      else
      {
        document.getElementById('hammadde2div').style.display = 'block';
      }
     
   
      if(document.getElementById('tip').value=="Thinsulate")
      {
        document.getElementById('thinsulateshow').style.display = 'block';
        document.getElementById('normalshow').style.display = 'none';
      }
      else
      {
        document.getElementById('thinsulateshow').style.display = 'none';
        document.getElementById('normalshow').style.display = 'block';
      }
      if(document.getElementById('tip').value=="Thinsulate+TransferTape")
      {
        document.getElementById('thinsulateshow').style.display = 'block';
        document.getElementById('normalshow').style.display = 'block';
      }
      if(document.getElementById('tip').value=="Duallock+Duallock")
      {
        document.getElementById('sandwichshow').style.display = 'block';
      }
      else
      {
        document.getElementById('sandwichshow').style.display = 'none';
      }
      if(document.getElementById('pakettip').value=="Part On Sheet")
      {
        document.getElementById('sheetshow').style.display = 'block';
      }
      else
      {
        document.getElementById('sheetshow').style.display = 'none';
      }
      
    }
    </script>
    <script>
      function validateForm() {
        if(document.getElementById('figur').value=="Logo"||document.getElementById('figur').value=="Drawing")
        {
  let x = document.forms["hizliteklifform"]["file"].value;
  if (x == "") {
    alert("Square harici dosya zorunludur");
    return false;
  }
}
}
    </script>


  

</body>
</html>

