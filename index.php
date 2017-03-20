<?php

require_once "vendor/autoload.php";
use SameerShelavale\PhpCountriesArray\CountriesArray;
// use SameerShelavale\PhpCountriesArray;

// $countries = PhpCountriesArray\CountriesArray::get();
// var_dump($countries)
// foreach ($countries as $key => $value) {
// 	echo "$key  =>  $value</br>";
// }
 // echo $conut::getList('en', 'json');


$countries = CountriesArray::get( 'alpha2', 'name' );
$hol = '';
function holidays($country){
	$key = 'b8f6d302-e660-4289-b69e-d93f3f261836';
	if( $curl = curl_init() ) {
	   curl_setopt($curl, CURLOPT_URL, 'https://holidayapi.com/v1/holidays?key='.$key.'&country='.$country.'&year=2016');
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
	   $out = curl_exec($curl);
	   return $out;
	  //  	// echo $out;   //   var_dump($out) ;
	   curl_close($curl);
	}  	
}

if (isset($_GET['count'])) {
	$hol = holidays($_GET['count']);
	die($hol);
}

?>
<html>
<head>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}
#myInput {
    border-box: box-sizing;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 20px 12px 45px;
    border: none;

}
#myDropdown{
	height: 180px;
    overflow: scroll;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f6f6f6;
    min-width: 230px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd}

.show {display:block;}
</style>
</head>
<body>
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <?php
    	foreach ($countries as $key => $value) {
			
			echo '<a href="?count='.strtolower($key).'">'.$value.'</a>';
		}
    ?>
    <a href="#about">About</a>
  </div>
</div>
<div>
	<?php
		echo $hol;
	?>
</div>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}
</script>

</body>
</html>

