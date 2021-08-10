<?php
functionconnection($base)
{
    $idcom = @mysqli_connect("localhost", "root", "", "final");

if(!$idcom) {
echo"<script type=text/javascript>";
echo"alert('Cannot connect to $base')</script>";
    }
return$idcom;
}
