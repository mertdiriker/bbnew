@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Settings')

@section('content')
<?php $value="1"; 
?>
<script src="http://test/sites/js/jquery-1.4.2.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
$('.target').change(function() {
  $value=document.getElementById('target').value;
var myArray = $value.split('X'); 
document.getElementById('other').innerHTML = '
<img src="http://test/sites/all/themes/artsy/images/images2.jpeg" width="'+myArray[0]+'px" height="'+myArray[1]+'px ">';


});
});
</script>
<form>
    <select class="target" id="target">
        <option value="20 X 30" selected="selected">20 X 30</option>
        <option value="100 X 150">100 X 150</option>
    </select>
</form>
<div id="other"> 
    <?php echo $value; ?> <img src="http://test/sites/all/themes/artsy/images/images2.jpeg">
    </div>
@endsection