@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Process Oluştur')

@section('content')


<style>
ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */'
  transform: rotate(90deg);  
}

.nested {
  display: none;
}

.active {
  display: block;
}
</style>



<ul id="myUL">
  <li>
      <input type="hidden" id="operasyonsayi" name="operasyonsayi" value="1">
      <span class="caret"><input type="text" class="form-control-lg" placeholder="Process"></span>

        <ul class="nested" id="operasyons"> <button class="btn btn-success" onclick="ADDoperasyon()" >+</button>
            <li><span class="caret"><input type="text" class="form-control-lg" placeholder="Operasyon"></span>
                

            </li>

      
        </ul>  
  </li>
</ul>

<script>
    var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}

</script>
<script>
    function ADDoperasyon(){

document.getElementById('operasyonsayi').value = Number(document.getElementById('operasyonsayi').value)+1 ;

var operasyonname = document.createElement("input");
operasyonname.setAttribute("class","form-control-lg");
operasyonname.setAttribute("type","text");
operasyonname.setAttribute("name","operasyonname"+document.getElementById('operasyonsayi').value);
operasyonname.setAttribute("id","operasyonname"+document.getElementById('operasyonsayi').value);
operasyonname.setAttribute("placeholder","Operasyon");

var riskname = document.createElement("input");
riskname.setAttribute("class","form-control-lg");
riskname.setAttribute("type","text");
riskname.setAttribute("name","riskname"+document.getElementById('operasyonsayi').value);
riskname.setAttribute("id","riskname"+document.getElementById('operasyonsayi').value);
riskname.setAttribute("placeholder","Risk");



var lioperasyon = document.createElement("li");
lioperasyon.setAttribute("id","operasyon"+document.getElementById('operasyonsayi').value);


var ulrisks = document.createElement("ul");
ulrisks.setAttribute("class","nested");
ulrisks.setAttribute("id","ulrisks"+document.getElementById('operasyonsayi').value);


var lirisk= document.createElement("li");
lirisk.setAttribute("id","lirisk"+document.getElementById('operasyonsayi').value);

var ulkontrols = document.createElement("ul");
ulkontrols.setAttribute("class","nested");
ulkontrols.setAttribute("id","ulkontrols"+document.getElementById('operasyonsayi').value);

var spanoperasyon = document.createElement("span");
spanoperasyon.setAttribute("class","caret");
spanoperasyon.setAttribute("id","spanoperasyon"+document.getElementById('operasyonsayi').value);

var spanrisk = document.createElement("span");
spanrisk.setAttribute("class","caret");
spanrisk.setAttribute("id","spanrisk"+document.getElementById('operasyonsayi').value);


document.getElementById("operasyons").appendChild(lioperasyon);
document.getElementById("operasyon"+document.getElementById('operasyonsayi').value).appendChild(spanoperasyon);
document.getElementById("spanoperasyon"+document.getElementById('operasyonsayi').value).appendChild(operasyonname);
document.getElementById("operasyon"+document.getElementById('operasyonsayi').value).appendChild(ulrisks);
document.getElementById("ulrisks"+document.getElementById('operasyonsayi').value).appendChild(lirisk);
document.getElementById("lirisk"+document.getElementById('operasyonsayi').value).appendChild(spanrisk);
document.getElementById("spanrisk"+document.getElementById('operasyonsayi').value).appendChild(riskname);


var toggler = document.getElementsByClassName("caret");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("active");
    this.classList.toggle("caret-down");
  });
}


    }
</script>



@endsection