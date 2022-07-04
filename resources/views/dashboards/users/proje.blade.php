@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Proje')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('userAddTeklif') }}" id="teklifform">
	@csrf
<table width="100%" height="900" class="table table-bordered table-striped"  > 

<tr height=100>
   
	<td colspan=2 valign=top>
    <div class="card card-info" >
        <div class="card-header" >
                <h1 class="card-title">Summary</h1>
                
              </div>
              </div>
	<div style="font-size:15px" id="urun">Type : </div>
	<div id="islem"></div>
	<div id="olcu"></div>
	<div id="proje"></div>
	<div id="ur"></div></td>
   
</tr>
<tr height=800>
	<td width="500" valign=top>
		
		<div  id="DivFigure" style="padding-left:25px;padding-top:20px;font-size:20px;"  >
        <div class="card card-info">
        <div class="card-header">
                <h1 class="card-title">Select the Figure</h1>
                
              </div>
              </div>
              <div style="padding-left:25px;padding-top:20px;">
              <input type="radio" class="form-check-input"  name="sekil" id="Square" value="Square"  	onclick="SquareOnclick();" >Square/Rectangle <br><br>
			<input type="radio" class="form-check-input"  name="sekil" id="Drawing" value="Drawing"  	onclick="DrawingOnclick();" >Drawing <br><br>
			<input type="radio" class="form-check-input"  name="sekil" id="Logo" value="Logo"   onclick="LogoOnclick();" >logo/Emblem<br><br>
            </div>
            <br>
			
		
		</div>

		<div  id="DivDrawing" style="padding-left:25px;padding-top:20px;font-size:20px;display: none;"  >
			
        <div class="card card-info">
        <div class="card-header">
                <h1 class="card-title">Select the Product</h1>
              </div>
              </div>
              <div style="padding-left:25px;padding-top:20px;">
			<div id="DivSingle"> <input class="form-check-input" type="radio" name="ProductType" value="Single"  id="Single"  onclick="SingleOnclick();" >Single </div><br>
			<div id="DivCombine"><input  class="form-check-input" type="radio" name="ProductType" value="Combine" id="Combine" onclick="CombineOnclick();" >Combine </div><br>
            </div>
		</div>
		<div  id="DivProduct"  style="padding-left:25px;padding-top:20px;font-size:20px;display: none;" >
        <div class="card card-info">
        <div class="card-header">
                <h1 class="card-title">Select the Product</h1>
              </div>
              </div>
              <div style="padding-left:25px;padding-top:20px;">
			<div id="DivAFT"><input class="form-check-input" type="radio" name="Product" value="AFT" id="AFT" onclick="AFTOnclick();">AFT </div>
			<div id="DivThinsulate"><input class="form-check-input" type="radio" name="Product" value="Thinsulate" id="Thinsulate" onclick="ThinsulateOnclick();">Thinsulate </div>
			<div id="DivDuallock"><input class="form-check-input" type="radio" name="Product" value="Duallock" id="Duallock" onclick="DuallockOnclick();">Duallock</div>
			<div id="DivTransferTape"><input  class="form-check-input"  type="radio" name="Product" value="TransferTape" id="TransferTape" onclick="TransferTapeOnclick();">Transfer Tape</div>
			<div id="DivOneSidedTape"><input class="form-check-input" type="radio" name="Product" value="OneSidedTape" id="OneSidedTape" onclick="OneSidedTapeOnclick();">One Sided Tape </div>
			<div id="DivAFTAFT"><input class="form-check-input" type="radio" name="Product" value="AFTAFT" onclick="AFTAFTOnclick();">AFT+AFT</div>
			<div id="DivTTransferTape"><input class="form-check-input" type="radio" name="Product" value="TTransferTape" id="ThinsulateTransferTape" onclick="TTransferTapeOnclick();">Thinsulate+Transfer Tape</div>
			<div id="DivDuallockDuallock"><input  class="form-check-input" type="radio" name="Product" value="DuallockDuallock" id="DuallockDuallock" onclick="DuallockDuallockOnclick();">Duallock+Duallock</div>
            </div>
		</div>
		<div  id="DivPack"  style="padding-left:25px;padding-top:20px;font-size:20px;display: none;" >
        <div class="card card-info">
        <div class="card-header">
                <h1 class="card-title">Select the Pack Type</h1>
              </div>
              </div>
              <div style="padding-left:25px;padding-top:20px;">
			<div id="DivSinglePart"><input class="form-check-input" type="radio" name="PackType" value="SinglePart" id="SinglePart"  onclick="SinglePartOnclick();">Single Part</div>
			<div id="DivPartOnSheet"><input  class="form-check-input" type="radio" name="PackType" value="PartOnSheet" id="PartOnSheet" onclick="PartOnSheetOnclick();">Part On Sheet</div>
			<div id="DivPartOnRoll"><input  class="form-check-input" type="radio" name="PackType" value="PartOnRoll" id="PartOnRoll"  onclick="PartOnRollOnclick();">Part On Roll</div>
            </div></div>
		<div  id="DivProjectInfo"   style="padding-left:25px;padding-top:20px;font-size:12px;display: none;">
        <div class="card card-info">
        <div class="card-header">
                <h1 class="card-title">Please Enter Project Info</h1>
              </div>
              </div>
			<div id="DivSOP"><input class="form-control rounded-1" type="date" name="SOP" value="0" id="SOP" onchange="drawingchange();"> SOP(Date)</div>
			<div id="DivEOP"><input class="form-control rounded-1" type="date" name="EOP" value="0" id="EOP" onchange="drawingchange();"> EOP(Date)</div>
			<div id="DivAnnualVolume"><input class="form-control rounded-1" type="number" name="AnnualVolume" value="0"  id="AnnualVolume" onchange="drawingchange();"> Annual Volume(Item)</div>
			<div id="DivOEM"><input  class="form-control rounded-1" type="Text" name="OEM" value=""  id="OEM"> OEM</div>
			<div id="DivCustomer"><select class="form-control rounded-1" name="Customer" id="Customer" onchange="drawingchange();">
									@foreach ($firms as $firm)
									<option value="{{ $firm->firma_ID }}">{{ $firm->firma_Ad }}</option>
									@endforeach
									</select> Customer</div>
			<div id="DivProjectName"><input class="form-control rounded-1" type="text" name="ProjectName" value=""  id="ProjectName" onchange="drawingchange();"> Project Name</div>
			<div id="DivProjectCode"><input class="form-control rounded-1" type="text" name="ProjectCode" value=""  id="ProjectCode" onchange="drawingchange();"> Project Code</div>
			<div id="DivVehicle"><input  class="form-control rounded-1" type="text" name="Vehicle" value=""  id="Vehicle" onchange="drawingchange();"> Vehicle</div>
		</div>
		<div  id="DivJob"  style="padding-left:25px;padding-top:20px;font-size:20px;display: none;" >
        <div class="card card-info">
        <div class="card-header">
                <h1 class="card-title">Select the Jobs</h1>
              </div>
              </div>
              <div style="padding-left:25px;">
			<div id="DivFingerLift"><input class="form-check-input" type="checkbox" name="FingerLift" value="1" id="FingerLift" onclick="FingerLiftOnclick();">Finger Lift </div>
			<div id="DivLinerChange"><input class="form-check-input" type="checkbox" name="LinerChange" value="1" id="LinerChange" onclick="LinerChangeOnclick();">Liner Change</div>
			<div id="DivSandwich"><input class="form-check-input" type="checkbox" name="Sandwich" value="1"  id="Sandwich" onclick="drawingchange();">Sandwich</div>
			<div id="DivHotTrim"><input class="form-check-input" type="radio" name="ThinsulateCuttingType" value="1" id="HotTrim" onclick="drawingchange();">Hot Trim</div>
			<div id="DivPlainCut"><input class="form-check-input" type="radio" name="ThinsulateCuttingType" value="1" id="PlainCut" onclick="drawingchange();">Plain Cut</div>
			<div id="DivEdgeSeal"><input class="form-check-input" type="radio" name="ThinsulateCuttingType" value="1" id="EdgeSeal" onclick="drawingchange();">Edge Seal</div>
            </div>
		</div>
	
		<div  id="DivSize"  style="padding-left:25px;padding-top:20px;font-size:12px;display: none;">
		
			<div class="card card-info">
        <div class="card-header">
                <h1 class="card-title">Please Enter Size</h1>
              </div>
              </div>
			<div id="DivWidthSize"><input class="form-control rounded-1" type="number" name="WidthSize" value="30" onchange="drawingchange();" id="WidthSize"> Width Size(mm)</div>
			<div id="DivLengthSize"><input class="form-control rounded-1" type="number" name="LengthSize" value="20" onchange="drawingchange();" id="LengthSize"> Length Size(mm)</div>
			<div id="DivEXTSize"  style="display: none;"><input class="form-control rounded-1" type="number" onchange="drawingchange();" name="EXTSize" value="10"  id="EXTSize"> EXT Size(mm)</div>

		</div>
		
		<div  id="DivSheetInfo" style="padding-left:25px;padding-top:20px;font-size:12px;display: none;">
		
        <div class="card card-info">
        <div class="card-header">
                <h1 class="card-title">Please Sheet Info</h1>
              </div>
              </div>
			<div id="DivSheetWidthItem"><input class="form-control rounded-1" type="number" name="SheetWidthItem" onchange="drawingchange();" value="1" id="SheetWidthItem"> Width(Item)</div>
			<div id="DivSheetLengthItem"><input class="form-control rounded-1" type="number" name="SheetLengthItem" onchange="drawingchange();" value="1" id="SheetLengthItem"> Length(Item)</div>
			<div id="DivSpaceSize"><input  class="form-control rounded-1" type="number" name="SpaceSize" value="10" onchange="drawingchange();"  id="SpaceSize"> Space Size(mm)</div>

		</div>		
		
		<div  id="DivProductSelect"   style="padding-left:25px;padding-top:20px;font-size:12px;display: none;">
			
			<div id="DivProduct1">   <div class="card card-info">
        <div class="card-header">
                <h1 class="card-title">Please Select Product 1</h1>
              </div>
              </div>
			<div id="DivProducthWidth1">
			<select name="Product1" class="custom-select form-control-border"  id="Product1" onchange="Product1Onchange();">
            @foreach ($products as $product)
				<option value="{{ $product->urun_ID }}">{{ $product->urun_Ad }}</option>
                @endforeach
			</select> <br>
            <br>
			<input  class="form-control rounded-1" type="number" name="ProducthWidth1" value="0" id="ProducthWidth1" onchange="drawingchange();"> Width Size(mm)</div>
			<div id="DivProducthLength1"><input class="form-control rounded-1" type="number" name="ProducthLength1" value="0" id="ProducthLength1" onchange="drawingchange();"> Length Size(mm)</div>
			<div id="DivProducthColor1"><input class="form-control rounded-1" type="text" name="ProducthColor1" value="red" id="ProducthColor1" onchange="drawingchange();"> </div>
			</div>
			<div id="DivProduct2"><div class="card card-info">
        <div class="card-header">
                <h1 class="card-title">Please Select Product 2</h1>
              </div>
              </div>
			<div id="DivProducthWidth2">
                 <select name="Product2" class="custom-select form-control-border" id="Product2" onchange="drawingchange();">
                 @foreach ($products as $product)
				<option value="{{ $product->urun_ID }}">{{ $product->urun_Ad }}</option>
                @endforeach
				
			</select> <br> <br> <input  class="form-control rounded-1" type="number" name="ProducthWidth2" value="0" id="ProducthWidth2" onchange="drawingchange();"> Width Size(mm)</div>
			<div id="DivProducthLength2"><input  class="form-control rounded-1" type="number" name="ProducthLength2" value="0" id="ProducthLength2" onchange="drawingchange();"> Length Size(mm)</div>
			</div>
		</div>
	</td>
	<td valign=top>
    <div class="card card-info" >
        <div class="card-header">
                <h1 class="card-title">Sample View</h1>
              </div>
              </div>
        <canvas id="canvas" width="0" height="0"></canvas></td>
</tr>
</table>
<div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Teklif Oluştur</button>
                          </div>
                        </div>
						</form>

@endsection