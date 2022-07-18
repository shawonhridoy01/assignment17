<?php 


if(basename(__DIR__)  != "admin" ){
	$isInternal = true;
	$baseUrl = "../";
}else{
	$isInternal = false;
	$baseUrl = "";
}



?>