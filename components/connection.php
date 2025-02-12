<?php
$host="localhost";
$username="root";
$password="";
$dbname="solutions";
$conn=new mysqli($host,$username,$password,$dbname);
if(!$conn){
    die("Connection was not made");
}