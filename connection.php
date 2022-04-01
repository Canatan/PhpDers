<?php
$servername="localhost";
$username="root";
$passaword="";
$database="user";

$baglan=new mysqli($servername,$username,$passaword,$database);

if($baglan->connect_errno>0){
    die ("Veri tabanina baglanilamadi. Nedeni: " . $baglan->connect_error);
}