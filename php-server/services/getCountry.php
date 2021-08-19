<?php

require_once '../classes/CountryRepository.php' ;


header('Access-Control-Allow-Origin: http://localhost:4200') ;
header('Content-type: application/json') ;



if( isset($_GET['code']) && is_string($_GET['code'])){
    $country = CountryRepository::getCountry($_GET['code']);
    echo json_encode($country) ;
}