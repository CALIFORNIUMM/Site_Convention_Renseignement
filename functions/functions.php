<?php

/**
 * Autoload
 * @param string $classe
 */
function my_autoloader($classe) {
  if(file_exists('app/classes/' . $classe . '.php')){
    include 'app/classes/' . $classe . '.php';
  }else{
    include 'app/dao/' . $classe . '.php';
  }
    
}

spl_autoload_register('my_autoloader');

function convertir_date(string $date1)
{
$datetime = DateTime::createFromFormat('d/m/Y', $date1, new DateTimeZone("Europe/Paris"));
$date2 = $datetime->format("Y-m-d");
return $date2;
}

require_once "fpdf/fpdf.php";

?>